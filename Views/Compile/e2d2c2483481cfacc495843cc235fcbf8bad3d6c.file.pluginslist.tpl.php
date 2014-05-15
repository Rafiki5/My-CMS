<?php /* Smarty version Smarty-3.1.16, created on 2014-05-15 21:26:34
         compiled from ".\Views\Plugins\pluginslist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27933536d3be366a950-83032384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2d2c2483481cfacc495843cc235fcbf8bad3d6c' => 
    array (
      0 => '.\\Views\\Plugins\\pluginslist.tpl',
      1 => 1400181948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27933536d3be366a950-83032384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_536d3be36a1460_58378842',
  'variables' => 
  array (
    'plugins' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536d3be36a1460_58378842')) {function content_536d3be36a1460_58378842($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['plugins']->value) {?>
    <table id="plugins">
        <thead>
        <th>Nzawa</th>
        <th>Opis</th>
        <th>Stan</th>
        </thead>
        <tbody>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['plugins']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['plugins']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</td>
             <td><?php echo $_smarty_tpl->tpl_vars['plugins']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['description'];?>
</td>
             <?php if ($_smarty_tpl->tpl_vars['plugins']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['active']=='true') {?>
                 <td><a href="/ri.class/Scripts/EditPlugins.php?plugin=<?php echo $_smarty_tpl->tpl_vars['plugins']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
&action=remove">Wyłącz</a></td>
             <?php } else { ?>
                 <td><a href="/ri.class/Scripts/EditPlugins.php?plugin=<?php echo $_smarty_tpl->tpl_vars['plugins']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
&action=add">Włącz</a></td>
             <?php }?>
                     
        </tr>
    <?php endfor; endif; ?>
    </tbody>
    </table>
<?php } else { ?>
    <p id="plugindefected">W katalogu ri.plugins nie ma wtyczek</p>
<?php }?><?php }} ?>
