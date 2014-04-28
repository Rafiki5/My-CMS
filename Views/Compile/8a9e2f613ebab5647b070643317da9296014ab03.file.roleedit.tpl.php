<?php /* Smarty version Smarty-3.1.16, created on 2014-04-28 15:40:06
         compiled from ".\Views\Groups\roleedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23643534e98dc7e8bf9-52054481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a9e2f613ebab5647b070643317da9296014ab03' => 
    array (
      0 => '.\\Views\\Groups\\roleedit.tpl',
      1 => 1398692403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23643534e98dc7e8bf9-52054481',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_534e98dc817a08_36735774',
  'variables' => 
  array (
    'role' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534e98dc817a08_36735774')) {function content_534e98dc817a08_36735774($_smarty_tpl) {?><form id="editaction" method="post" action="/My-CMS/ri.class/Scripts/EditGroups.php">
    <table>
        <thead>
            <tr>
                <th>Opcje dostępu</th>
                <th><?php echo $_smarty_tpl->tpl_vars['role']->value['name'];?>
</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Edycja stron</td>
                <td>
                    <input <?php if ($_smarty_tpl->tpl_vars['role']->value['action']&&in_array('useraction',$_smarty_tpl->tpl_vars['role']->value['action'])) {?>checked=""<?php }?> name="action[]" type="checkbox" value="useraction"/>
                </td>
            </tr>
            <tr>
                <td>Edycja urzytkowników</td>
                <td>
                    <input <?php if ($_smarty_tpl->tpl_vars['role']->value['action']&&in_array('pageaction',$_smarty_tpl->tpl_vars['role']->value['action'])) {?>checked=""<?php }?> name="action[]" type="checkbox" value="pageaction"/>
                </td>
            </tr>
        
        <input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['id'];?>
"/>       
        <tr>
            <td colspan="2">
                    <input name="editaction" type="submit" value="Edytuj"/> 
            </td>
        </tr>

    </tbody>
    </table>
</form>
<?php }} ?>
