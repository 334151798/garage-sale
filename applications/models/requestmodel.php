<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 需求的model类
 * 
 * @package BaseModel
 * @author Coly
 * @version $ID 2012-8-21 $
 */

class RequestModel extends BaseModel
{
	/**
	 * 初始化
	 */
	public function __construct()
	{
		parent::__construct();
		
		//设置当前的db类
		$this->dbClass = new RequestDb(RequestTable::TABLE_NAME);
	}
	
	/**
	 * 首页和需求页的需求列表
	 *
	 * @param  Array $where 可选参数，where条件
	 * @return Array 返回处理后的结果集
	 */
	public function getRequestList ($where = array())
	{
		//获取需求列表
		$result = $this->dbClass->requestList($where);
		
		//处理数据
		foreach ($result as $key => $value)
		{
			//上传的图片中，取第一张，作为大图，如果没有图片，使用默认图片
			$thumbs = json_decode($value[RequestTable::REQUEST_THUMBS]);
			if (count($thumbs)> 0)
			{
				/*
				 * 如果有图片
				* 因为返回的是大图的路径，小图路径是_thumb+扩展名，所以这里进行一下替换
				*/
		
				//取第一张用于显示
				$largePath = $thumbs[0];
				//获取扩展名
				$extrName  = Tool::getExtraName($largePath);
				//将大图路径中的.+扩展名替换成_thumb+.+扩展名，即小图的路径
				$smallPath = str_replace('.'.$extrName, '_thumb.'.$extrName, $largePath);
		
				$result[$key][RequestTable::REQUEST_THUMBS] = $smallPath;
			}else
			{
				$result[$key][RequestTable::REQUEST_THUMBS] = DEFAULT_IMGS_PATH;
			}
				
			//距离当前是几天前
			$gap=time()-strtotime($value[RequestTable::REQUEST_PUBLISH_TIME]);
			$result[$key]['from_days'] = date('m',$gap)-1>=1 ? (date('m',$gap)-1)*30+date('d',$gap)-1 :date('d',$gap)-1;
		
			//因为这个地方是在首页或者需求页面以列表显示的，所以把html标签给去了
			$result[$key][RequestTable::REQUEST_INFO] = strip_tags($value[RequestTable::REQUEST_INFO]);
		}
		
		return $result;
	}
	
	/**
	 * 后台使用的需求列表
	 *
	 * @param  Array $where 可选参数，where条件
	 * @return Array 返回处理后的结果集
	 */
	public function getRequestListAdmin ($where = array())
	{
		//获取需求列表
		$result = $this->dbClass->requestList($where);
		
		foreach ($result as $key => $value)
		{
			//上传的图片中，取第一张，作为大图，如果没有图片，使用默认图片
			$result[$key][RequestTable::REQUEST_THUMBS] = json_decode($value[RequestTable::REQUEST_THUMBS]);
			if (count($result[$key]['thumbs'])> 0)
			{
				/*
				 * 如果有图片
				* 因为返回的是大图的路径，小图路径是_thumb+扩展名，所以这里进行一下替换
				*/
				$result[$key]['thumbs_small'] = array();
				//取第一张用于显示
				foreach ($result[$key][RequestTable::REQUEST_THUMBS] as $k => $v)
				{
					$largePath = $v;
					//获取扩展名
					$extrName  = Tool::getExtraName($largePath);
						
					//将大图路径中的.+扩展名替换成_thumb+.+扩展名，即小图的路径
					$smallPath = str_replace('.'.$extrName, '_thumb.'.$extrName, $largePath);
						
					$result[$key]['thumbs_small'][] = $smallPath;
				}
			}
		
		}
		return $result;
	}
	
	/**
	 * 根据获取到的id，返回需求的详细信息
	 * 
	 * @param  int $id 需求的id
	 * @return array 需求信息数组
	 */
	public function requestDetail ($id)
	{
		//获取该需求的所有信息
		$detail = $this->getRequestListAdmin(array(RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_ID =>$id));
		
		//如果id不正确，即没有数据
		if (!count($detail)>0)
		{
			Tool::alertBack(ERRORREQUESTID);
		}
		
		//把该需求的浏览次数加1
		$this->dbClass->countPlus(RequestTable::REQUEST_VIEW_COUNT,$id);
		
		//去收藏表里面查找，去除所有收藏这条需求的收藏
		$collect = $this->CI->collectModel->returnAllInfo(array(RequestCollectTable::REQUEST_ID => $detail[0][RequestTable::REQUEST_ID]));
		
		$similarRequest =array();
		//如果有收藏
		if(count($collect)>0)
		{
			foreach ($collect as $key => $value)
			{
				//看看用户是不是收藏了这个需求,如果是，把$detail[0]['hasCollect']设为1，否则设为0
				if ($value[RequestCollectTable::REQUEST_USER_ID] === $this->CI->session->userdata('user_'.UserTable::USER_ID))
				{
					$detail[0]['hasCollect'] = 1;
				}else
				{
					//取出收藏了改需求的人还收藏的其他需求,只取第一个人的
// 					$similarRequest[] = $this->getRequestList(array(RequestTable::REQUEST_USER => $value[RequestCollectTable::REQUEST_ID]));
				}
			}
				
		}else
		{
			$detail[0]['hasCollect'] = 0;
		}
		
		return $detail[0];
	}
	
	/**
	 * 需求的新增方法
	 *
	 * @return boolean 返回新增的结果，成功true，失败false
	 */
	public function requestAdd ()
	{
		$addArray = array();
		$addArray[RequestTable::REQUEST_USER] = $this->CI->session->userdata('user_'.UserTable::USER_ID);//用户id
		$addArray[RequestTable::REQUEST_PUBLISH_TIME] = date('Y-m-d H:i:s');//发布时间
		$addArray[RequestTable::REQUEST_REGION] = $this->CI->session->userdata(RequestTable::REQUEST_REGION);//所属区域
		foreach ($this->CI->input->post() as $key => $value)
		{
			//是数组的，将其转为json之后存储
			if (is_array($value))
			{
				$addArray[$key] = json_encode($value);
			}elseif ($key !== 'submit')
			{
				$addArray[$key] = $value;
			}
		}
		return $this->dbClass->commonAdd($addArray);
	}
	
	
	/**
	 * 判断这个需求是不是该用户发布的（防止有人修改地址栏来更改别人的需求）
	 * 
	 * 同时也把这个需求的详细信息取出来
	 * @return array 需求的详细信息
	 */
	public function judgeUser ()
	{
		//获取get传值，这是打开之后看到的信息
		$getArray = $this->CI->input->get();
		
		//如果id没有获取到，直接返回
		if (!(isset($getArray[RequestTable::REQUEST_ID]) && $getArray[RequestTable::REQUEST_ID] > 0))
		{
			Tool::alertBack(ERRORREQUESTID);
		}
		
		//获取该需求的所有信息
		$detail = $this->requestDetail($getArray[RequestTable::REQUEST_ID]);
		
		//如果用户直接修改地址栏的id值，判断得到的需求id是不是当前用户发布的，不是的话，直接返回
		if ($detail[RequestTable::REQUEST_USER] !== $this->CI->session->userdata('user_'.UserTable::USER_ID))
		{
			Tool::alertBack('对不起，您不是该需求的发布人，不能修改该需求！');
		}
		
		return $detail;
	}
	
	/**
	 * 获取浏览人数最多的4条需求，首页上使用的
	 * @return array 结果集
	 */
	public function hotRequestList ()
	{
		return $this->dbClass->hotRequestList();
	}
	
	/**
	 * 设置筛选
	 *
	 */
	public function setChoose ()
	{
		//载入分页config
		$config = $this->CI->config->item('front_pagefen');
	
		//获取到get的传值
		$getData = $this->CI->input->get();
	
		//使用了参数传递的方式分页，用p表示当前是第几页,默认是1
		$limitStart = isset($getData['p'])&& !empty($getData['p']) ? $getData['p'] : 1;
	
		/*
		 * 把get获取到的参数，再重新按照get的方式格式化一下，
		* 放到base_url里，为了在分页之后还得保留查询条件
		*/
		$extraData = is_array($getData) && count($getData)>0 ? http_build_query($getData) : '';
	
		//把p置空，目的是不传到base_url里
		$extraData = preg_replace('/&*p=\d*/', '', $extraData);
	
		//设置where，首先必须是审核通过的
		$where = array(RequestTable::REQUEST_STATUS=>1);
	
		/*
		 * 开始根据获取到的参数设置where
		*/
		//所属类别
		$nav      = isset($getData['nav']) ? $getData['nav'] : 0;
		//新旧程度
		$oldLevel = isset($getData['old_level']) ? $getData['old_level'] : 0;
		//品牌
		$brand    = isset($getData['brand']) ? $getData['brand'] : 0;
		//价格
		$price    = isset($getData['price']) ? $getData['price'] : 0;
	
		//如果有导航限制，就增加where
		if ($nav)
		{
			$where[RequestTable::REQUEST_NAV]=$nav;
			//把当前的nav注入到页面中
			$this->CI->smarty->assign('cur_nav',$nav);
		}
	
		//如果有新旧程度，就增加where
		if ($oldLevel)
		{
			$where[RequestTable::REQUEST_OLD_LEVEL]=$oldLevel;
			//把当前的nav注入到页面中
			$this->CI->smarty->assign('cur_oldLevel',$oldLevel);
		}
	
		//如果有品牌限制，就增加where
		if ($brand)
		{
			$where[RequestTable::REQUEST_BRAND_MAIN]=$brand;
			//把当前的brand注入到页面中
			$this->CI->smarty->assign('cur_brand',$brand);
		}
	
		//如果有价格限制，就增加where
		if ($price)
		{
			//按照下划线把价格分隔出来，得到起始价格和结束价格
			$priceArray = @explode('_', $price);
			//价格开始
			$priceStart = isset($priceArray[0]) ? $priceArray[0] : 0;
			//价格结束
			$priceEnd = isset($priceArray[1]) ? $priceArray[1] : 0;
	
			$where[RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_PRICE.' >= ']=$priceStart;
				
			//当$priceEnd》0时才设置，因为有一个封顶
			if ($priceEnd > 0)
			{
				$where[RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_PRICE.' <= ']=$priceEnd;
			}
				
			//把当前的nav注入到页面中
			$this->CI->smarty->assign('cur_price',$price);
		}
	
		//取当前学校下的所有需求
		$where[RequestTable::REQUEST_REGION] = $this->CI->session->userdata(RequestTable::REQUEST_REGION);
	
		//设置base_url
		$config['base_url'] = FRONT_URL.'request/index?'.$extraData;
		//总记录数
		$config['total_rows'] = $this->getCount($where);
	
		$this->dbClass->limit = array(PER_PAGE,($limitStart-1)*PER_PAGE);
	
		//所有的需求
		$this->CI->smarty->assign('requestList',$this->getRequestList($where));
	
		//初始化分页配置
		$this->CI->pagination->initialize($config);
	
		//注册分页变量
		$this->CI->smarty->assign('pageFen',$this->CI->pagination->create_links());
	
		//把所有的参数集合起来，作为缓存的id
		$this->CI->session->set_userdata('smartyPageCacheId',$this->CI->session->userdata(RequestTable::REQUEST_REGION).@implode('', $getData));
	}
	
}


/** End of class RequestModel **/
/** End of file requestModel.php **/