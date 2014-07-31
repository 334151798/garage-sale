<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 价格区间表的类
 * 
 * 价格区间表，用来为每个分类设置所有的价格区间，在新增分类的时候可以选择，可多选
 * @author Coly
 * @version $ID 2012-08-12 $
 * @access final
 */
final class PriceTable
{
	const TABLE_NAME  = 'thd_price';    //表名
	
	const PRICE_ID    = 'id';           //价格的id
	
	const PRICE_START = 'price_start';  //起始价格
	
	const PRICE_END   = 'price_end';    //结束价格
}


/* End of file priceTable Class */
/* Location: ./application/models/tablemap/priceTable.php */