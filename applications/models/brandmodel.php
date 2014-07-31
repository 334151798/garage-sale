<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 品牌model类
 * 
 * @package BaseModel
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-08-16 $
 */

class BrandModel extends BaseModel
{
	/**
	 * 初始化构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		
		//设置当前的db类
		$this->dbClass = new BrandDb(BrandTable::TABLE_NAME);
	}
	
	/**
	 * 获取所有的品牌表的信息，同时把pid品牌都转换成了品牌名
	 * 
	 * @return array 返回结果集
	 */
	public function showAllBrand ()
	{
		return $this->dbClass->showAllBrand();
	}
	
	
	/**
	 * 返回指定数组里面指定id的品牌列表的品牌名
	 * 
	 * @access public 
	 * @param array $brandArray 传递的所有的品牌的id组成的数组
	 * @return array 返回查找出来的所有对应id的品牌名组成的数组
	 */
	public function getBrandNameFromArray($brandArray)
	{
		return $this->dbClass->getBrandNameFromArray($brandArray);
	}
	
}

/* End of file brandModel Class */
/* Location: ./application/models/brandModel.php */