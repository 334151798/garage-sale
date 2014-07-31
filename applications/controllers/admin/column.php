<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 栏目控制器类
 * 
 * 用来对栏目进行增删改查
 * @package CI_Controller
 * @author Coly
 * @version $ID 2012-08-10 $
 */
require_once 'applications/controllers/basecontroller.php';
class Column extends BaseController
{
	/**
	 * 初始化控制器
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('columnModel','brandModel','priceModel'));
	}
	
	/**
	 * 显示所有栏目
	 * 
	 * @access publi
	 * @return NULL
	 */
	public function show()
	{
		$this->smarty->assign('allNavList',$this->columnModel->showAllColumn());
		$this->smarty->display('admin/right/column/list.html');
	}
	
	/**
	 * 新增栏目
	 * 
	 * @access publi
	 * @return NULL
	 */
	public function add()
	{
		$this->smarty->assign('allBrand',$this->brandModel->returnAllInfo());
		$this->smarty->assign('allPrice',$this->priceModel->returnAllInfo());
		$this->smarty->assign('allColumn',$this->columnModel->returnAllInfo());
		
		//通过是否获取到按钮的值来判断这是提交之后的还是第一次打开
		if ($this->input->post('submit'))
		{
			//把验证类传回控制器，在控制器中执行验证操作，进而进行判断
			$this->_packClass=new ColumnPacket();
			if ($this->_packClass->run())
			{
				 //执行对应model的add方法，把pack类中的字段数组传过去，以过滤字段值
				 if ($this->columnModel->commonAdd($this->_packClass->returnField()))
				 {
				   Tool::alertLocation(ADMIN_URL.'column/show/', ADD_SUC_INFO);
				 }else 
				 {
				   Tool::alertBack(ADD_FAILED_INFO);
				 }
			}else
			{
				//注入错误信息和默认值
				$this->setErrorAndDefault($this->_packClass->returnField());
			}
		}
		$this->smarty->display('admin/right/column/add.html');
	}
	
	/**
	 * 修改
	 */
	public function update ()
	{
		//通过是否获取到按钮的值来判断这是提交之后的还是第一次打开
		if ($this->input->post('submit'))
		{
			//把验证类传回控制器，在控制器中执行验证操作，进而进行判断
			$this->_packClass=new ColumnPacket();
			if ($this->_packClass->run())
			{
				//执行对应model的add方法，把pack类中的字段数组传过去，以过滤字段值
				if ($this->columnModel->commonUpdate($this->_packClass->returnField()))
				{
					Tool::alertLocation(ADMIN_URL.'column/show/', UPDATE_SUC_INFO);
				}else
				{
					Tool::alertBack(UPDATE_FAILED_INFO);
				}
			}else
			{
				//注入错误信息和默认值
				$this->setErrorAndDefault($this->_packClass->returnField());
			}
		}
		$result = $this->columnModel->returnAllInfo($this->input->get());
		$this->smarty->assign('curColumnInfo',$result[0]);
		$this->smarty->assign('allBrand',$this->brandModel->returnAllInfo());
		$this->smarty->assign('allPrice',$this->priceModel->returnAllInfo());
		$this->smarty->assign('allColumn',$this->columnModel->returnAllInfo());
		$this->smarty->display('admin/right/column/update.html');
	}
	
	/**
	 * 删除
	 */
	public function delete ()
	{
		if ($this->columnModel->commonDelete($this->input->get()))
		{
			Tool::alertLocation(ADMIN_URL.'column/show/', DEL_SUC_INFO);
		}else
		{
			Tool::alertBack(DEL_FAILED_INFO);
		}
	}
	
	/**
	 * ajax根据获得的值返回全部的字段值
	 */
	public function AjaxReturn ()
	{
	
		echo  json_encode($this->columnModel->returnAllInfo($this->input->get()));
	}
}


/* End of file Column Class */
/* Location: ./application/controller/Column.php */