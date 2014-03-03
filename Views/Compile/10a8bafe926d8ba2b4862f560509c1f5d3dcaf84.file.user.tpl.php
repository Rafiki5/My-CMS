<?php /* Smarty version Smarty-3.1.16, created on 2014-03-01 13:53:04
         compiled from ".\Views\Admin\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103925311c1615a13b0-98803062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10a8bafe926d8ba2b4862f560509c1f5d3dcaf84' => 
    array (
      0 => '.\\Views\\Admin\\user.tpl',
      1 => 1393678364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103925311c1615a13b0-98803062',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5311c161653c36_09528640',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5311c161653c36_09528640')) {function content_5311c161653c36_09528640($_smarty_tpl) {?><form id="login" action="/My-CMS/ri.class/EditUser.php" method="POST">
    <fieldset>
        <legend>Edytuj Urzytkownika</legend>
        <label>Nazwa urzytkownika <br>
            <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
"/><br>
        </label>
        <label>E-mail <br>
            <input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"/><br>
        </label>
        <label>Role <br>
            <input type="text" name="role" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['role'];?>
"/><br>
        </label>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"/>
        <input type="submit" name="edit" value="Edytuj"/>
        <input type="submit" name="delete" value="Usuń urzytkownika"
               onclick="return confirm('Czy na pewno chcesz usunąć tego urzytkownika?')"/>
        <input formaction="/My-CMS/admin/changepass" type="submit" name="editpassword" value="Zmień hasło"/>
    </fieldset>
</form><?php }} ?>
