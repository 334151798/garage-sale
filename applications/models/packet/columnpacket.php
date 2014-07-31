<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 新增分类的packet
 * 
 * @author Coly
 * @version $ID 2012-10-6 $
 */
class ColumnPacket extends Packet
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
						'field' => ColumnTable::COLUMN_ID,
						'label' => '分类id',
						'rules' => 'is_natural|trim|min_length[1]|max_length[2]|xss_cleans|htmlspecialchars'
		  	),
				array(
						'field' => ColumnTable::COLUMN_NAME,
						'label' => '分类名',
						'rules' => 'trim|required|min_length[2]|max_length[15]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => ColumnTable::COLUMN_SORT,
						'label' => '分类排序',
						'rules' => 'is_natural|trim|required|min_length[1]|max_length[2]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => ColumnTable::COLUMN_PARENT_ID,
						'label' => '分类类型',
						'rules' => 'is_natural|trim|required|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => ColumnTable::COLUMN_BRAND.'[]',
						'label' => '分类品牌',
						'rules' => 'is_natural|trim|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => ColumnTable::COLUMN_PRICE.'[]',
						'label' => '分类价格',
						'rules' => 'is_natural|trim|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => ColumnTable::COLUMN_INFO,
						'label' => '分类描述',
						'rules' => '|trim|max_length[20]|xss_cleans|htmlspecialchars'
						)
			);
	}
}

/* End of file ColumnPacket Class */
/* Location: ./application/models/packet/ColumnPacket.php */