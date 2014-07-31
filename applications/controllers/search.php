<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 搜索class
 *
 * @package BaseController
 * @subpackage CI_Controller
 * @author Coly
 * @version $ID 2012-9-15 $
 */
require_once 'applications/controllers/basecontroller.php';
class Search extends BaseController
{
	/**
	 * 初始化控制器
	 */
	public function __construct()
	{
		parent::__construct();
		//判断登录
		//		$this->judgeLogin();
		$this->load->model(array('requestModel','columnModel','brandModel','priceModel','regionModel','searchModel'));
		
		//载入分页类
		$this->load->library('pagination');
	}
	
	/**
	 * 搜索首页
	 */
	public function index ()
	{
		//如果是提交
// 		if ($this->input->post('submit'))
// 		{
			//载入验证类，进行过滤
// 		$this->_packClass = new SearchPacket();
// 		if ($this->_packClass->run())
// 		{
			//设置筛选 获取搜索结果
			$this->searchModel->setChoose();
// 		}else 
// 		{
// 			Tool::alertBack(SEARCHFAILEDINFO);
// 		}
// 		}
		
		/*筛选部分*/
		
		//pid=0表示主导航和主品牌
		$where = array(ColumnTable::COLUMN_PARENT_ID=>0);
		//主分类
		$this->smarty->assign('allMainColumn',$this->columnModel->returnAllInfo($where));
		//主品牌
		$this->smarty->assign('allMainBrand',$this->brandModel->returnAllInfo($where));
		//价格区间
		$this->smarty->assign('allPrice',$this->priceModel->returnAllInfo());
		
		//把搜索词注入页面
		$this->smarty->assign('searchKeyWords',$this->session->userdata('searchKeyWords'));
		
		$this->smarty->display('front/search.html',$this->session->userdata('smartyPageCacheIdSearch'));
	}
}

/* End of file search.php Class */
/* Location: ./application/controller/search.php */