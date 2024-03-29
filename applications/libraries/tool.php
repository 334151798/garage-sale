<?php
//工具类，封装函数和算法等。
class Tool {
	
	//获取客户端ip
	static public function getIP() {
		return $_SERVER["REMOTE_ADDR"];
	}
	
	//获取目前的时间
	static public function getDate() {
		return date('Y-m-d H:i:s');
	}
	
	
	//弹出窗，跳转
	static public function alertLocation($url,$info){
		if(!Validate::isNullString($info)){
			echo "<script type='text/javascript'>alert('$info');location.href='$url';</script>";
			exit();
		}else{
			echo "<script type='text/javascript'>location.href='$url';</script>";
			exit();
		}
	}
	
	//弹窗返回
	static public function alertBack($_info) {
		echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
		exit();
	}
	
	
	//Tiny.box弹出location
	static public function tinyAlertLocation($url,$info = null) {
		if(!Validate::isNullString($info)){
			echo "<link href='".FRONT_PATH."js/tinybox/tinybox.css' rel='stylesheet' type='text/css'/>";
			echo "<script type='text/javascript' src='".FRONT_PATH."js/tinybox/tinybox.js'></script>";
			echo "<script type='text/javascript'>window.onload=function (){TINY.box.show('$info',0,0,0,0,3,null,'false');setTimeout(function (){location.href='$url';},1000);};</script>";
		}else{
			echo "<script type='text/javascript'>location.href='$url';</script>";
			exit();
		}
	}
	
	
	//关闭
	static public function close($info){
		if(isset($info)){
			echo "<script type='text/javascript'>alert('$info');</script>";
		}
		echo "<script type='text/javascript'>window.close();</script>";
		exit();
	}
	
	//表单提交字符转义
	static public function setFormString($_string) {
		if (!get_magic_quotes_gpc()) {
			if (Validate::isArray($_string)) {
				foreach ($_string as $_key=>$_value) {
					$_string[$_key] = self::setFormString($_value);	//不支持就用代替addslashes();
				}
			} else {
				return addslashes($_string); //mysql_real_escape_string($_string, $_link);
			}
		}
		return $_string;
	}
	
	//html过滤
	static public function setHtmlString($_data) {
		$_string = '';
		if (Validate::isArray($_data)) {
			if (Validate::isNullArray($_data)) return $_data;
			foreach ($_data as $_key=>$_value) {
				$_string[$_key] = self::setHtmlString($_value);  //递归
			}
		} elseif (is_object($_data)) {
			foreach ($_data as $_key=>$_value) {
				$_string->$_key = self::setHtmlString($_value);  //递归
			}
		} else {
			$_string = htmlspecialchars($_data);
		}
		return $_string;
	}
	
	/**
	 * 根据传入的路径获取扩展名
	 * 
	 * @param string $path 传入的路径
	 * @return string      返回扩展名
	 */
	static public function getExtraName($path) {
		
		$largePath = $path;
		//将路径按照点分隔
		$extrArray = @explode('.', $largePath);
		//最后一个元素即为扩展名
		$extrName  = $extrArray[count($extrArray)-1];
		
		return $extrName;
	}
	
	//过滤
	static public function setRequest() {
		if (isset($_GET)) $_GET = Tool::setFormString($_GET);
		if (isset($_POST)) $_POST = Tool::setFormString($_POST);
	}
	
	//得到上一页
	static public function getPrevPage() {
		return empty($_SERVER["HTTP_REFERER"]) ? '###' : $_SERVER["HTTP_REFERER"];
	}
	
	//获取地址
	static function getUrl() {
		$_url = $_SERVER["REQUEST_URI"];
		$_par = parse_url($_url);
		if (isset($_par['query'])) {
			parse_str($_par['query'],$_query);
			$_url = $_par['path'].'?'.http_build_query($_query);
		}
		return $_url;
	}
}
?>