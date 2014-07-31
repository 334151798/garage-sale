<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 用户个人资料的packet
 * 
 * @author Coly
 * @version $ID 2012-10-6 $
 */
class UserDataPacket extends Packet
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
						'field' => UserTable::USER_ID,
						'label' => '用户id',
						'rules' => 'numeric|trim|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => UserTable::USER_PIC,
						'label' => '用户头像',
						'rules' => 'trim|min_length[5]|max_length[200]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => UserTable::USER_CELLPHONE,
						'label' => '手机号码',
						'rules' => 'numeric|trim|min_length[11]|max_length[11]|xss_cleans|htmlspecialchars'
		  	),
				array(
						'field' => UserTable::USER_QQ,
						'label' => 'QQ',
						'rules' => 'trim|min_length[5]|max_length[11]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => UserTable::USER_PROVINCE,
						'label' => '省份',
						'rules' => 'numeric|trim|min_length[1]|max_length[20]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => UserTable::USER_UNIVERSITY,
						'label' => '院校',
						'rules' => 'numeric|trim|min_length[1]|max_length[20]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => UserTable::USER_TRUE_NAME,
						'label' => '真实姓名',
						'rules' => 'trim|min_length[2]|max_length[6]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => UserTable::USER_SEX,
						'label' => '性别',
						'rules' => 'numeric|min_length[1]|max_length[6]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => UserTable::USER_BIRTH_DAY,
						'label' => '生日',
						'rules' => 'min_length[2]|max_length[10]|xss_cleans|htmlspecialchars'
				),
			);
	}
}

/* End of file UserDataPacket Class */
/* Location: ./application/models/packet/userdatapacket.php */