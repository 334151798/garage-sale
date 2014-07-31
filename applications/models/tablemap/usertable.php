<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 前端用户表
 * 
 * @author Coly
 * @version $ID 2012-08-20 $
 * @access final
 */
final class UserTable
{
	const TABLE_NAME            = 'thd_user';   //表名
	
	const USER_ID               = 'id';       //用户的id
	
	const USER_OPEN_ID          = 'open_id';  //QQ登录时使用，用来存储QQ登录时，腾讯返回的openid
	
	const USER_NAME             = 'user_name';  //用户名
	
	const USER_EMAIL            = 'email';    //用户email
	
	const USER_PROVINCE         = 'province';    //用户所在的省
	
	const USER_UNIVERSITY       = 'university';    //用户大学
	
	const USER_ACTIVE           = 'active';    //用户激活码存储，将用户名用sha1加密生成的
	
	const USER_PASSWORD         = 'password';    //用户的密码
	
	const USER_CELLPHONE        = 'cellphone';    //用户的手机号
	
	const USER_PIC              = 'pic';     //用户的头像地址
	
	const USER_QQ               = 'qq';    //QQ号
	 
	const USER_SEX              = 'sex';    //用户性别
	
	const USER_TRUE_NAME        = 'true_name';    //用户真实名字
	
	const USER_BIRTH_DAY        = 'birth_day';    //用户的生日
	
	const USER_AREA             = 'area';    //用户的详细地址
	
	const USER_REG_TIME         = 'reg_time';    //用户注册的时间
	
	const USER_REG_IP           = 'reg_ip';    //用户注册的时间
	
	const USER_LAST_IP          = 'last_ip';    //上次登录的IP地址
	
	const USER_LAST_LOGIN_TIME  = 'last_login_time';    //上次登录的时间
	
	const USER_LOGIN_COUNT      = 'login_count';    //登录次数总计
	
}


/* End of file UserTable Class */
/* Location: ./application/controller/userTable.php */