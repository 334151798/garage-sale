<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 品牌表的类
 * 
 * 品牌表，用来为每个分类设置所拥有的品牌，在新增分类的时候可以选择，可多选
 * 将每个表都做成类，把字段做成类的常量，这样方便更改，同时也可以为每个字段做说明
 * @author Coly
 * @version $ID 2012-08-12 $
 * @access final
 */
final class BrandTable
{
	const TABLE_NAME     = 'thd_brand';    //表名
	
	const BRAND_ID       = 'id';           //品牌的id
	
	const BRAND_NAME     = 'brand_name';   //品牌的名字
	
	const BRAND_PARENTID = 'pid';          //该品牌的父品牌，有的牌子有子系列，如果是一级品牌，pid=0
}


/* End of file brandTable Class */
/* Location: ./application/models/tablemap/brandTable.php */