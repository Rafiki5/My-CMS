<?php /* Smarty version Smarty-3.1.16, created on 2014-03-01 14:06:36
         compiled from ".\Views\Admin\changepass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:285965311db5c225de3-18955665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42b430d128deae0eaa0cad4b7b6ced249e6a31d2' => 
    array (
      0 => '.\\Views\\Admin\\changepass.tpl',
      1 => 1393679154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285965311db5c225de3-18955665',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5311db5c293d21_14820463',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5311db5c293d21_14820463')) {function content_5311db5c293d21_14820463($_smarty_tpl) {?><form id="login" method="POST" action="/My-CMS/ri.class/EditUser.php">
    <fieldset>
        <legend>Zmiana hasła</legend>
        <label>Stare hasło   <br>
            <input type="password" name="oldpassword"/><br>
        </label>
        <label>Nowe hasło   <br>
            <input type="password" name="newpassword"/><br>
        </label>
        <label>Powtórz hasło   <br>
            <input type="password" name="repeatpassword"/><br>
        </label>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
        <input type="submit" name="changepass" value="Zmień hasło"/>
    </fieldset>
</form><?php }} ?>
