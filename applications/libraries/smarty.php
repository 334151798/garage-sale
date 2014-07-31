<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(ROOT_PATH.'third_party/smarty/Smarty.class.php');
/**
 * 引入smarty，对CI进行扩展，把smarty扩展成CI的类库,smarty版本是2.6.26
 * 
 * @package Smarty
 * @author coly
 * @version $ID 2012-08-06 $
 *
 */
class CI_Smarty extends Smarty{
	/**
	 * 初始化smarty基本的配置
	 */
	
  public function __construct()
	{
	  $this->template_dir=SMARTY_TEMPLATE_DIR;//模板目录
		$this->compile_dir=SMARTY_COMPILE_DIR;//编译目录
		$this->config_dir=SMARTY_CONFIG_DIR;//config目录
		$this->cache_dir=SMARTY_CACHE_DIR;//缓存目录
		$this->caching=SMARTY_CACHING;//是否缓存
		$this->cache_lifetime=SMARTY_CACHE_LIFETIME;//缓存维持时间
		$this->left_delimiter=SMARTY_LEFT_DELIMITER;//左定界符
		$this->right_delimiter=SMARTY_RIGHT_DELIMITER;//右定界符
	}
}

/* End of file smarty.php */
/* Location: ./application/third_party/smarty/smarty.php */