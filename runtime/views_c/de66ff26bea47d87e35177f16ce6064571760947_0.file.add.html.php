<?php /* Smarty version 3.1.27, created on 2016-07-13 10:34:49
         compiled from "D:\wamp\www\MVC\views\User\add.html" */ ?>
<?php
/*%%SmartyHeaderCode:2144257861949206653_81172723%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de66ff26bea47d87e35177f16ce6064571760947' => 
    array (
      0 => 'D:\\wamp\\www\\MVC\\views\\User\\add.html',
      1 => 1468405977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2144257861949206653_81172723',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_578619492509f2_52156694',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_578619492509f2_52156694')) {
function content_578619492509f2_52156694 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2144257861949206653_81172723';
?>
<!DOCTYPE html>
<html lang="cn"> 
<head>
	<meta charset="utf-8">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
	<form action="./index.php?m=User&a=insert" method="post">
		用戶名:<input type="text" name="name"><br> 
		年齡:<input type="text" name="age"><br> 
		性別:<input type="radio" name="sex" value="0">女 
		<input type="radio" name="sex" value="1">男<br> 
		<button>提交</button>
	</form>
</body>
</html><?php }
}
?>