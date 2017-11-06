<?php
//	License for all code of this FreePBX module can be found in the license file inside the module directory
//	Copyright 2013 Schmooze Com Inc.
//
//SSL Redirect
if(isset($_SERVER['HTTP_X_FREEPBXSSL']) && !isset($_SERVER['HTTPS'])){
	$redirect = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	header("HTTP/1.1 301 Moved Permanently");
	header('Location: ' . $redirect);
	exit;
}

if (file_exists(dirname(__FILE__) . '/index_custom.php')) {
	include_once(dirname(__FILE__) . '/index_custom.php');
} else {
	$basename = pathinfo($_SERVER['PHP_SELF'],PATHINFO_DIRNAME);
	$uri = (!empty($basename) && $basename != '/') ? $basename . '/admin' : '/admin';
	header('Location: '.$uri);
}
