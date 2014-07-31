<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 用户模块控制器
 * 
 * @package baseController
 * @subpackage CI_Controller
 * @author Coly
 * @version $ID 2012-08-20 $
 */
require_once 'applications/controllers/basecontroller.php';
class User extends BaseController
{
	//初始化控制器
	public function __construct ()
	{
		parent::__construct();
		$this->load->model(array('userModel'));
		
		//把变量注入到页面中
		$this->smarty->assign('navEq',$this->session->userdata('navEq'));
	}
	
	
	/**
	 * 前台用户登录方法
	 */
	public function login ()
	{
		/*
		 * 把上一页的地址存到session里面，用来登录成功之后跳转，因为login页面会打开两次(因为有post)
		 * 如果只用Tool::getPrevPage()，登录成功之后，这个值就会变成登录页面的地址，
		 * 所以这里进行判断之后，再存储
		 */
		
		if (!stripos(Tool::getPrevPage(), 'user/login'))
		{
			$this->session->set_userdata('prev_url',Tool::getPrevPage());
		}
		
		//如果是强制计入login页面，判断登录，如果已经登录，就跳转回去
		$this->userModel->haveLogin() ? Tool::alertLocation($this->session->userdata('prev_url'), '您已经登录，请先退出！') : null;

    if ($this->input->post('submit'))
		{
			$this->_packClass = new UserLoginPacket();
			if ($this->_packClass->run())
			{//表单验证成功
				if ($this->userModel->userLogin())
				{//登陆成功
					Tool::alertLocation($this->session->userdata('prev_url'), '登录成功！');
				}else
				{//用户名密码错误
					Tool::alertBack('用户名或密码错误');
				}
			}else
			{//表单验证失败
				$this->setErrorAndDefault($this->_packClass->returnField());
			}
		}
		
    $this->smarty->display('front/login.html');
	}
	
	/**
	 * 注册方法
	 */
	public function regist ()
	{
		/*
		 * 把上一页的地址存到session里面，用来注册成功之后跳转，因为regist页面会打开两次(因为有post)
		 * 如果只用Tool::getPrevPage()，注册成功之后，这个值就会变成注册页面的地址，
		 * 所以这里进行判断之后，再存储
		 */
		
		if (!stripos(Tool::getPrevPage(), 'user/regist'))
		{
			$this->session->set_userdata('prev_url',Tool::getPrevPage());
		}
		
		if ($this->input->post('submit'))
		{
			$this->_packClass = new UserRegistPacket();
			if ($this->_packClass->run())
			{
			  if ($this->userModel->regist())
			  {
			  	Tool::alertLocation($this->session->userdata('prev_url'), '注册成功！');
			  }else 
			  {
			  	Tool::alertBack('注册失败');
			  }
			}else 
			{
				$this->setErrorAndDefault($this->_packClass->returnField());
			}
		}
		
		$this->smarty->display('front/regist.html');
	}
	
	/**
	 * 用户中心，我的发布
	 */
	public function center ()
	{
		$this->load->model(array('requestModel'));
		
		//判断登陆
		$this->judgeLogin();
		
		//获取所有的需求
		$returnArray = $this->userModel->userRequest();
		
		$this->smarty->assign('auditedRequest',$returnArray['auditedRequest']);
		$this->smarty->assign('unAuditedRequest',$returnArray['unAuditedRequest']);
		$this->smarty->assign('deletedRequest',$returnArray['deletedRequest']);
		
		//个人中心左边导航设置默认
// 		$this->smarty->assign('leftEq',0);
		
		$this->smarty->display('front/user_center.html');
	}
	
	
	/**
	 * 用户中心,我的收藏
	 */
	public function collect ()
	{

		//判断登陆
		$this->judgeLogin();
		
		$this->load->model(array('requestModel','collectModel'));
	
		$this->smarty->assign('collectList',$this->userModel->userCollect());
	
		//个人中心左边导航设置默认
		$this->smarty->assign('leftEq',1);
	
		$this->smarty->display('front/user_center_collect.html');
	}
	
	/**
	 * 用户中心,我的资料
	 */
	public function data ()
	{
	
		//判断登陆
		$this->judgeLogin();
	
		$this->load->model(array('requestModel','collectModel','regionModel','provinceModel'));
	
		//个人中心左边导航设置默认
		$this->smarty->assign('leftEq',2);
		
		//判断是不是提交
		if ($this->input->post('submit'))
		{
			$this->_packClass = new UserDataPacket();
			if ($this->_packClass->run())
			{//表单验证成功
				if ($this->userModel->commonUpdate($this->_packClass->returnField(),array(UserTable::USER_ID => $this->session->userdata('user_'.UserTable::USER_ID ))))
				{
					Tool::alertLocation('', UPDATE_SUC_INFO);
				}else 
				{
					Tool::alertBack(UPDATE_FAILED_INFO);
				}
			}else
			{//表单验证失败
				$this->setErrorAndDefault($this->_packClass->returnField());
			}
		}
	
		//获取用户的所有信息
		$info = $this->userModel->returnAllInfo(array(UserTable::USER_ID => $this->session->userdata('user_'.UserTable::USER_ID)));
		
		//所有的省
		$this->smarty->assign('allProvince',$this->provinceModel->returnAllInfo());
		
		//所有的学校
		$this->smarty->assign('allUniversity',$this->regionModel->returnAllInfo(array(RegionTable::PROVINCE_ID => $info[0][UserTable::USER_PROVINCE])));
		
		//注入当前用户的所有信息
		foreach ($info[0] as $key => $value)
		{
			$this->smarty->assign($key,$value);
		}
		
		$this->smarty->display('front/user_center_data.html');
	}
	
	/**
	 * 注册时用户名和邮箱验证是否重复
	 */
	public function regValidate ()
	{
    $postArray = $this->input->post();
    if (count($postArray) > 0)
    {
    	$where[$postArray['name']] = $postArray['param'];
    	if (count($this->userModel->returnAllInfo($where)) > 0)
    	{
    		echo '该名称已被注册，请重新输入！';
    	}else 
    	{//这里输出y是因为用的表单验证插件必须这样输出
    		echo 'y';
    	}
    }
	}
	
	/**
	 * 退出登录
	 */
	public function logout ()
	{
		$this->userModel->logout();
		Tool::alertLocation(Tool::getPrevPage(), '退出成功！');
	}
}


/** End of class User **/
/** End of file user.php **/