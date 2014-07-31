<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 用户model类
 * 
 * @package BaseModel
 * @subpackage CI_Model
 * @author Coly
 * @version $ID 2012-8-20 $
 */

class UserModel extends BaseModel
{
	public function __construct()
	{
	  parent::__construct();
	  
	  //设置当前的db类
	  $this->dbClass = new UserDb(UserTable::TABLE_NAME);
	}
	
	/**
	 * 注册的方法
	 * 
	 * @return boolean
	 */
	public function regist ()
	{
		$addArray = array();
		//过滤post数组，提取出除了密码重复和提交框意外的值
		foreach ($this->CI->input->post() as $key => $value)
		{
			if ($key != 're_password' && $key != 'submit')
			{
				$addArray[$key] = $value;
			}
		}
		$addArray[UserTable::USER_ACTIVE]          = sha1($addArray[UserTable::USER_NAME]);//用户的激活字段
		$addArray[UserTable::USER_REG_TIME]        = date('Y-m-d H:i:s');//注册时间
		$addArray[UserTable::USER_REG_IP]          = $_SERVER ['REMOTE_ADDR'];//注册ip
		$addArray[UserTable::USER_LAST_LOGIN_TIME] = date('Y-m-d H:i:s');//上一次登录的时间
		$addArray[UserTable::USER_LAST_IP]         =  $_SERVER ['REMOTE_ADDR'];//上一次登录的时间
		
		if ($this->dbClass->commonAdd($addArray))
		{
      $this->userLogin();//直接登录
			return true;
		}else {
			return false;
		}
	}
	
	/**
	 * 前端用户登录
	 * 
	 * @param Array $postArray  可以直接去post里面的数据，也可是手动传参
	 * @return boolean 返回登陆结果
	 */
	public function userLogin ($postArray  = Array())
	{
		//如果有传值，就使用传过来的参数
		$loginArray = count($postArray) > 0 ? $postArray : $this->CI->input->post();
		
		//根据用户名或者邮箱登陆
		$result = $this->dbClass->userLogin($loginArray);
		
		//如果有数据且密码正确，说明登录成功
		if (count($result) > 0 && $result[0][UserTable::USER_PASSWORD]==$loginArray[UserTable::USER_PASSWORD])
		{
			//把信息写进session
			$this->setUserInfoToSession($result);
			
			//更新一下登陆时间等
			return $this->updateLogin();
			
		}else 
		{
			return false;
		}
		
	}
	
	/**
	 * 返回用户发布的所有需求
	 * 
	 * @return array 返回结果集
	 */
	public function userRequest ()
	{
		//直接获取出所有的需求，再进行分拣
		$allRequest = $this->CI->requestModel->getRequestList(array(RequestTable::REQUEST_USER => $this->CI->session->userdata( 'user_'.UserTable::USER_ID)));
		
		//初始化显示中的需求，未通过审核的需求，已删除的需求
		$returnArray = array('auditedRequest'=>array(),'unAuditedRequest'=>array(),'deletedRequest'=>array());
		
		foreach ($allRequest as $key => $value)
		{
			if($value[RequestTable::REQUEST_STATUS] ==1)
			{
				//已经通过显示，在显示的需求
				$returnArray['auditedRequest'][]   = $value;
			}elseif ($value[RequestTable::REQUEST_STATUS] ==0 && $value[RequestTable::REQUEST_USER_DEL_STATUS] !==1)
			{
				//未被审核的需求，且未被用户删除的需求
				$returnArray['unAuditedRequest'][] = $value;
			}elseif ($value[RequestTable::REQUEST_STATUS]  ==0 && $value[RequestTable::REQUEST_USER_DEL_STATUS] ==1)
			{
				//已被用户删除的需求
				$returnArray['deletedRequest'][]   = $value;
			}
		}
		return $returnArray;
	}
	
	/**
	 * 返回用户收藏的需求
	 * 
	 * @return mixed 如果有收藏就返回数组，没有就返回null
	 */
	public function userCollect ()
	{
		//收藏的需求
		$collect = $this->CI->collectModel->requestCollectList();
		
		//如果有收藏
		if (count($collect) > 0)
		{
			foreach ($collect as $key => $value)
			{
				//根据id获取收藏的需求的详细信息，注入到页面中
				$requestInfo = $this->CI->requestModel->getRequestList(array(RequestTable::TABLE_NAME.'.'.RequestTable::REQUEST_ID => $value[RequestCollectTable::REQUEST_ID]));
				$collect[$key] =$requestInfo[0];
				$requestInfo = null;
			}
		}else {//没有收藏就设置默认null
			$collect = null;
		}
		
		return $collect;
	}
	
	
	/**
	 * 把获取到的用户信息写入session
	 * 
	 * @param  array $result 用户信息数组
	 * @return null
	 */
	public function setUserInfoToSession ($result)
	{
		//把这些信息放到session里，方便取
		$userInfo = array(
				'user_'.UserTable::USER_ID      =>$result[0][UserTable::USER_ID],//id
				UserTable::USER_NAME            =>$result[0][UserTable::USER_NAME],//用户名
				UserTable::USER_EMAIL           =>$result[0][UserTable::USER_EMAIL],//用户邮箱
				UserTable::USER_REG_TIME        =>$result[0][UserTable::USER_REG_TIME],//注册时间
				UserTable::USER_LAST_LOGIN_TIME =>$result[0][UserTable::USER_LAST_LOGIN_TIME],//上次登录时间
				UserTable::USER_LAST_IP         =>$result[0][UserTable::USER_LAST_IP],//上次登录ip
				UserTable::USER_LOGIN_COUNT     =>$result[0][UserTable::USER_LOGIN_COUNT]//登录次数
		);
			
		$this->CI->session->set_userdata($userInfo);
	}
	
	/**
	 * 登陆之后要更新一下最后登陆日期和登陆ip
	 * 
	 * @return boolean 返回更新结果，成功为true，失败为false
	 */
	public function updateLogin ()
	{
		//登录之后，要更新一下数据，登录次数，登录时间，登录ip
		$updateArray = array(
				UserTable::USER_LAST_LOGIN_TIME => date('Y-m-d H:i:s'),//最后登录日期
				UserTable::USER_LAST_IP         => $_SERVER ['REMOTE_ADDR']//上一次登录ip
		);
			
		//登录次数加1，因为CI数据库类不能用，所以另外写
		$this->dbClass->countPlus(UserTable::USER_LOGIN_COUNT,$this->CI->session->userdata('user_'.UserTable::USER_ID ));
			
		//更新数据
		return $this->dbClass->commonUpdate($updateArray, array(UserTable::USER_ID=>$this->CI->session->userdata('user_'.UserTable::USER_ID )));
	}
	
	
	/**
	 * 判断是否已经登录
	 * 
	 * @return boolean
	 */
	public function haveLogin ()
	{
		if (count($this->CI->session->all_userdata()) > 0 && $this->CI->session->userdata('user_'.UserTable::USER_ID))
		{
			return true;
		}else 
		{
			return false;
		}
	}
	
	
	/**
	 * 退出登录
	 * 
	 * @return null
	 */
	public function logout ()
	{
		$userInfo = array(
				'user_'.UserTable::USER_ID      =>'',
				UserTable::USER_NAME            =>'',
				UserTable::USER_EMAIL           =>'',
				UserTable::USER_REG_TIME        =>'',
				UserTable::USER_LAST_LOGIN_TIME =>'',
				UserTable::USER_LAST_IP         =>'',
				UserTable::USER_LOGIN_COUNT     =>''
		);
		$this->CI->session->unset_userdata($userInfo);
	}
	
	
}


/** End of class UserModel **/
/** End of file userModel.php **/