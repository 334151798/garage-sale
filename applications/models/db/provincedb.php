<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 省份的db类
 * 
 * @package BaseDb
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-8-21 $
 */

class ProvinceDb extends BaseDb
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


/** End of class ProvinceDb **/
/** End of file provincedb.php **/