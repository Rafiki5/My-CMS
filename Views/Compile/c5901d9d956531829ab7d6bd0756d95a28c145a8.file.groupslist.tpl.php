<?php /* Smarty version Smarty-3.1.16, created on 2014-04-07 17:36:33
         compiled from ".\Views\Groups\groupslist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21470533ac372601527-99529969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5901d9d956531829ab7d6bd0756d95a28c145a8' => 
    array (
      0 => '.\\Views\\Groups\\groupslist.tpl',
      1 => 1396884989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21470533ac372601527-99529969',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533ac37280e494_28943483',
  'variables' => 
  array (
    'role' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533ac37280e494_28943483')) {function content_533ac37280e494_28943483($_smarty_tpl) {?><table id="userslist">
    <thead>
        <tr>
            <th>lp.</th>
            <th>Nazwa</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['groups']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['groups']['iteration']++;
?>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['groups']['iteration'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</td>
                <td>
                <?php if ($_smarty_tpl->tpl_vars['group']->value['id']!=1) {?>
                    <a href="/My-CMS/groups/roleedit">Edytuj </a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['group']->value['id']!=1&&$_smarty_tpl->tpl_vars['group']->value['id']!=2) {?>
                    <a onclick="confirm('Czy na pewno chcesz usunąć tą grupę?')" href="/My-CMS/ri.class/Scripts/EditGroups.php?action=del&id=<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
">Usuń</a>           
                <?php }?>
                </td>
            </tr>
        <?php } ?>
        <tr>
    <form action="/My-CMS/ri.class/Scripts/EditGroups.php" method="post">
        <td>Dodaj grupe</td>
        <td><input type="text" name="groupname"/></td>
        <td><input type="submit" name="addgroup" value="Dodaj"/></td>
    </form>
        </tr>
    </tbody>
</table><?php }} ?>
