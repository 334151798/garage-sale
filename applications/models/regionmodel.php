<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 所属学校model类
 * 
 * @package BaseModel
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-08-16 $
 */

class RegionModel extends BaseModel
{
	/**
	 * 初始化构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		
		//设置当前的db类
		$this->dbClass = new RegionDb(RegionTable::TABLE_NAME);
	}
	
	/**
	 * 设置学校
	 *
	 * ajax使用，根据get获取到的id，设置学校，成功之后，把学校的具体信息获取出来
	 * @return null
	 */
	public function setCollege()
	{
		$getArray = $this->CI->input->get();
		$this->CI->session->set_userdata(RequestTable::REQUEST_REGION,$getArray['university_id']);
	}
	
	/**
	 * 获取学校
	 *
	 * 根据省市的id，获取当前省市的所有学校，ajax使用，输出json格式
	 * @return string 当前省市的所有学校，ajax使用，输出json格式
	 */
	public function getCollege ()
	{
		$result = $this->returnAllInfo($this->CI->input->get());
		return json_encode($result);
	}
}

/* End of file brandModel Class */
/* Location: ./application/models/brandModel.php */