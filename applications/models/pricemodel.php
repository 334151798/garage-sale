<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 价格model类
 * 
 * @package BaseModel
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-08-16 $
 */

class PriceModel extends BaseModel
{
	/**
	 * 初始化构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		
		//设置当前的db类
		$this->dbClass = new PriceDb(PriceTable::TABLE_NAME);
	}
}

/* End of file brandModel Class */
/* Location: ./application/models/brandModel.php */