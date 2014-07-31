<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 搜索packet
 * 
 * @author Coly
 * @version $ID 2012-10-6 $
 */
class SearchPacket extends Packet
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
						'field' => 'keywords',
						'label' => '搜索关键字',
						'rules' => 'trim|xss_cleans|htmlspecialchars'
		  	)
			);
	}
}

/* End of file SearchPacket Class */
/* Location: ./application/models/packet/searchpacket.php */