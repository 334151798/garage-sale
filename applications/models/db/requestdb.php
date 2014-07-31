<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 需求的db类
 * 
 * @package BaseDb
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-8-21 $
 */

class RequestDb extends BaseDb
{
	/**
	 * 初始化
	 */
	public function __construct($tableName)
	{
		parent::__construct();
		
		//设置表名
		parent::setTable($tableName);
	}
	
	/**
	 * 需求列表
	 *
	 * 默认按照发布日期排序
	 * @param  Array $where 可选参数，where条件
	 * @return Array 返回结果集
	 */
	public function requestList ($where = array())
	{
		$this->db->select($this->tableName.'.*');
		//供需类型
		$this->db->join(TypeTable::TABLE_NAME,TypeTable::TABLE_NAME.'.'.TypeTable::TYPE_ID.'='.RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_TYPE,'left');
		$this->db->select(TypeTable::TABLE_NAME.'.'.TypeTable::TYPE_NAME);
		//所属分类
		$this->db->join(ColumnTable::TABLE_NAME,ColumnTable::TABLE_NAME.'.'.ColumnTable::COLUMN_ID.'='.RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_COLUMN,'left');
		$this->db->select(ColumnTable::TABLE_NAME.'.'.ColumnTable::COLUMN_NAME);
		//所属品牌
		$this->db->join(BrandTable::TABLE_NAME,BrandTable::TABLE_NAME.'.'.BrandTable::BRAND_ID.'='.RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_BRAND_MAIN,'left');
		$this->db->select(BrandTable::TABLE_NAME.'.'.BrandTable::BRAND_NAME);
		//新旧程度
		$this->db->join(OldLevelTable::TABLE_NAME,OldLevelTable::TABLE_NAME.'.'.OldLevelTable::OLD_LEVEL_ID.'='.RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_OLD_LEVEL,'left');
		$this->db->select(OldLevelTable::TABLE_NAME.'.'.OldLevelTable::OLD_LEVEL_NAME);
		//用户
		$this->db->join(UserTable::TABLE_NAME,UserTable::TABLE_NAME.'.'.UserTable::USER_ID.'='.RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_USER,'left');
		$this->db->select(UserTable::TABLE_NAME.'.'.UserTable::USER_NAME);
		//所属区域
		$this->db->join(RegionTable::TABLE_NAME,RegionTable::TABLE_NAME.'.'.RegionTable::REGION_ID.'='.RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_REGION,'left');
		$this->db->select(RegionTable::TABLE_NAME.'.'.RegionTable::UNIVERSITY);
		//按照发布时间,新的在前
		$this->db->order_by(RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_PUBLISH_TIME.' DESC');
		//当$where有值时才加入where
		if (count($where) > 0)
		{
			$this->db->where($where);
		}
		//这里的limit是用来做分页的，limit的第一个参数是每页显示的条数，第2个参数是从第多少条数据开始取
		if (count($this->limit) > 0)
		{
			$this->db->limit($this->limit[0],$this->limit[1]);
		}
		$query = $this->db->get($this->tableName);
	
		return $query->result_array();
	}
	
	/**
	 * 搜索（获取需求&分页）
	 *
	 * @param array $where 搜索条件
	 * @param array $likeArray like条件
	 * @return array 返回搜索到的结果集
	 */
	public function searchList ($where = array(),$likeArray = array())
	{
	
		$this->db->select($this->tableName.'.*');
	
		//所属品牌
		$this->db->join(BrandTable::TABLE_NAME,BrandTable::TABLE_NAME.'.'.BrandTable::BRAND_ID.'='.RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_BRAND_MAIN,'left');
		$this->db->select(BrandTable::TABLE_NAME.'.'.BrandTable::BRAND_NAME);
	
		//所属区域
		$this->db->join(RegionTable::TABLE_NAME,RegionTable::TABLE_NAME.'.'.RegionTable::REGION_ID.'='.RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_REGION,'left');
		$this->db->select(RegionTable::TABLE_NAME.'.'.RegionTable::UNIVERSITY);
	
		//当$where有值时才加入where
		if (count($where) > 0)
		{
			$this->db->where($where);
		}
	
		// 		$likeArray = array(RequestTable::REQUEST_TITLE => $keyWords,RequestTable::REQUEST_INFO => $keyWords);
	
		//按照发布时间,新的在前
		$this->db->order_by(RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_PUBLISH_TIME.' DESC');
	
	
		//这里的limit是用来做分页的，limit的第一个参数是每页显示的条数，第2个参数是从第多少条数据开始取
		if (count($this->limit) > 0)
		{
			$this->db->limit($this->limit[0],$this->limit[1]);
		}
	
		//like
		$this->db->like($likeArray);
	
	
		//得到结果
		return $this->db->get($this->tableName)->result_array();
	}
	
	/**
	 * 获取浏览人数最多的4条需求，首页上使用的
	 * @return array 结果集
	 */
	public function hotRequestList ()
	{
		//取id和title就行
		$this->db->select($this->tableName.'.'.RequestTable::REQUEST_ID.','.$this->tableName.'.'.RequestTable::REQUEST_TITLE);
		
		//取浏览人数最多的
		$this->db->order_by(RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_VIEW_COUNT.' DESC');
		
		//当$where有值时才加入where
		$this->db->where(array(RequestTable::REQUEST_STATUS => 1));
		
		//取4个就行
		$this->db->limit(4);
		
		//获取数据，返回
		return $this->db->get($this->tableName)->result_array();
	}
	
	
	
}


/** End of class RequestDb **/
/** End of file requestdb.php **/