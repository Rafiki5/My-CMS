<?php /* Smarty version Smarty-3.1.16, created on 2014-05-15 16:09:56
         compiled from "ri.plugins\CommentPlugin\commentlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1159853749f163d2b84-02751191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fac1e6475160bb70e7ba0480d4b8ebf0828103e1' => 
    array (
      0 => 'ri.plugins\\CommentPlugin\\commentlist.tpl',
      1 => 1400162994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1159853749f163d2b84-02751191',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53749f16453a20_08455039',
  'variables' => 
  array (
    'commentactive' => 0,
    'comments' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53749f16453a20_08455039')) {function content_53749f16453a20_08455039($_smarty_tpl) {?>        <table id="tabs-2">
            <tbody>
                <tr>
                    <td colspan="2">
                        <input <?php if ($_smarty_tpl->tpl_vars['commentactive']->value) {?>checked=""<?php }?> type="checkbox" name="commentactive"/>Zastosuj komentarze do tej strony
                    </td>
                    <td>
                        <input formaction="/ri.plugins/CommentPlugin/PluginFunction.php" type="submit" name="edit" value="Zapisz"/>
                    </td>
                </tr>
                <?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['comment']->value['author'];?>
</td>
                        <td class="commenttext"><p><?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>
</p></td>
                        <td><a onclick="return confirm('Czy napewno chcesz usunąć ten komentarz?');" href="/ri.plugins/CommentPlugin/PluginFunction.php?id=<?php echo $_smarty_tpl->tpl_vars['comment']->value['id'];?>
&action=delete">Usuń</a></td>
                    </tr>
                <?php } ?>
                <?php }?>
            </tbody>
        </table><?php }} ?>
