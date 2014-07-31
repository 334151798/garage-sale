<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 品牌的db类
 * 
 * @package BaseDb
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-8-21 $
 */

class BrandDb extends BaseDb
{
	/**
	 * 初始化
	 */
	public function __construct($tableName)
	{
		parent::__construct();
		
		//设置表名
		parent::setTable($tableName);
	}
	
	/**
	 * 获取所有的品牌表的信息，同时把pid品牌都转换成了品牌名
	 * 
	 * @return array 返回结果集
	 */
	public function showAllBrand ()
	{
		//加入distinct关键字，获取无重复的数据
		$this->db->distinct();
		//写入获取的主要字段值
		$this->db->select(BrandTable::TABLE_NAME.'.'.BrandTable::BRAND_ID.', '.BrandTable::TABLE_NAME.'.'.BrandTable::BRAND_NAME.',brand_table_2.brand_name as pid_name');
		//排序
		$this->db->order_by(BrandTable::TABLE_NAME.'.'.BrandTable::BRAND_PARENTID.' ASC');
		//左join自身，以获取brand_pid
		$this->db->join(BrandTable::TABLE_NAME.' as brand_table_2','brand_table_2.id = '.BrandTable::TABLE_NAME.'.pid','left');
		//运行查询
		$query = $this->db->get($this->tableName);
		return $query->result_array();
	
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
		$s = array();
		$this->db->select(BrandTable::TABLE_NAME.'.'.BrandTable::BRAND_NAME);
		$this->db->where_in(BrandTable::BRAND_ID,$brandArray);
		$navName=$this->db->get(BrandTable::TABLE_NAME)->result_array();
		foreach ($navName as $key =>$value)
		{
			$s[] = $value[BrandTable::BRAND_NAME];
		}
		return $s;
	}
}


/** End of class BrandDb **/
/** End of file branddb.php **/