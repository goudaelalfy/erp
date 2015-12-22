
<?php $this->load->view('includes/header'); ?>
<?php $this->lang->load('ums/users_groups',$this->config->item('language'));?>

<script type="text/javascript"  src="<?php echo base_url();?>js/ums/users_groups.js" > </script>

<div class="screens_title" ><?php echo $this->lang->line('title')?></div>


<div id="div_process_data" align="center">

<?php 
$current_language=$this->config->item('language');

$id=0;
$code='';
$name='';
$notes='';

$are_disabled="";

if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
	}
	
	if($mode=='return')
	{
		$id=			$users_groups_row['id'];
		$code=			$users_groups_row['code'];
		$name=			$users_groups_row['name'];
		$notes=			$users_groups_row['notes'];
		
	}
	else 
	{
		$id=			$users_groups_row->id;
		$code=			$users_groups_row->code;
		$name=			$users_groups_row->name;
		$notes=			$users_groups_row->notes;
		
		$updated_at=	$users_groups_row->updated_at;
		
		$are_canceled=	$users_groups_row->are_canceled;
	}
	
}
?>
<form id="frm_process_data" name="frm_process_data" action="<?php echo base_url();?>ums/users_groups/submit_process/<?php echo $id ?>"  method="post">

<table class="common">
	<tr>
		<td width="100px" height="30px"></td> 
	</tr>
	<tr>
		<?php if($mode!='view') { ?>
		<td width="100px" >
		<input type="submit" id='btn_save' name='btn_save' style="background-image: url(<?php echo base_url()."/images/icons/save.gif"; ?>); width:33px ; height:33px" value='' title='<?php  echo $this->lang->line('btn_save'); ?>' onclick="return validate_form('<?php echo $this->config->item('language'); ?>');"/> 
		</td>
		<td width="100px">
		<?php 
		if($id==0)
		{
			$undo_redirect_url=base_url()."ums/users_groups/view_all";
		}
		else 
		{
			
			$undo_redirect_url=base_url()."ums/users_groups/go_form/$id/view";
		}
		?>
		
		<a href="<?php echo $undo_redirect_url; ?>"><img src='<?php echo base_url()."/images/icons/undo.png"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_undo'); ?>'/></a>
		</td>
		
		<td width="100px"></td>
		<td width="100px"></td>
		 
		 
		<?php }?>
		
		<?php if($mode=='view') { ?>
		
		<td width="100px">
		<a href="<?php echo base_url();?>ums/users_groups/go_form/0/add"><img src='<?php echo base_url()."/images/icons/add.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_add'); ?>'/></a>
		</td> 
		
		<td width="100px">
		<a href="<?php echo base_url();?>ums/users_groups/go_form/<?php echo $id; ?>/edit"><img src='<?php echo base_url()."/images/icons/edit.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_edit'); ?>'/></a> 
		</td> 
		
		<td width="100px">
		<a href="<?php echo base_url();?>ums/users_groups/delete/<?php echo $id; ?>"><img src='<?php echo base_url()."/images/icons/delete.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_delete'); ?>'  onclick="return delete_confirm('<?php echo $this->config->item('language'); ?>');" /></a> 
		</td> 
		
		<td width="100px">
		<?php 
		if($are_canceled==0)
		{
			$what_will=1;
			$icon="cancel.png";
			$title=$this->lang->line('btn_cancel');
		}
		else
		{
			$what_will=0;
			$icon="uncancel.png";
			$title=$this->lang->line('btn_uncancel');
		}
		?>
		<a href="<?php echo base_url();?>ums/users_groups/cancel_uncancel/<?php echo $id."/".$what_will."/form"; ?>"><img src='<?php echo base_url()."/images/icons/".$icon; ?>' width='33'; height='33' title='<?php  echo $title; ?>'  /></a> 
		</td> 
		
		<?php } ?>
		

		<td width="100px"></td>
		<td width="100px"></td>
		<td width="200px">
		<a href="<?php echo base_url();?>ums/users_groups/" ><?php echo $this->lang->line('lnk_view_all'); ?></a> 
		</td>
		
	</tr>
	<tr>
		<td width="100px" colspan="9" height="30px"></td> 
	</tr>
	<tr>
		<td width="100px" colspan="9" height="30px"><span style="color:red";> 
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
$guiTools->cellHidden('hdn_id', 'hdn_id', $id);
if($mode=='edit')
{
	$guiTools->cellHidden('hdn_updated_at', 'hdn_updated_at', $updated_at);
}
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
	$guiTools->cellTextbox('200px','50','50','txt_name','txt_name',$name);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('notes'));
	$guiTools->cellTextbox('200px','100','100','txt_notes','txt_notes',$notes);
	$guiTools->endRow();
}

$guiTools->endTable();





		echo "<div  class='screen_display' id='div_screen_table'>";
		
		echo "<table  class='screen_display_table' >";
		
		$index=0;
		$color_row='';
		$height_row='';
		
		foreach ($develop_screens as $record)
		{
			
				$current_row_id=0;
				
				if($index==0)
				{
					echo "<tr>";

							echo"<th  >". $this->lang->line('develop_screens')."</th>";
							echo"<th  >". $this->lang->line('prev_view')."</th>";
							echo"<th  >". $this->lang->line('prev_add')."</th>";
							echo"<th  >". $this->lang->line('prev_edit')."</th>";
							echo"<th  >". $this->lang->line('prev_delete')."</th>";
							echo"<th  >". $this->lang->line('prev_cancel')."</th>";
							echo"<th  >". $this->lang->line('prev_all')."</th>";
							
					echo "</tr>";
				}
				
				
				
				$screen_id=$record->id;
				$screen_code=$record->code;
				
				if($current_language=='english')
				{
					$screen_name=$record->name_en;
				}
				else if($current_language=='arabic')
				{
					$screen_name=$record->name_ar;
				}
					echo "<tr>";
					echo "<td colspan='7' align='center'> $screen_name </td>";	
					echo "</tr>";
					
					
				if($mode=='add' || ($mode=='return' && $id==0) )
				{
		
					$data['develop_screens_inner'] = $this->Users_groups_model->get_screens_by_parent($screen_id);
					$develop_screens_inner=$data['develop_screens_inner'];
					
					//$this->session->set_userdata('group_screens', $develop_screens_inner);
					
					foreach ($develop_screens_inner as $record_inner)
					{
						
						$screen_code=$record_inner->code;
						
						if($current_language=='english')
						{
							$screen_name=$record_inner->name_en;
						}
						else if($current_language=='arabic')
						{
							$screen_name=$record_inner->name_ar;
						}
						
						
							echo "<tr>";
						
						
							//$color_row='#C2D1E0';
							$color_row='#FFFFFF';
							$height_row='25px';
							
		
							
							
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'> $screen_name </td>";	
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_view'   name='chk_".$screen_code."_view'  	onchange=\"uncheckByView_for_screen('".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_add'    name='chk_".$screen_code."_add'   	onchange=\"checkView_for_screen('chk_".$screen_code."_add','".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_edit'   name='chk_".$screen_code."_edit'  	onchange=\"checkView_for_screen('chk_".$screen_code."_edit','".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_delete' name='chk_".$screen_code."_delete' 	onchange=\"checkView_for_screen('chk_".$screen_code."_delete','".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_cancel' name='chk_".$screen_code."_cancel' 	onchange=\"checkView_for_screen('chk_".$screen_code."_cancel','".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_all' name='chk_".$screen_code."_all'  		onchange=\"checkUncheck_for_screen('".$screen_code."')\"/></td>";
							
							
							
							echo "</tr>";
						}
					
					$index=$index+1;
				}
				
				else 
				{
					$data['develop_screens_inner'] = $this->Users_groups_model->get_screens_by_user_group_id($screen_id,$id);
					$develop_screens_inner=$data['develop_screens_inner'];
					
					
					
					foreach ($develop_screens_inner as $record_inner)
					{
						
						$screen_code=$record_inner->code;
						
						if($current_language=='english')
						{
							$screen_name=$record_inner->name_en;
						}
						else if($current_language=='arabic')
						{
							$screen_name=$record_inner->name_ar;
						}
						
						
						
						$view_checked="";
						$add_checked="";
						$edit_checked="";
						$delete_checked="";
						$cancel_checked="";
						
						if($record_inner->view==1)
						{
							$view_checked="checked='checked'";
						}
						if($record_inner->add==1)
						{
							$add_checked="checked='checked'";
						}
						if($record_inner->edit==1)
						{
							$edit_checked="checked='checked'";
						}
						if($record_inner->delete==1)
						{
							$delete_checked="checked='checked'";
						}
						if($record_inner->cancel==1)
						{
							$cancel_checked="checked='checked'";
						}
						
						
						
							echo "<tr>";
						
						
							//$color_row='#C2D1E0';
							$color_row='#FFFFFF';
							$height_row='25px';
							
		
							
							
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'> $screen_name </td>";	
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_view'   name='chk_".$screen_code."_view'   ".$view_checked."     ".$are_disabled."		onchange=\"uncheckByView_for_screen('".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_add'    name='chk_".$screen_code."_add'    ".$add_checked."      ".$are_disabled."  	onchange=\"checkView_for_screen('chk_".$screen_code."_add','".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_edit'   name='chk_".$screen_code."_edit'   ".$edit_checked."     ".$are_disabled."		onchange=\"checkView_for_screen('chk_".$screen_code."_edit','".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_delete' name='chk_".$screen_code."_delete' ".$delete_checked."   ".$are_disabled."		onchange=\"checkView_for_screen('chk_".$screen_code."_delete','".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_cancel' name='chk_".$screen_code."_cancel' ".$cancel_checked."   ".$are_disabled."		onchange=\"checkView_for_screen('chk_".$screen_code."_cancel','".$screen_code."')\" /></td>";
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_code."_all' name='chk_".$screen_code."_all'  	   						 ".$are_disabled."  	onchange=\"checkUncheck_for_screen('".$screen_code."')\" /></td>";
							
							
							
							
							echo "</tr>";
						}
					
					$index=$index+1;
					
				}
				
				
				
				
		}
		
		echo"</table>";
		
		echo"</div>";
	


?>



</form>
</div>

<?php $this->load->view('includes/footer'); ?>