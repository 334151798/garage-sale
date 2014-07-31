<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 导航的db类
 * 
 * @package BaseDb
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-8-21 $
 */

class ColumnDb extends BaseDb
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
	 * 获取所有的导航,包括品牌，同时把品牌都转换成了品牌名
	 * 
	 * @return array 返回查询到的结果集
	 */
	public function showAllColumn ()
	{
		//加入distinct关键字，获取无重复的数据
		$this->db->distinct();
		//写入获取的主要字段值
		$this->db->select(ColumnTable::TABLE_NAME.'.'.ColumnTable::COLUMN_ID.','.ColumnTable::TABLE_NAME.'.'.ColumnTable::COLUMN_NAME.','.ColumnTable::TABLE_NAME.'.'.ColumnTable::COLUMN_SORT.','.ColumnTable::TABLE_NAME.'.'.ColumnTable::COLUMN_BRAND.',COLUMN_table_2.'.ColumnTable::COLUMN_NAME.' as pidName');
		//排序
		$this->db->order_by(ColumnTable::TABLE_NAME.'.'.ColumnTable::COLUMN_PARENT_ID.' ASC , '.ColumnTable::TABLE_NAME.'.'.ColumnTable::COLUMN_SORT.' ASC');
		//左join自身，以获取COLUMN_pid
		$this->db->join(ColumnTable::TABLE_NAME.' as COLUMN_table_2','COLUMN_table_2.id = '.ColumnTable::TABLE_NAME.'.pid','left');
		//运行查询
		$query = $this->db->get(ColumnTable::TABLE_NAME);
	
		return $query->result_array();
	}
}


/** End of class ColumnDb **/
/** End of file columndb.php **/