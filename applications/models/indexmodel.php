<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 首页model类
 * 
 * @package BaseModel
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-08-16 $
 */

class IndexModel extends BaseModel
{
	/**
	 * 初始化构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		
		//设置当前的db类
		$this->dbClass = new RequestDb(RequestTable::TABLE_NAME);
	}
	

	public function setPagination ($page)
	{
		//载入分页config
		$config = $this->CI->config->item('front_pagefen_index');
		//设置base_url
		$config['base_url'] = FRONT_URL.'index/index/';
		//总记录数
		$config['total_rows'] = $this->CI->requestModel->getCount();
		
		$this->CI->requestModel->dbClass->limit = array(PER_PAGE,($page-1)*PER_PAGE);
		
		$where = array(RequestTable::REQUEST_STATUS=>1);
		
		//所有的需求
		$this->CI->smarty->assign('requestList',$this->CI->requestModel->getRequestList($where));
		
		//初始化分页配置
		$this->CI->pagination->initialize($config);
	}
	
}

/* End of file IndexModel Class */
/* Location: ./application/models/indexmodel.php */