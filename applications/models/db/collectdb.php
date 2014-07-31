<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 收藏的db类
 * 
 * @package BaseDb
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-8-21 $
 */

class CollectDb extends BaseDb
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
}


/** End of class CollectDb **/
/** End of file collectdb.php **/