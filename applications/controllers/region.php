<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 选择学校class
 *
 * @package BaseController
 * @subpackage CI_Controller
 * @author Coly
 * @version $ID 2012-9-15 $
 */
require_once 'applications/controllers/basecontroller.php';
class Region extends BaseController
{
	/**
	 * 初始化控制器
	 */
	public function __construct()
	{
		parent::__construct();
		//判断登录
		//		$this->judgeLogin();
		$this->load->model(array('regionModel'));
	}
	
	/**
	 * 选择学校页面
	 */
	public function index ()
	{
		//获取所有的学校
		$result = $this->regionModel->returnAllInfo(array(RegionTable::PROVINCE_ID => $this->session->userdata(RegionTable::PROVINCE_ID)));
		
		//把所有的学校放到页面中
		$this->smarty->assign('collegeList',$result);
		
		$this->smarty->display('front/college.html');
	}
	
	/**
	 * 设置学校
	 * 
	 * ajax使用，根据get获取到的id，设置学校，成功之后，把学校的具体信息获取出来
	 */
	public function setCollege()
	{
		$this->regionModel->setCollege();
		$this->getUniversityName();
	}
	
	
	/**
	 * 获取学校
	 * 
	 * 根据省市的id，获取当前省市的所有学校，ajax使用，输出json格式
	 */
	public function getCollege ()
	{
		echo $this->regionModel->getCollege();
	}
}

/* End of file search.php Class */
/* Location: ./application/controller/search.php */