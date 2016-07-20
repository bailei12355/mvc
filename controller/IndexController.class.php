<?php
	class IndexController extends Controller
	{
		public function index()
		{
			global $smarty;
			echo "我是首页";
			$smarty->display('Index/index.html');
			
		}

	}