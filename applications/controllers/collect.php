<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 收藏
 *
 * @package BaseController
 * @subpackage CI_Controller
 * @author Coly
 * @version $ID 2012-9-15 $
 */
require_once 'applications/controllers/basecontroller.php';
class Collect extends BaseController
{
	/**
	 * 初始化控制器
	 */
	public function __construct()
	{
		parent::__construct();
		//判断登录
		$this->judgeLogin();
		$this->load->model(array('collectModel'));
	}
	
	/**
	 * 添加收藏
	 */
	public function add ()
	{
		echo $this->collectModel->add();
	}
	
	/**
	 * 取消收藏
	 */
	public function delete ()
	{
		echo $this->collectModel->delete();
	}
}

/* End of  Collect Class */
/* Location: ./application/controller/collect.php */