<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 文件上传类，引入了自定义的图像上传类
 * 
 * @author Coly
 * @version $ID 2012-8-20 $
 */
require_once 'applications/controllers/basecontroller.php';
require_once 'applications/libraries/fileupload.php';
Class Upload extends basecontroller
{
	public $uploadConfig = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('image_lib');
	}
	
	public function load ()
	{
	  $upload = new FileUpload('Filedata');
	  $path = $upload->getPath();
	  
	  /*生成小的缩略图*/
	  $this->uploadConfig['source_image'] = ROOT_PATH.$path;
	  $this->uploadConfig['create_thumb'] = TRUE;
	  $this->uploadConfig['maintain_ratio'] = TRUE;
	  $this->uploadConfig['width'] = 240;
	  $this->uploadConfig['height'] = 160;
	  
	  
	  $this->image_lib->initialize($this->uploadConfig);
	  $this->image_lib->resize();
	  /*把图片压缩一下，生成640*480的，控制一下尺寸*/
	  $this->image_lib->clear();
	  $this->uploadConfig['new_image'] = ROOT_PATH.$path;
	  $this->uploadConfig['create_thumb'] = TRUE;
	  $this->uploadConfig['thumb_marker'] = '';
	  $this->uploadConfig['width'] = 640;
	  $this->uploadConfig['height'] = 480;
	  $this->image_lib->initialize($this->uploadConfig);
	  $this->image_lib->resize();
	  
	  
		echo '../../'.$path;
		
	}
	
}

/* End of file upload Class */
/* Location: ./application/controller/upload.php */