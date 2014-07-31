<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 供需管理控制器类（后台管理使用）
 * 
 * @package BaseController
 * @subpackage CI_Controller
 * @author Coly
 * @version $ID 2012-08-10 $
 */
require_once 'applications/controllers/basecontroller.php';

class RequestAdmin extends BaseController
{
	/**
	 * 初始化控制器
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('requestModel','columnModel','brandModel','priceModel','regionModel'));
		$this->load->library('pagination');
	}
	
	/**
	 * 列出待审核的供求信息
	 * 
	 * @access public 
	 * @return null
	 */
	public function showUnAuditRequest($limitStart = 1)
	{
		//载入分页config
		$config = $this->config->item('admin_pagefen');
		//设置base_url
    $config['base_url'] = ADMIN_URL.'requestAdmin/showUnAuditRequest/';
    //总记录数
		$config['total_rows'] = $this->requestModel->getCount();
		$this->requestModel->limit = array(PER_PAGE,($limitStart-1)*PER_PAGE);
		//所有未审核的需求。RequestTable::REQUEST_STATUS=>0表示未审核
		$this->smarty->assign('unAuditRequestList',$this->requestModel->getRequestListAdmin(array(RequestTable::REQUEST_STATUS=>0)));
		//初始化分页配置
		$this->pagination->initialize($config);
		//注册分页变量
		$this->smarty->assign('pageFen',$this->pagination->create_links());
		$this->smarty->display('admin/right/request/list_un.html');
	}
	
	/**
	 * 列出所有的供求信息
	 *
	 * @access public
	 * @return null
	 */
	public function showAllRequest($limitStart = 1)
	{
		//载入分页config
		$config = $this->config->item('admin_pagefen');
		//设置base_url
		$config['base_url'] = ADMIN_URL.'requestAdmin/showAllRequest/';
		//总记录数
		$config['total_rows'] = $this->requestModel->getCount();
		$this->requestModel->limit = array(PER_PAGE,($limitStart-1)*PER_PAGE);
		//所有的需求
		$this->smarty->assign('requestList',$this->requestModel->getRequestInfo(array(RequestTable::REQUEST_STATUS=>1)));
		//初始化分页配置
		$this->pagination->initialize($config);
		//注册分页变量
		$this->smarty->assign('pageFen',$this->pagination->create_links());
		$this->smarty->display('admin/right/request/list_un.html');
	}
	
	/**
	 * 审核
	 *
	 * @access public
	 * @return null
	 */
	public function audit()
	{
		$update = array(RequestTable::REQUEST_STATUS =>1);
		//把状态设为1，即通过审核
		if ($this->requestModel->updateByOneField($update,$this->input->get()))
		{
			Tool::alertLocation(ADMIN_URL.'requestAdmin/showUnAuditRequest/', '审核成功！');
		}else 
		{
			Tool::alertBack('审核失败！');
		}
		
	}
	
	
	/**
	 * 新增供求信息
	 * 
	 * @access public 
	 * @return null
	 */
	public function add()
	{
		if ($this->input->post('submit'))
		{
			$this->_packClass = new RequestPacket();
			if ($this->_packClass->run())
			{
				if ($this->requestModel->requestAdd())
				{
					Tool::alertLocation('', ADD_SUC_INFO);
				}else 
				{
					Tool::alertBack(ADD_FAILED_INFO);
				}
				
			}else 
			{
				$this->setErrorAndDefault($this->_packClass->returnField());
			}
		}
		//主分类
		$this->smarty->assign('allMainColumn',$this->columnModel->returnAllInfo(array('pid'=>0)));
		//主品牌
		$this->smarty->assign('allMainBrand',$this->brandModel->returnAllInfo(array('pid'=>0)));
		$this->smarty->display('front/addRequest.html');
		
		
	}
	
	/**
	 * 修改需求
	 */
	public function update ()
	{
		if ($this->input->post('submit'))
		{
			//引入packet验证类
			$this->_packClass = new RequestPacket();
			if ($this->_packClass->run())
			{
				if ($this->requestModel->commonUpdate($this->_packClass->returnField()))
				{
					Tool::alertLocation(ADMIN_URL.'requestAdmin/showUnAuditRequest/', UPDATE_SUC_INFO);
				}else
				{
					Tool::alertBack(UPDATE_FAILED_INFO);
				}
		
			}else
			{
				$this->setErrorAndDefault($this->_packClass->returnField());
			}
		}
		//根据传过来的id，获取改需求的所有信息
		$result = $this->requestModel->returnAllInfo($this->input->get());
		$where = array('pid'=>0);
		$this->smarty->assign('allMainColumn',$this->columnModel->returnAllInfo($where));
		$this->smarty->assign('allMainBrand',$this->brandModel->returnAllInfo($where));
		//把所有信息载入页面
		$this->smarty->assign('curRequestInfo',$result[0]);
		$this->smarty->display('admin/right/request/updateRequest.html');
	}
	
	/**
	 * 删除
	 */
	public function delete ()
	{
		if ($this->requestModel->commonDelete($this->input->get()))
		{
			Tool::alertLocation(ADMIN_URL.'requestAdmin/showUnAuditRequest/', DEL_SUC_INFO);
		}else
		{
			Tool::alertBack(DEL_FAILED_INFO);
		}
	}
	
}

/* End of file Request Class */
/* Location: ./application/controller/request.php */