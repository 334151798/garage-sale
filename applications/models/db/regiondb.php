<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 区域（即学校）的db类
 * 
 * @package BaseDb
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-8-21 $
 */

class RegionDb extends BaseDb
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


/** End of class RegionDb **/
/** End of file regiondb.php **/