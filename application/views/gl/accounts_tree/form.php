
<?php $this->load->view('includes/header_popup'); ?>

<script type="text/javascript"  src="<?php echo base_url();?>js/gl/accounts_tree.js" > </script>

<div class="screens_title" ><?php echo $this->lang->line('title')?></div>


<div id="div_process_data" align="center">

<?php 
$current_language=$this->config->item('language');


$id=0;
$code='';
$name='';
$position='';
$parent_id='';
$slave='';
$notes='';

if($mode=='add') 
{
	if(isset($accounts_tree_row->id))
	{
		$parent_id= $accounts_tree_row->id;
	}
	else 
	{
		$parent_id= 0;
	}
}
else 
{
	if($mode=='return')
	{
		$id=			$accounts_tree_row['id'];
		$code=			$accounts_tree_row['code'];
		$name=			$accounts_tree_row['name'];
		//$position=		$accounts_tree_row['position'];
		$parent_id=		$accounts_tree_row['parent_id'];
		//$slave=			$accounts_tree_row['slave'];
		$notes=			$accounts_tree_row['notes'];
		
	}
	else 
	{
		$id=			$accounts_tree_row->id;
		$code=			$accounts_tree_row->code;
		$name=			$accounts_tree_row->name;
		$position=		$accounts_tree_row->position;
		$parent_id=		$accounts_tree_row->parent_id;
		$slave=			$accounts_tree_row->slave;
		$notes=			$accounts_tree_row->notes;
		
		$are_canceled=	$accounts_tree_row->are_canceled;
	}
}

?>
<form id="frm_process_data" name="frm_process_data" action="<?php echo base_url();?>gl/accounts_tree/submit_process/<?php echo $id ?>"  method="post">

<table class="common">
	<tr>
		<td width="100px" height="30px"></td> 
	</tr>
	<tr>
		<td width="100px" >
		<input type="submit" id='btn_save' name='btn_save' style="background-image: url(<?php echo base_url()."/images/icons/save.gif"; ?>); width:33px ; height:33px" value='' title='<?php  echo $this->lang->line('btn_save'); ?>' onclick="return validate_form('<?php echo $this->config->item('language'); ?>');"/> 
		</td> 
		<td width="100px"></td>
		<td width="100px"></td> 
		<td width="100px"></td>
		<td width="100px"></td>
		<td width="100px"></td>
		<td width="200px"></td>
		
	</tr>
	<tr>
		<td width="100px" colspan="9" height="10px"></td> 
	</tr>
	<tr>
		<td width="100px" colspan="9" height="10px"><span style="color:red";> 
		<?php 
		if(isset($error))
		{
			echo $error;
		}
		?>
		</span> </td> 
	</tr>
</table>



<?php 


$guiTools = new GuiTools();

$guiTools->beginTable();


$guiTools->beginRow();
$guiTools->cellHidden('hdn_parent_id', 'hdn_parent_id', $parent_id);
$guiTools->endRow();
		


$guiTools->beginRow();
$guiTools->cellHidden('hdn_id', 'hdn_id', $id);
$guiTools->endRow();


if($mode=='view')
{
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('120px', $this->lang->line('code'));
	$guiTools->cellLabelValue('800px',$code);						//The 750px width to have agood apearence.
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('name'));
	$guiTools->cellLabelValue('200px',$name);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('notes'));
	$guiTools->cellLabelValue('200px',$notes);
	$guiTools->endRow();
}
else 
{
	$guiTools->beginRow();
	$guiTools->cellLabelTitle_Required('120px', $this->lang->line('code'));
	$guiTools->cellTextbox('800px','10','10','txt_code','txt_code',$code);	//The 750px width to have agood apearence.
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle_Required('100px', $this->lang->line('name'));
	$guiTools->cellTextbox('200px','50','100','txt_name','txt_name',$name);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('notes'));
	$guiTools->cellTextbox('200px','50','100','txt_notes','txt_notes',$notes);
	$guiTools->endRow();
}


$guiTools->endTable();


?>



</form>
</div>

<?php $this->load->view('includes/footer_popup'); ?>