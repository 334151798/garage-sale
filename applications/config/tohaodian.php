<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*--------------------------------------------------------------------------
 * 自定义config开始
*/
/*页面编码*/
header('Content-type:text/html;charset=utf-8;');

//设置时区
date_default_timezone_set('Asia/Shanghai');

/*项目绝对路径*/
define('ROOT_PATH',substr(dirname(__FILE__),0,-6));

/*后台目录,其中applications是自定义的，原来名字是application，可以在index.php里面更改*/
define('ADMIN_PATH', $this->config['base_url'].'/applications/views/admin/');

/*前台根目录*/
define('FRONT_PATH', $this->config['base_url'].'/applications/views/front/');

/*后台url*/
define('ADMIN_URL',  $this->config['base_url'].'/admin/');

/*前台url*/
define('FRONT_URL',  $this->config['base_url'].'/');

/*新增成功提示*/
define('ADD_SUC_INFO', '新增成功！');

/*新增失败提示*/
define('ADD_FAILED_INFO', '新增失败！');

/*删除成功提示*/
define('DEL_SUC_INFO', '删除成功！');

/*删除失败提示*/
define('DEL_FAILED_INFO', '删除失败！');

/*修改成功提示*/
define('UPDATE_SUC_INFO', '修改成功！');

/*修改失败提示*/
define('UPDATE_FAILED_INFO', '修改失败！');

/*打开详情页参数获取失败提示*/
define('ERRORREQUESTID', '参数获取失败！');

/*搜索关键字不合法*/
define('SEARCHFAILEDINFO', '对不起，您搜索关键字不合法！');

/*请先选择学校*/
define('ERRORUNIVERSITY', '请先选择学校！');

/*联系我时，请说是在2号店看到的，谢谢！*/
define('CONTACTINFO', '联系我时，请说是在2号店看到的，谢谢！');

/*默认省市id。默认是上海*/
define('PROVINCE_ID', 2);
/*
 |--------------------------------------------------------------------------
| smarty配置
|--------------------------------------------------------------------------
|
*/
define('SMARTY_FRONT', 'front/');//前台皮肤路径
define('SMARTY_ADMIN', 'admin/');//后台皮肤目录
define('SMARTY_TEMPLATE_DIR', ROOT_PATH.'views/');//模板目录
define('SMARTY_COMPILE_DIR', ROOT_PATH.'compile/');//编译文件目录
define('SMARTY_CONFIG_DIR', ROOT_PATH.'configs/');//配置文件目录
define('SMARTY_CACHE_DIR', ROOT_PATH.'cache/');//缓存目录
define('SMARTY_CACHING', 0);//是否开启缓存，0代表关闭，1代表开启。网站开发阶段，关闭缓存
define('SMARTY_CACHE_LIFETIME', 60*60);//缓存的存在周期，以秒为单位，默认设置成1天
define('SMARTY_LEFT_DELIMITER', '{_');//定义定界符，防止把js、css之类的代码，也当成smarty解析,左定界
define('SMARTY_RIGHT_DELIMITER', '_}');//定义定界符，防止把js、css之类的代码，也当成smarty解析,右定界

//需求列表的默认图片的路径
define('DEFAULT_IMGS_PATH', 'images/default_request_pic.gif');

//分页时每页显示条数
define('PER_PAGE', '4');

//前台分页设置数组(首页)
$config['front_pagefen_index']=array(
		'base_url'=>'',
		'total_rows'=>'',
		'per_page'=>PER_PAGE,
		'num_links'=>2,
		'uri_segment'=>3,
		'use_page_numbers'=>true,
		'full_tag_open'=>'<ul class="pagefen">',
		'full_tag_close'=>'</ul>',
		'first_link'=>'FIRST',
		'first_tag_open'=>'<li>',//首页开始标签
		'first_tag_close'=>'</li>',//首页结束标签
		'num_tag_open'=>'<li>',//普通链接开始标签
		'num_tag_close'=>'</li>',//普通链接结束标签'
		'cur_tag_open'=>'<li class="onthis">',//当前页开始标签
		'cur_tag_close'=>'</li>',//当前页结束标签
		'prev_tag_open'=>'<li>',//上一页开始标签
		'prev_tag_close'=>'</li>',//上一页结束标签
		'next_tag_open'=>'<li>',//下一页开始标签
		'next_tag_close'=>'</li>',//下一页结束标签
		'last_link'=>'LAST',
		'prev_link'=>'PREV',
		'next_link'=>'NEXT'
);


//前台分页设置数组(需求页和搜索页)
$config['front_pagefen']=array(
		'base_url'=>'',
		'total_rows'=>'',
		'per_page'=>PER_PAGE,
		'num_links'=>8,
		'use_page_numbers'=>true,//让框架传递当前页，而不是当前是第多少条数据
		'enable_query_strings'=>true,//让分页以get方式传参
		'page_query_string'=>true,//支持get传参
		'query_string_segment'=>'p',//自定义页数的get，用p表示当前页数
		'full_tag_open'=>'<ul class="pagefen">',
		'full_tag_close'=>'</ul>',
		'first_link'=>'FIRST',
		'first_tag_open'=>'<li>',//首页开始标签
		'first_tag_close'=>'</li>',//首页结束标签
		'num_tag_open'=>'<li>',//普通链接开始标签
		'num_tag_close'=>'</li>',//普通链接结束标签'
		'cur_tag_open'=>'<li class="onthis">',//当前页开始标签
		'cur_tag_close'=>'</li>',//当前页结束标签
		'prev_tag_open'=>'<li>',//上一页开始标签
		'prev_tag_close'=>'</li>',//上一页结束标签
		'next_tag_open'=>'<li>',//下一页开始标签
		'next_tag_close'=>'</li>',//下一页结束标签
		'last_link'=>'LAST',
		'prev_link'=>'PREV',
		'next_link'=>'NEXT'
);


//后台分页设置数组
$config['admin_pagefen']=array(
		'base_url'=>'',
		'total_rows'=>'',
		'per_page'=>PER_PAGE,
		'num_links'=>2,
		'uri_segment'=>4,
		'use_page_numbers'=>true,
		'full_tag_open'=>'<div class="page_fen">',
		'full_tag_close'=>'</div>',
		'first_link'=>'首页',
		'last_link'=>'末页',
		'prev_link'=>'上一页',
		'next_link'=>'下一页'
		);


/**
 * 自动加载类
 * 
 * 根据类名的后缀判断是在哪个文件夹下面，来实现自动加载
 * @param string $className 系统自动加载时候传入的类名
 */
function __autoload($className){
	if(substr($className, -5)==='Table' && file_exists(ROOT_PATH.'models/tablemap/'.strtolower($className).'.php')){//table
		include ROOT_PATH.'models/tablemap/'.strtolower($className).'.php';
	}elseif (substr($className, -6)==='Packet' &&  ROOT_PATH.'models/packet/'.strtolower($className).'.php'){
		include ROOT_PATH.'models/packet/'.strtolower($className).'.php';
	}elseif (substr($className, -2)==='Db' &&  ROOT_PATH.'models/db/'.strtolower($className).'.php'){
		include ROOT_PATH.'models/db/'.strtolower($className).'.php';
	}
}
/* End of file tohaodian.php */
/* Location: ./application/config/tohaodian.php */