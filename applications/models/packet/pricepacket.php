<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 新增价格区间的packet
 * 
 * @author Coly
 * @version $ID 2012-10-6 $
 */
class PricePacket extends Packet
{
	public function __construct()
	{
		parent::__construct();
		//把验证规则定义在一个数组里
		$this->_setRulesArray();
		//遍历数组，设置验证规则
		$this->_setRules();
	}
	
	/**
	 * 把字段和验证规则放到数组里
	 * 
	 * @access private
	 * @return null
	 */
	private function _setRulesArray()
	{
		//定义验证规则
		$this->_rules=array(
				array(
						'field' => PriceTable::PRICE_ID,
						'label' => '价格id',
						'rules' => 'is_natural|trim|min_length[1]|max_length[2]|xss_cleans|htmlspecialchars'
		  	),
				array(
						'field' => PriceTable::PRICE_START,
						'label' => '价格起始值',
						'rules' => 'is_natural|trim|required|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => PriceTable::PRICE_END,
						'label' => '价格结束值',
						'rules' => 'is_natural|trim|required|xss_cleans|htmlspecialchars'
				),
			);
	}
}

/* End of file ColumnPacket Class */
/* Location: ./application/models/packet/ColumnPacket.php */