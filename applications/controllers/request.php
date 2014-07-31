<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 供需管理控制器类（前台新增使用）
 * 
 * @package BaseController
 * @subpackage CI_Controller
 * @author Coly
 * @version $ID 2012-08-10 $
 */
require_once 'applications/controllers/basecontroller.php';

class Request extends BaseController
{
	/**
	 * 初始化控制器
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('requestModel','columnModel','brandModel','priceModel','regionModel','collectModel'));
		//设置导航选中
		$this->session->set_userdata('navEq',1);

		//获取学校的名字
		$this->getUniversityName();
		
		//把变量注入到页面中
		$this->smarty->assign('navEq',$this->session->userdata('navEq'));
		
		//载入分页类
		$this->load->library('pagination');
	}
	
	/**
	 * 判断是不是已经选择了学校
	 * 
	 * @return null
	 */
	public function judgeUniversity ()
	{
		$this->session->userdata(RequestTable::REQUEST_REGION) ? null : Tool::alertBack(ERRORUNIVERSITY);
	}
	
	/**
	 * 需求首页，即校园易物
	 * 
	 */
	public function index ()
	{
		//判断学校是否已经选择
		$this->judgeUniversity();
		
		/*筛选部分*/
		
		//pid=0表示主导航和主品牌
		$where = array(ColumnTable::COLUMN_PARENT_ID=>0);
		//主分类
		$this->smarty->assign('allMainColumn',$this->columnModel->returnAllInfo($where));
		//主品牌
		$this->smarty->assign('allMainBrand',$this->brandModel->returnAllInfo($where));
		//价格区间
		$this->smarty->assign('allPrice',$this->priceModel->returnAllInfo());
		//设置筛选
		$this->requestModel->setChoose();
		
		$this->smarty->display('front/request.html',$this->session->userdata('smartyPageCacheId'));
	}
	
	
	/**
	 * 需求详细页
	 *
	 * @param int $id   需求的id
	 */
	public function requestDetail ($id)
	{
		//如果id没有获取到，直接返回
		if (empty($id) || $id <= 0)
		{
			Tool::alertBack(ERRORREQUESTID);
		}
		
		//获取详细信息
		$detail = $this->requestModel->requestDetail($id);
		
		//联系提示信息，即在2号店上看到的。。。
		$this->smarty->assign('contactinfo',CONTACTINFO);
		
		$this->smarty->assign('requestDetail',$detail);
		
		//收藏改需求的人还收藏了。。
// 		$this->smarty->assign('similarRequest',$similarRequest);
		
		$this->smarty->display('front/request_detail.html',$id);
	}
	
	
	/**
	 * 新增供求信息
	 * 
	 * @access public 
	 */
	public function add()
	{
		//判断登录
		$this->judgeLogin();
		
		//判断学校
		$this->judgeUniversity();
		
		if ($this->input->post('submit'))
		{
			$this->_packClass = new RequestPacket();
			if ($this->_packClass->run())
			{
				if ($this->requestModel->requestAdd())
				{
					Tool::alertLocation(FRONT_URL.'user/center.html', ADD_SUC_INFO);
				}else 
				{
					Tool::alertBack(ADD_FAILED_INFO);
				}
				
			}else 
			{
				Tool::alertBack(ADD_FAILED_INFO);
				$this->setErrorAndDefault($this->_packClass->returnField());
			}
		}
		//pid=0表示主导航和主品牌
		$where = array(ColumnTable::COLUMN_PARENT_ID=>0);
		$this->smarty->assign('allMainColumn',$this->columnModel->returnAllInfo($where));
		$this->smarty->assign('allMainBrand',$this->brandModel->returnAllInfo($where));
		$this->smarty->assign('allRegion',$this->regionModel->returnAllInfo());
		$this->smarty->display('front/addRequest.html');
	}
	
	/**
	 * 修改需求
	 */
	public function update ()
	{
		//判断登录
		$this->judgeLogin();
		
		//先判断一下是不是提交，这是编辑之后提交
		if ($this->input->post('submit'))
		{
			//引入packet验证类
			$this->_packClass = new RequestPacket();
			if ($this->_packClass->run())
			{
				if ($this->requestModel->commonUpdate($this->_packClass->returnField()))
				{
					Tool::alertLocation(FRONT_URL.'user/center.html', UPDATE_SUC_INFO);
				}else
				{
					Tool::alertBack(UPDATE_FAILED_INFO);
				}
		
			}else
			{
				$this->setErrorAndDefault($this->_packClass->returnField());
			}
		}
		
		//pid=0表示主导航和主品牌
		$where = array(ColumnTable::COLUMN_PARENT_ID=>0);
		$this->smarty->assign('allMainColumn',$this->columnModel->returnAllInfo($where));
		$this->smarty->assign('allMainBrand',$this->brandModel->returnAllInfo($where));
		$this->smarty->assign('allRegion',$this->regionModel->returnAllInfo());
		
		//判断是不是这个用户发布的
		$detail = $this->requestModel->judgeUser();
		
		//把内容注入页面
		$this->smarty->assign('requestDetail',$detail);
		
		//把变量注入到页面中
		$this->smarty->assign('navEq',0);
		
		$this->smarty->display('front/updateRequest.html');
	}
	
	
	public function userDelete ()
	{
		$this->requestModel->commonUpdate();
	}
}

/* End of file Request Class */
/* Location: ./application/controller/request.php */