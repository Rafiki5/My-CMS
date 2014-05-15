<?php /* Smarty version Smarty-3.1.16, created on 2014-05-15 16:21:44
         compiled from "ri.plugins\CommentPlugin\comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:242835374a073a5a8a7-08081015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daeee59aaf79e383b5e9833069b88c3ff0d20c1b' => 
    array (
      0 => 'ri.plugins\\CommentPlugin\\comments.tpl',
      1 => 1400163703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '242835374a073a5a8a7-08081015',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5374a073a896b7_22937475',
  'variables' => 
  array (
    'comments' => 0,
    'comment' => 0,
    'username' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5374a073a896b7_22937475')) {function content_5374a073a896b7_22937475($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
        <div class="comment">
            <p class="author"><?php echo $_smarty_tpl->tpl_vars['comment']->value['author'];?>
</p>
            <p><?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>
</p>
        </div>
    <?php } ?>
<?php }?>
<form id="create-comment" method="post" action="/ri.plugins/CommentPlugin/PluginFunction.php">
    <fieldset>
        <legend>Komentuj</legend>
        <p>Nazwa urzytkownika: <br>
            <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"/>
        </p>
        <p>Komentarz: <br>
            <textarea name="comment" cols="50" rows="10"></textarea>
        </p>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
"/>
        <input type="submit" name="savecomment" value="Komentuj"/>
    </fieldset>
    
</form><?php }} ?>
