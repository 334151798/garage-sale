<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 搜索model类
 * 
 * @package BaseModel
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-10-9 $
 */

class SearchModel extends BaseModel
{
	/**
	 * 初始化构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		
		//设置当前的db类
		$this->dbClass = new RequestDb(RequestTable::TABLE_NAME);
	}
	

	/**
	 * 搜索（获取需求&分页）
	 * 
	 * @param  array $where 搜索条件
	 * @param  array $likeArray like条件
	 * @return array 返回搜索到的结果集
	 */
	public function searchList ($where = array(),$likeArray = array())
	{
		//获取数据
		$result = $this->dbClass->searchList($where,$likeArray);
		
		//处理一下数据
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
	 * 设置筛选
	 *
	 */
	public function setChoose ()
	{
		//获取到搜索的数据
		$searchData = $this->CI->input->post();
		
		//关键字
		$keyWords = $searchData['keywords'];
		
		//如果搜索词没有搜索到或者搜索词和session中的一样，就使用session中的
		if (empty($keyWords) || $keyWords==$this->CI->session->userdata('searchKeyWords'))
		{
			$keyWords = $this->CI->session->userdata('searchKeyWords');
		}else //否则把搜索词写入session
		{
			$this->CI->session->set_userdata('searchKeyWords',$keyWords);
		}
		
		//要搜索like的数组
		$likeArray = array(RequestTable::REQUEST_TITLE => $keyWords);
		
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
		$where = array(RequestTable::REQUEST_STATUS =>1);
	
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
	
			$where[RequestTable::REQUEST_PRICE.' >= ']=$priceStart;
			
			//当$priceEnd》0时才设置，因为有一个封顶
			if ($priceEnd > 0)
			{
				$where[RequestTable::REQUEST_PRICE.' <= ']=$priceEnd;
			}
			
			//把当前的nav注入到页面中
			$this->CI->smarty->assign('cur_price',$price);
		}
	
		//设置base_url
		$config['base_url'] = FRONT_URL.'search/index?'.$extraData;
		
		
		//总记录数
		$config['total_rows'] = $this->dbClass->getCount($where,$likeArray);
	
		$this->dbClass->limit = array(PER_PAGE,($limitStart-1)*PER_PAGE);
	
		//所有的需求
		$this->CI->smarty->assign('requestList',$this->searchList($where,$likeArray));

		//初始化分页配置
		$this->CI->pagination->initialize($config);
		//注册分页变量
		$this->CI->smarty->assign('pageFen',$this->CI->pagination->create_links());
		
		//把所有的参数集合起来，作为缓存的id
		$this->CI->session->set_userdata('smartyPageCacheIdSearch',@implode('', $getData).$keyWords);
	}
	
}

/* End of file SearchModel Class */
/* Location: ./application/models/searchmodel.php */