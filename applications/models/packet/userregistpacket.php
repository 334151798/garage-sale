<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 用户注册的packet
 * 
 * @author Coly
 * @version $ID 2012-10-6 $
 */
class UserRegistPacket extends Packet
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
						'field' => UserTable::USER_NAME,
						'label' => '用户名',
						'rules' => 'required|trim|min_length[5]|max_length[20]|xss_cleans|htmlspecialchars'
		  	),
				array(
						'field' => UserTable::USER_EMAIL,
						'label' => '邮箱',
						'rules' => 'valid_email|required|trim|min_length[6]|max_length[30]|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => UserTable::USER_PASSWORD,
						'label' => '密码',
						'rules' => 'required|trim|required|min_length[6]|max_length[20]|sha1|xss_cleans|htmlspecialchars'
				),
				array(
						'field' => 're_'.UserTable::USER_PASSWORD,
						'label' => '密码确认',
						'rules' => 'matches['.UserTable::USER_PASSWORD.']|required|xss_cleans|htmlspecialchars'
				),
			);
	}
}

/* End of file UserRegistPacket Class */
/* Location: ./application/models/packet/userregistpacket.php */