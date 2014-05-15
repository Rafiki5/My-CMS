<?php /* Smarty version Smarty-3.1.16, created on 2014-05-15 15:51:52
         compiled from ".\Views\Pages\pagelist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4583531dbe005f8a86-66050202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61b521fd6646c1ed9c2d6ab9c63d7336882ace02' => 
    array (
      0 => '.\\Views\\Pages\\pagelist.tpl',
      1 => 1400161908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4583531dbe005f8a86-66050202',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_531dbe007ce355_86388836',
  'variables' => 
  array (
    'pages' => 0,
    'page' => 0,
    'title' => 0,
    'content' => 0,
    'path' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531dbe007ce355_86388836')) {function content_531dbe007ce355_86388836($_smarty_tpl) {?>
<ul id="page-list">Lista utworzonych stron
    <?php if ($_smarty_tpl->tpl_vars['pages']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
        <li><a href="/pages/pageslist/<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
</a></li>
    <?php } ?>
    <?php }?>
    <li><a href="/pages/pageslist">Dodaj nową stronę</a> </li>
</ul>     
<form id="pages" method="post" action="/ri.class/Scripts/EditPage.php">
    <fieldset>
        <legend>Edytowanie stron</legend>
        <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Dane podstawowe</a></li>
            <?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?>
            <li><a href="#tabs-2"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a></li>
            <?php }?>
        </ul>
   
        <table id="tabs-1">
            <tr><td>
        
        <label>Tytuł strony<br>
            <input maxlength="25" type="text" name="title" value="<?php if ($_smarty_tpl->tpl_vars['content']->value) {?><?php echo $_smarty_tpl->tpl_vars['content']->value['title'];?>
<?php }?>"/>
        </label><br>
        <label>Nazwa strony<br>
            <input maxlength="25" type="text" name="name" value="<?php if ($_smarty_tpl->tpl_vars['content']->value) {?><?php echo $_smarty_tpl->tpl_vars['content']->value['name'];?>
<?php }?>"/>
        </label>
        </td><td>
        <label id="check">
            <input <?php if ($_smarty_tpl->tpl_vars['content']->value&&$_smarty_tpl->tpl_vars['content']->value['id']==1) {?>disabled <?php }?> <?php if ($_smarty_tpl->tpl_vars['content']->value&&$_smarty_tpl->tpl_vars['content']->value['pactive']) {?>checked<?php }?> type="checkbox" name="activepage"/>Dostępność strony<br>
            <input <?php if ($_smarty_tpl->tpl_vars['content']->value&&$_smarty_tpl->tpl_vars['content']->value['mactive']) {?> checked <?php }?>type="checkbox" name="activemenu"/>Widoczność strony w menu<br>
        </label>
        </td></tr><tr><td colspan="2">
        <label>Treść strony<br>
            <textarea id="create-page" name="body" rows="20" cols="60">
<?php if ($_smarty_tpl->tpl_vars['content']->value) {?>
<?php echo $_smarty_tpl->tpl_vars['content']->value['body'];?>

<?php }?>
</textarea>
        </label><br>
        <?php if ($_smarty_tpl->tpl_vars['content']->value) {?>
            <input type="hidden" name="id" value="<?php if ($_smarty_tpl->tpl_vars['content']->value) {?><?php echo $_smarty_tpl->tpl_vars['content']->value['id'];?>
<?php }?>"/>
            <input type="submit" name="editpage" value="Edytuj stronę"/>
            <input <?php if ($_smarty_tpl->tpl_vars['content']->value&&$_smarty_tpl->tpl_vars['content']->value['id']==1) {?>disabled <?php }?> type="submit" name="deletepage" value="Usuń stronę"
                   onclick="return confirm('Czy na pewno chcesz usunąć tę strone?')"/>
        <?php } else { ?>
            <input type="submit" name="addpage" value="Dodaj stronę"/>
        <?php }?>
        </td></tr>
        </table>
        <?php if (isset($_smarty_tpl->tpl_vars['path']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
        </div>
    </fieldset>
</form>

<?php }} ?>
