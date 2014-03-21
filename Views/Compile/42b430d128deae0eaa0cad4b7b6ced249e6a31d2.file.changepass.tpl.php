<?php /* Smarty version Smarty-3.1.16, created on 2014-03-10 12:44:26
         compiled from ".\Views\Admin\changepass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111155316405a25e6f8-89902945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42b430d128deae0eaa0cad4b7b6ced249e6a31d2' => 
    array (
      0 => '.\\Views\\Admin\\changepass.tpl',
      1 => 1394450574,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111155316405a25e6f8-89902945',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5316405a2c96a7_17443588',
  'variables' => 
  array (
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5316405a2c96a7_17443588')) {function content_5316405a2c96a7_17443588($_smarty_tpl) {?><form id="login" method="POST" action="/My-CMS/ri.class/Scripts/EditUser.php">
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
