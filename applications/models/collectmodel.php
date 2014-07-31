<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 收藏model类
 * 
 * @package BaseModel
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-08-16 $
 */
class CollectModel extends BaseModel
{
	/**
	 * 初始化构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		
		//设置当前的db类
		$this->dbClass = new CollectDb(RequestCollectTable::TABLE_NAME);
	}
	
	
	/**
	 * 获取所有的收藏的需求列表
	 * 
	 * @return array 返回需求列表
	 * 
	 */
	public function requestCollectList ()
	{
		return $this->dbClass->getAll(array(RequestCollectTable::REQUEST_USER_ID => $this->CI->session->userdata( 'user_'.UserTable::USER_ID)));
	}
	
	
	/**
	 * 获取所有的收藏的推荐商品列表
	 *
	 * @return array 返回推荐商品列表
	 *
	 */
	public function goodsCollectList ()
	{
// 		$this->tableName = ;
// 		return $this->returnAllInfo(array(RequestCollectTable::REQUEST_COLLECT_ID => $this->CI->session->userdata( 'user_'.UserTable::USER_ID)));
	
	}
	
	/**
	 * 增加收藏
	 * 
	 * @return boolean 返回新增的结果，成功true，失败false
	 */
	public function add ()
	{
		//接受post数据
		$postArray = $this->CI->input->post();
		
		//增加user_id
		$postArray[RequestCollectTable::REQUEST_USER_ID] =  $this->CI->session->userdata('user_'.UserTable::USER_ID);
		
		//新增
		return $this->dbClass->commonAdd($postArray);
	}
	
	/**
	 * 取消收藏
	 * 
	 * @return boolean 返回删除的结果，成功true，失败false
	 */
	public function delete ()
	{
		//接受post数据
		$postArray = $this->CI->input->post();
	
		//增加user_id
		$postArray[RequestCollectTable::REQUEST_USER_ID] =  $this->CI->session->userdata('user_'.UserTable::USER_ID);
	
		//删除
		return $this->dbClass->commonDelete($postArray);
	}
	
}

/* End of  CollectModel Class */
/* Location: ./application/models/collectmodel.php */