<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 控制器基类
 * 
 * 自己重新定义一个控制器基类，在__construct里面增加一些要运行的方法,以后的控制器继承他
 * @author Coly
 * @package CI_Controller
 * @version $ID 2012-08-12 $
 */

class BaseController extends CI_Controller
{
	//设置了规则和包装之后的表单验证类
	protected $_packClass = null;
	
	/**
	 * 构造方法，载入smarty，注入admin路径，admin的url
	 */
	public  function __construct()
	{
		parent::__construct();
		
		//载入区域model，即学校
		$this->load->model(array('regionModel'));
		
		//加载smarty
		$this->load->library('smarty');
		
		//加载smarty
		$this->load->library('session');
		
		//注入admin的完整文件路径,放在html的base标签里，引入css，图片的时候使用
		$this->smarty->assign('admin_path',ADMIN_PATH);
		$this->smarty->assign('front_path',FRONT_PATH);
		$this->smarty->assign('app_path',ROOT_PATH);
		//注入front的url，在使用超链接的时候使用,
		$this->smarty->assign('front_url',FRONT_URL);
		//注入admin的url，在使用超链接的时候使用,
		$this->smarty->assign('admin_url',ADMIN_URL);
		
		//设置默认的省市，
		$this->session->set_userdata(RegionTable::PROVINCE_ID,PROVINCE_ID);
		
		//把省市id注入到页面
		$this->smarty->assign('province_id',$this->session->userdata(RegionTable::PROVINCE_ID));
		
		//所属院校id
		$this->smarty->assign('university_id',$this->session->userdata(RequestTable::REQUEST_REGION));
		
		//获取学校名,
		$this->getUniversityName();
		
		//用户id
		$this->smarty->assign('user_id',$this->session->userdata('user_'.UserTable::USER_ID));
		
		//用户名
		$this->smarty->assign('user_name',$this->session->userdata(UserTable::USER_NAME));
		
		//在session里面写入一个变量navEq，用来设置导航的默认选中,默认设置0，即首页
		$this->session->set_userdata('navEq',0);
		
	}
	
	/**
	 * 获取学校名，把学校的名称和id都查询出来，写入session,并把结果注入到页面
	 * 
	 * @return null
	 *
	 */
	protected function getUniversityName()
	{
		//如果region存在，根据id，查出学校名字
		if ($this->session->userdata(RequestTable::REQUEST_REGION))
		{
			$university = $this->regionModel->returnAllInfo(array(RegionTable::REGION_ID => $this->session->userdata(RequestTable::REQUEST_REGION)));
			
			//所属院校
			$this->smarty->assign('universityName',$university[0][RegionTable::UNIVERSITY]);
			
			//院校的所属省份id写入到session
			$this->session->set_userdata(RegionTable::PROVINCE_ID,$university[0][RegionTable::PROVINCE_ID]);
			//院校的所属省份id
			$this->smarty->assign(RegionTable::PROVINCE_ID,$university[0][RegionTable::PROVINCE_ID]);
		}
	}
	
	/**
	 * 把packet类返回的错误和默认值注入到页面中去
	 * 
	 * @param array $fieldArray
	 */
	protected function setErrorAndDefault($fieldArray = array())
	{
		foreach ($fieldArray as $key => $value)
		{
			$this->smarty->assign($value.'_error',form_error($value));
			$this->smarty->assign($value.'_val',set_value($value));
		}
	}
	
	/**
	 * 判断是否登录，如果没有登录，则跳转到登录页面
	 * 
	 */
	protected function judgeLogin ()
	{
		$this->load->model('userModel');
		if (!$this->userModel->haveLogin())
		{
			Tool::alertLocation(FRONT_URL.'user/login.html', '请先登录！');
		}
	}
}

/* End of file baseController Class */
/* Location: ./application/baseController/baseController.php */