<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 首页class
 * 
 * @package BaseController
 * @subpackage CI_Controller
 * @author Coly
 * @version $ID 2012-8-25 $
 */
require_once 'applications/controllers/basecontroller.php';
class Index extends BaseController
{
	/**
	 * 初始化控制器
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('indexModel','requestModel','columnModel','brandModel','priceModel','regionModel'));
		$this->load->library('pagination');
		//把变量注入到页面中
		$this->smarty->assign('navEq',$this->session->userdata('navEq'));
	}
	
	/**
	 * 首页
	 */
	public function index ($page =1)
	{
		//设置分页并且注入需求列表
		$this->indexModel->setPagination($page);
		
		//注册分页变量
		$this->smarty->assign('pageFen',$this->pagination->create_links());
		
		//浏览人数最多的4条需求
		$this->smarty->assign('hotRequestList',$this->requestModel->hotRequestList());
		
		//这里因为要分页，所以增加一个参数
		$this->smarty->display('front/index.html',$page.$this->session->userdata(RequestTable::REQUEST_REGION));
	}
}

/* End of file index.php Class */
/* Location: ./application/controller/index.php */