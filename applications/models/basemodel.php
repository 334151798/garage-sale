<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model基类，主要用来载入一些公用的类，避免子类重复操作
 * 
 * @package CI_Model
 * @author Coly
 * @version $ID 2012-08-16 $
 */

class BaseModel
{
	//CI
	public $CI;
	
	//db类
	public $dbClass;
	
	public function __construct()
	{
		//载入CI
		$this->CI = &get_instance();
	}
	
	/**
	 * 获取当前表下的所有数据
	 *
	 * @param 参数数组，key=>value形式，组成where语句
	 * @return array 返回所有信息组成的二维数组
	 */
	public function returnAllInfo ($where = array())
	{
		return $this->dbClass->getAll($where);
	}
	
	
	/**
	 * 通用的新增方法
	 *
	 * @param  array   $fields 从验证类那里传来的当前表单需要更新的字段数组
	 * @return boolean 成功返回true，失败返回false
	 */
	public function commonAdd ($fields)
	{
		$postArray = array();
		//对通过input类的post方法获取到的数据进行遍历，根据判断所用的数组，筛选需要的值
		foreach ($this->CI->input->post() as $key=>$value )
		{
			if (in_array($key, $fields) && $key!='id')
			{
				$postArray[$key] = $value;
			}
			//是数组的，将其进行json之后存储
			if (is_array($value))
			{
				$postArray[$key] = json_encode($value);
			}
		}
		
		return $this->dbClass->commonAdd($postArray);
	}
	
	/**
	 * 通用修改方法
	 *
	 * 根据某些字段的值去修改某些字段的值
	 * @param  array   $fields 从验证类那里传来的当前表单需要更新的字段数组
	 * @return boolean 成功返回true，失败返回false
	 */
	public function commonUpdate ($fields)
	{
		//获取到的数据
		$dataArray = $this->CI->input->post();
		
		if (empty($dataArray['id']))
		{
			Tool::alertBack('参数获取失败');
		}
		
		$postArray = array();
		foreach ($dataArray as $key => $value)
		{
			if (in_array($key, $fields) && $key!='id')
			{
				$postArray[$key] = $value;
			}
			//是数组的，将其进行json之后存储
			if (is_array($value))
			{
				$postArray[$key] = json_encode($value);
			}
		}
		return $this->dbClass->commonUpdate($postArray, array('id' => $dataArray['id']));
	}
	
	/**
	 * 通用的删除方法
	 *
	 * 根据传来的id删除指定的导航
	 * @param array $fieldId 获取到的key=>value数组
	 * @return boolean 成功返回true，失败返回false
	 */
	public function commonDelete ($fieldId)
	{
		return $this->dbClass->commonDelete($fieldId);
	}
	
	/**
	 * 获取总记录条数
	 *
	 * @param  array $where 搜索条件
	 * @param  array $likeArray like条件
	 * @return int    返回总记录数
	 */
	public function getCount ($where = array(),$likeArray = array())
	{
		return $this->dbClass->getCount($where,$likeArray);
	}
	
	/**
	 * 登录次数或者浏览次数加1
	 *
	 * @param  string $field  要改变的字段
	 * @param  int $id        id
	 * @return boolean 成功返回true，失败返回false
	 */
	public function countPlus ($field,$id)
	{
		return $this->dbClass->countPlus($field, $id);
	}
}

/* End of file baseModel Class */
/* Location baseModel.php */