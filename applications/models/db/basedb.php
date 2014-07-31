<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * DB基类
 * 
 * 只用来进行数据库的操作，和model分离，让model来做数据的处理
 * @package CI_Model
 * @author  Coly
 * @version $ID 2012-10-20 $
 */
class BaseDb extends CI_Model
{
	//当前表名
	protected $tableName = null;
	//用来存order，
	protected $order = null;
	//用来存储当根据某一个字段查询时的字段值
	protected $oneField = null;
	//用来存储limit，分页时使用的
	public $limit = array();
	
	/**
	 * 构造函数,载入数据库
	 */
	public function __construct()
	{
		//载入数据库
		$this->load->database();
	}
	
	/**
	 * 设置当前的表名
	 * 
	 * @param string $tableName 表名
	 * @return null
	 */
	public function setTable ($tableName)
	{
		//设置tableName
		$this->tableName = $tableName;
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
		$this->db->select('count(*) as total');
		if (count($where) > 0)
		{
			$this->db->where($where);
		}
		if (count($likeArray) > 0)
		{
			$this->db->like($likeArray);
		}
		$query = $this->db->get($this->tableName)->result_array();
		return $query[0]['total'];
	}
	
	/**
	 * 获取当前表下的所有数据
	 *
	 * @param 参数数组，key=>value形式，组成where语句
	 * @return array 返回所有信息组成的二维数组
	 */
	public function getAll($where = array())
	{
		if (count($where) > 0)
		{
			$this->db->where($where);
		}
		$query = $this->db->get($this->tableName);
		return $query->result_array();
	}
	
  /**
   * 通用的新增方法
   * 
   * @param  Array   $insertArray 要新增的键值对
   * @return boolean 成功返回true，失败返回false
   */
	public function commonAdd ($insertArray)
	{
		return $this->db->insert($this->tableName,$insertArray);
	}
	
	/**
	 * 通用修改方法
	 *
	 * 根据某些字段的值去修改某些字段的值
	 * @param array $updateArray 要修改的字段的键值对
	 * @param array $whereArray 要修改的where条件
	 * @return boolean 成功返回true，失败返回false
	 */
	public function commonUpdate($updateArray,$whereArray)
	{
		$this->db->where($whereArray);
		$this->db->limit(1);
		return $this->db->update($this->tableName,$updateArray);
	}
	
	
	/**
	 * 通用的删除方法
	 *
	 * 根据传来的id删除指定的导航
	 * @param  array $fieldId 获取到的key=>value数组
	 * @return boolean 成功返回true，失败返回false
	 */
	public function commonDelete ($fieldId)
	{
		$this->db->limit(1);
		return $this->db->delete($this->tableName,$fieldId);
	}
	
	/**
	 * 登录次数或者浏览次数加1，因为CI的数据库类不支持这样的写法，所以只能自己封装一个
	 *
	 * @param string $field  要改变的字段
	 * @param int $id        id
	 * @return boolean 成功返回true，失败返回false
	 */
	public function countPlus ($field,$id)
	{
		return $this->db->query("UPDATE $this->tableName SET $field=$field+1 WHERE id=$id");
	}
	
}
/* End of file BaseDb Class */
/* Location: ./application/controller/basedb.php */