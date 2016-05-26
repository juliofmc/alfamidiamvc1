<?
	function __autoload($className) { // A partir do php 5.3
	
		  if (file_exists('classes/'.$className.'.class.php')) {
			  require_once 'classes/'.$className.'.class.php';
		  }
	} 
?>