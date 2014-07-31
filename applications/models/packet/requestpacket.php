<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 新增需求的packet
 * 
 * @author Coly
 * @version $ID 2012-10-6 $
 */
class RequestPacket extends Packet
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
						'field' => RequestTable::REQUEST_ID,
						'label' => '需求id',
						'rules' => 'is_natural|trim|min_length[1]|max_length[16]|xss_cleans|htmlspecialchars'
		  	),
				array(
						'field' => RequestTable::REQUEST_USER,
						'label' => '发布人',
						'rules' => 'is_natural|trim|min_length[1]|max_length[16]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_TYPE,
						'label' => '需求类别',
						'rules' => 'is_natural|trim|required|min_length[1]|max_length[4]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_COLUMN,
						'label' => '需求所属主分类',
						'rules' => 'is_natural|trim|required|min_length[1]|max_length[4]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_NAV,
						'label' => '需求所属次分类',
						'rules' => 'is_natural|trim|required|min_length[1]|max_length[4]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_BRAND_MAIN,
						'label' => '需求物品的品牌大类',
						'rules' => 'is_natural|trim|required|min_length[1]|max_length[4]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_BRAND_SUB,
						'label' => '需求物品的品牌小类',
						'rules' => 'is_natural|trim|required|min_length[1]|max_length[4]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_OLD_LEVEL,
						'label' => '物品新旧程度',
						'rules' => 'is_natural|trim|required|min_length[1]|max_length[3]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_PRICE,
						'label' => '价格',
						'rules' => 'is_natural|trim|required|min_length[1]|max_length[6]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_TITLE,
						'label' => '需求的标题',
						'rules' => 'trim|required|min_length[5]|max_length[70]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_INFO,
						'label' => '需求详细信息',
						'rules' => 'trim|required|min_length[1]|max_length[2000]|xss_cleans'
				),
				array(
						'field' => RequestTable::REQUEST_THUMBS.'[]',
						'label' => '物品缩略图',
						'rules' => 'trim|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_CONTACT_NAME,
						'label' => '联系人名字',
						'rules' => 'trim|required|min_length[1]|max_length[10]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => RequestTable::REQUEST_TELEPHONE,
						'label' => '联系人手机号',
						'rules' => 'is_natural|trim|required|min_length[11]|max_length[11]|xss_cleans|htmlspecialchars'
				)
			);
	}
}

/* End of file ColumnPacket Class */
/* Location: ./application/models/packet/ColumnPacket.php */