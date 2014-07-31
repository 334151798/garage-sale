<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 分类(栏目)表
 * 
 * @author Coly
 * @version $ID 2012-08-12 $
 * @access final
 */
final class ColumnTable
{
	const TABLE_NAME       = 'thd_column';   //表名
	
	const COLUMN_ID        = 'id';       //分类的id
	
	const COLUMN_NAME      = 'column_name';  //分类的名字
	
	const COLUMN_INFO      = 'column_info';  //分类的简介
	
	const COLUMN_BRAND     = 'brand';    //该分类拥有的品牌
	
	const COLUMN_PRICE     = 'price';    //该分类的价格区间
	
	const COLUMN_PARENT_ID = 'pid';     //该分类的父分类的id，若为主分类，则pid=0
	
	const COLUMN_SORT      = 'sort';    //分类的排序值，值越小，越靠前
	
}


/* End of file ColumnTable Class */
/* Location: ./application/controller/columntable.php */