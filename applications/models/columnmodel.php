<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 栏目的模型类
 * 
 * @package BaseModel
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-08-11 $
 */
class ColumnModel extends BaseModel{
	
	/**
	 * 初始化构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		
		//设置当前的db类
		$this->dbClass = new ColumnDb(ColumnTable::TABLE_NAME);
	}
	
	/**
	 * 获取所有的导航,包括品牌，同时把品牌都转换成了品牌名
	 */
	public function showAllColumn ()
	{
		//获取结果
		$result = $this->dbClass->showAllColumn();
		
		//在当前类中载入品牌model
		$this->CI->load->model('brandModel');
		
		$newResult = array();
		
		foreach ($result as $k => $v)
		{
			$v['brand'] = implode(',', $this->CI->brandModel->getBrandNameFromArray(json_decode($v['brand'])));
			$newResult[] = $v;
		}
		return $newResult;
		
	}
	
}

/* End of file ColumnModel Class */
/* Location: ./application/models/admin/ColumnModel.php */