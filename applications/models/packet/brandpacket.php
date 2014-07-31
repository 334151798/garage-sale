<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 新增品牌的验证packet
 * 
 * @author Coly
 * @version $ID 2012-10-6 $
 */
class BrandPacket extends Packet
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
						'field' => BrandTable::BRAND_ID,
						'label' => '品牌id',
						'rules' => 'is_natural|trim|min_length[1]|max_length[2]|xss_cleans|htmlspecialchars'
		  	),
				array(
						'field' => BrandTable::BRAND_NAME,
						'label' => '品牌名',
						'rules' => 'trim|required|min_length[2]|max_length[15]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => BrandTable::BRAND_PARENTID,
						'label' => '品牌类型',
						'rules' => 'is_natural|trim|required|xss_cleans|htmlspecialchars'
				),
			);
	}
}

/* End of file ColumnPacket Class */
/* Location: ./application/models/packet/ColumnPacket.php */