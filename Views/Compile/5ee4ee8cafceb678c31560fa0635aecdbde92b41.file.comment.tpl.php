<?php /* Smarty version Smarty-3.1.16, created on 2014-05-14 22:13:10
         compiled from "ri.plugins\CommentPlugin\comment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:249105372559d876f55-05544605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ee4ee8cafceb678c31560fa0635aecdbde92b41' => 
    array (
      0 => 'ri.plugins\\CommentPlugin\\comment.tpl',
      1 => 1400098354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '249105372559d876f55-05544605',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5372559d87a5a5_90243608',
  'variables' => 
  array (
    'commentactive' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5372559d87a5a5_90243608')) {function content_5372559d87a5a5_90243608($_smarty_tpl) {?>        <table id="tabs-2">
            <tbody>
                <tr>
                    <td>
                        <input <?php if ($_smarty_tpl->tpl_vars['commentactive']->value) {?>checked=""<?php }?> type="checkbox" name="commentactive"/>Zastosuj komentarze do tej strony
                    </td>
                    <td>
                        <input formaction="/ri.plugins/CommentPlugin/PluginFunction.php" type="submit" name="edit" value="Zapisz"/>
                    </td>
                </tr>
            </tbody>
        </table><?php }} ?>
