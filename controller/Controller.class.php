<?php


	/**
	* 
	*/
	class Controller extends Smarty
	{
		
		function __construct()
		{
		$this->setTemplateDir('./views')
		->setCompileDir('./runtime/views_c')
		->setConfigDir('./configs')
		->setCacheDir('./runtime/cache');

		// 配置 模板变量的定界符<{}>
		$this->left_delimiter = "<{";
		$this->right_delimiter = "}>";
		$this->caching = false;//配置缓存
		$this->cache_lifetime = 30;//缓存时间
		}
		function __call($fun, $params)
		{
			header('HTTP/1.0 404 not found');
			header('Status:404 not found');
			echo "<h1>404 not found</h1>";
			exit;
		}
	}