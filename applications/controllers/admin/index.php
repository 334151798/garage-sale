<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台首页
 * 
 * @package CI_Controller
 * @author Coly
 * @version $ID 2012-08-10 $
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
	}
	
	/**
	 * 后台首页
	 * 
	 * @access public 
	 * @return null
	 */
	public function index()
	{
		$this->smarty->display('admin/admin.html');
	}
	
}

/* End of file Index Class */
/* Location: ./application/baseController/index.php */