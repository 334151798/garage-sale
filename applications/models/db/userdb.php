<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 用户的db类
 * 
 * @package BaseDb
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-8-21 $
 */

class UserDb extends BaseDb
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
	 * 根据邮箱或者用户名登陆
	 * 
	 * @param  array $loginArray 传过来的数据，有可能是用户名，也有可能是邮箱
	 * @return array 返回登陆后得到的结果，如果登陆失败，再返回空
	 */
	public function userLogin ($loginArray)
	{
		//设置where，用户名
		$this->db->where(UserTable::USER_NAME,$loginArray[UserTable::USER_NAME]);
		
		//设置where，邮箱
		$this->db->or_where(UserTable::USER_EMAIL,$loginArray[UserTable::USER_NAME]);
		
		//取数据
		return $this->db->get($this->tableName)->result_array();
	}
}


/** End of class UserDb **/
/** End of file userdb.php **/