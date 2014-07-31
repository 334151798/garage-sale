<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 表单验证包装类
 * 
 * 加载一些必须的文件，对表单进行验证的基类
 * @author Coly
 * @version $ID 2012-08-12 $
 */
class Packet
{
	//表单验证规则的数组，在子类中设置
	protected $_rules=array();
	//当前类中所有的字段名组成的数组，用来返回给控制器，用来在表单提交出错时设置错误提示和内容补全
	protected $_fieldArray = array();
	//CI类，
	protected $CI = null;
	
	/**
	 * 初始化控制器，载入CI
	 * 
	 */
	public function __construct()
	{
		//载入CI类，这样才可以在packet类中载入表单验证类等
		$this->CI = &get_instance();
		//加载表单验证类
		$this->CI->load->library('form_validation');
		//记载表单的错我显示中文包，文件放在language/chinese/文件夹下
		$this->CI->lang->load('form_validation','chinese');
		//定义回显错误的左右定界符
		$this->CI->form_validation->set_error_delimiters('<strong class="error">', '</strong>');
		
	}
	
	/**
	 * 自定义一个设置规则的方法，把所有的规则按照要求写进数组里，进行遍历，设置验证规则
	 * 
	 * @access protected
	 * @return null
	 */
	protected function _setRules()
	{
		foreach ($this->_rules as $key => $value)
		{
			//设置验证规则
			$this->CI->form_validation->set_rules($value['field'],$value['label'],$value['rules']);
			//把所有的字段值放到数组里，返回给控制器使用
			$this->_fieldArray[$value['field']]=$value['field'];
		}
	}
	
	/**
	 * 将表单验证类的run方法包装，使其能在controller里面访问
	 * 
	 * @access public
	 * @return boolean
	 */
	public function run()
	{
		return $this->CI->form_validation->run();
	}
	
	/**
	 * 返回$this->$_fieldArray，以在控制器中访问
	 * 
	 * @access public
	 * @return array
	 */
	public function returnField()
	{
		return $this->_fieldArray;
	}
}

/* End of file packet Class */
/* Location: ./application/controller/packet.php */