<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 需求表
 * 
 * 需求表，发布需求的表
 * @author Coly
 * @version $ID 2012-08-12 $
 * @access final
 */
final class RequestTable
{
	const TABLE_NAME                = 'thd_request';   //表名
	
	const REQUEST_ID                = 'id';       //需求的id
	
	const REQUEST_USER              = 'user';  //需求发布者的id
	
	const REQUEST_TYPE              = 'type';  //需求的类型，转让/求购/招租
	
	const REQUEST_COLUMN            = 'column';    //所属的主分类
	
	const REQUEST_NAV               = 'nav';    //该需求所属的子分类
	
	const REQUEST_BRAND_MAIN        = 'brand_main';    //该需求的商品的品牌
	
	const REQUEST_BRAND_SUB         = 'brand_sub';    //该需求的品牌下的子系列
	
	const REQUEST_OLD_LEVEL         = 'old_level';     //该需求的物品的新旧程度
	
	const REQUEST_PRICE             = 'price';    //期望的价格
	
	const REQUEST_TITLE             = 'title';    //需求的标题
	
	const REQUEST_INFO              = 'info';    //需求的详细信息
	
	const REQUEST_THUMBS            = 'thumbs';    //需求的缩略图
	
	const REQUEST_REGION            = 'region';    //需求所属的区域
	
	const REQUEST_CONTACT_NAME      = 'contact_name';    //联系人的姓名
	
	const REQUEST_TELEPHONE         = 'telephone';    //联系人的手机号
	
	const REQUEST_COLLECT_COUNT     = 'collect_count';    //收藏次数
	
	const REQUEST_VIEW_COUNT        = 'view_count';    //浏览次数
	
	const REQUEST_PUBLISH_TIME      = 'publish_time';    //发布时间
	
	const REQUEST_STATUS            = 'status';    //当前状态，默认是0，表示未审核，1表示审核
	
	const REQUEST_USER_DEL_STATUS   = 'user_del_status';    //用户是否删除状态，默认是0，表示未删除，1表示用户已删除
	
}


/* End of file RequestTable Class */
/* Location: ./application/controller/RequestTable.php */