
<?php $this->load->view('includes/header_popup'); ?>

<script type="text/javascript"  src="<?php echo base_url();?>js/ums/users_rules.js" > </script>

<div class="screens_title" ><?php echo $this->lang->line('title')?></div>


<div id="div_process_data" align="center">

<?php 
$current_language=$this->config->item('language');


$id=0;
$code='';
$name='';
$position='';
$parent_id='';
$notes='';

if($mode=='add') 
{
	if(isset($users_rules_row->id))
	{
		$parent_id= $users_rules_row->id;
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
		$id=			$users_rules_row['id'];
		$code=			$users_rules_row['code'];
		$name=			$users_rules_row['name'];
		$parent_id=		$users_rules_row['parent_id'];
		$notes=			$users_rules_row['notes'];
		
	}
	else 
	{
		$id=			$users_rules_row->id;
		$code=			$users_rules_row->code;
		$name=			$users_rules_row->name;
		$position=		$users_rules_row->position;
		$parent_id=		$users_rules_row->parent_id;
		$notes=			$users_rules_row->notes;
		
		$are_canceled=	$users_rules_row->are_canceled;
	}
}

?>
<form id="frm_process_data" name="frm_process_data" action="<?php echo base_url();?>ums/users_rules/submit_process/<?php echo $id ?>"  method="post">

<table class="common">
	<tr>
		<td width="100px" height="30px"></td> 
	</tr>
	<tr>
		<?php if($mode!='view') { ?>
		<td width="100px" >
		<a href="javascript:submit_form();" ><img src="<?php echo base_url()?>/images/icons/save.gif" style= "width:33px ; height:33px"  title='<?php  echo $this->lang->line('btn_save'); ?>'  onclick="return validate_form('<?php echo $this->config->item('language'); ?>'); "/> </a> 
		</td> 
		<?php }?>
		
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