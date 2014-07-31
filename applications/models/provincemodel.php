<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 所属省份model类
 * 
 * @package BaseModel
 * @author Coly
 * @version $ID 2012-08-16 $
 */

class ProvinceModel extends BaseModel
{
	/**
	 * 初始化构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		
		//设置当前的db类
		$this->dbClass = new ProvinceDb(ProvinceTable::TABLE_NAME);
	}
	
	
}

/* End of file ProvinceModel Class */
/* Location: ./application/models/provincemodel.php */