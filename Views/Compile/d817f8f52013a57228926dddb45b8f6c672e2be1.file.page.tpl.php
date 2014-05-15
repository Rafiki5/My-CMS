<?php /* Smarty version Smarty-3.1.16, created on 2014-05-15 20:47:42
         compiled from ".\Views\Pages\page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3142853245a4b320883-83530373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd817f8f52013a57228926dddb45b8f6c672e2be1' => 
    array (
      0 => '.\\Views\\Pages\\page.tpl',
      1 => 1400179658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3142853245a4b320883-83530373',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53245a4b322443_04001264',
  'variables' => 
  array (
    'menu' => 0,
    'item' => 0,
    'page' => 0,
    'path' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53245a4b322443_04001264')) {function content_53245a4b322443_04001264($_smarty_tpl) {?><aside id="mine-menu">
    <?php if ($_smarty_tpl->tpl_vars['menu']->value) {?>
        <ul>Menu
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['pactive']&&$_smarty_tpl->tpl_vars['item']->value['mactive']) {?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
            <?php }?>
            <?php } ?>
        </ul>
        
    <?php }?>
</aside>
<section id="content">
    <?php echo $_smarty_tpl->tpl_vars['page']->value['body'];?>
   
    <?php if (isset($_smarty_tpl->tpl_vars['path']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
</section><?php }} ?>
