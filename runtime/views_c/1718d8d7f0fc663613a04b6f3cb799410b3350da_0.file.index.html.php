<?php /* Smarty version 3.1.27, created on 2016-07-13 10:50:26
         compiled from "D:\wamp\www\MVC\views\User\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:948857861cf2921397_34700919%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1718d8d7f0fc663613a04b6f3cb799410b3350da' => 
    array (
      0 => 'D:\\wamp\\www\\MVC\\views\\User\\index.html',
      1 => 1468407024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '948857861cf2921397_34700919',
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57861cf2986cb2_73401879',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57861cf2986cb2_73401879')) {
function content_57861cf2986cb2_73401879 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '948857861cf2921397_34700919';
?>
<!DOCTYPE html>
<html lang="cn">
<head>
	<meta charset="utf-8">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
	<h1>用户列表</h1>
	<table border="1" width="800" cellspacing="0">
		<tr>
			<td>Id</td>
			<td>姓名</td>
			<td>性別</td>
			<td>年齡</td>
			<td>操作</td>
		</tr>
			<?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['v']->value['sex'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['v']->value['age'];?>
</td>
					<td>
						<a href="./index.php?m=User&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">刪除</a>
						<a href="./index.php?m=User&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">編輯</a>
					</td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
	</table>
	<a href="./index.php?m=User&a=add">添加用户</a>
</body>
</html><?php }
}
?>