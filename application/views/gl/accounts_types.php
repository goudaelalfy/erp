<?php $this->load->view('includes/header'); ?>
<?php $this->lang->load('gl/accounts_types',$this->config->item('language'));?>

<?php 

$guiTools = new GuiTools();


$guiTools->beginDiv('background-color: #667799; width:100%; height:40px; text-align:center ; font: 28px Verdana, Arial, Helvetica, sans-serif;font-weight: bold;color:white; -moz-border-radius: 5px 5px 5px 5px ;');
echo 'Accounts Types';
$guiTools->endDiv();

$guiTools->newLine();
$guiTools->newLine();


$guiTools->beginTable('width: 100%;');

$guiTools->beginRow();
$guiTools->cellLabel(150,'','',$this->lang->line('accounts_types_code'),'');
$guiTools->cellTextbox(100,'txtAccountTypeCode', 'txtAccountTypeCode','width:200');

$guiTools->endRow();

$guiTools->beginRow();
$guiTools->cellLabel(150,'','',$this->lang->line('accounts_types_name_en'),'');
$guiTools->cellTextbox(100,'txtAccountTypeNameEn', 'txtAccountTypeNameEn','width:500');
$guiTools->cellLabel(100);
$guiTools->endRow();

$guiTools->beginRow();
$guiTools->cellLabel(150,'','',$this->lang->line('accounts_types_name_ar'),'');
$guiTools->cellTextbox(100,'txtAccountTypeNameAr', 'txtAccountTypeNameAr','width:500');

$guiTools->endRow();

$guiTools->beginRow();
$guiTools->cellLabel(150,'','',$this->lang->line('accounts_types_class'),'');
$guiTools->cellTextbox(100,'txtAccountTypeClass', 'txtAccountTypeClass','width:400');

$guiTools->endRow();

$guiTools->beginRow();
$guiTools->cellLabel(100);
$guiTools->cellSubmit(100, 'smtAccountsTypes', 'smtAccountsTypes', $this->lang->line('accounts_types_smt'));

$guiTools->endRow();



$guiTools->endTable();

?>


<?php $this->load->view('includes/footer'); ?>
