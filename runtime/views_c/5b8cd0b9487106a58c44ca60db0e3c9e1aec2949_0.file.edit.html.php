<?php /* Smarty version 3.1.27, created on 2016-07-13 11:12:00
         compiled from "D:\wamp\www\MVC\views\User\edit.html" */ ?>
<?php
/*%%SmartyHeaderCode:642657862200bb5784_63442192%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b8cd0b9487106a58c44ca60db0e3c9e1aec2949' => 
    array (
      0 => 'D:\\wamp\\www\\MVC\\views\\User\\edit.html',
      1 => 1468408315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '642657862200bb5784_63442192',
  'variables' => 
  array (
    'title' => 0,
    'id' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57862200c17215_32990223',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57862200c17215_32990223')) {
function content_57862200c17215_32990223 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '642657862200bb5784_63442192';
?>
<!DOCTYPE html>
<html lang="cn"> 
<head>
	<meta charset="utf-8">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
	<h1>編輯用戶</h1>
	<form action="./index.php?m=User&a=update" method="post">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
		用戶名:<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
"><br> 
		年齡:<input type="text" name="age" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['age'];?>
"><br> 
		性別:<input type="radio" name="sex" value="0" <?php if ($_smarty_tpl->tpl_vars['list']->value['sex'] == 0) {?>checked<?php } else {
}?>>
		<input type="radio" name="sex" value="1" <?php if ($_smarty_tpl->tpl_vars['list']->value['sex'] == 1) {?>checked<?php } else {
}?>>男<br> 
		<button>提交</button>
	</form>
</body>
</html><?php }
}
?>