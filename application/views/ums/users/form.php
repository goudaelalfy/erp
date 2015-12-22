<?php $this->load->view('includes/header'); ?>
<?php $this->lang->load('ums/users',$this->config->item('language'));?>

<?php 
$this->load->model('ums/Users_groups_model','Users_groups_model',True);
$this->load->model('ums/Users_rules_model','Users_rules_model',True);
?>

<script type="text/javascript"  src="<?php echo base_url();?>js/ums/users.js" > </script>

<div class="screens_title" ><?php echo $this->lang->line('title')?></div>


<div id="div_process_data" align="center">

<?php 
$current_language=$this->config->item('language');

		$id=0;
		$username=			'';
		$password=			'';
		$name=				'';
		$mobile=			'';
		$telephone=			'';
		$email=				'';
		$address=			'';
		$notes=				'';
		
		$user_group_id=		0;
		$user_group=		'';
		$user_rule_id=		0;
		$user_rule=			'';
		

$are_disabled="";

if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
	}
	
	if($mode=='return')
	{
		$id=				$users_row['id'];
		$username=			$users_row['username'];
		$password=			$users_row['password'];
		$name=				$users_row['name'];
		$mobile=			$users_row['mobile'];
		$telephone=			$users_row['telephone'];
		$email=				$users_row['email'];
		$address=			$users_row['address'];
		$notes=				$users_row['notes'];
		
		$user_group_id=		$users_row['user_group_id'];
		$user_group=		$users_row['group'];
		$user_rule_id=		$users_row['user_rule_id'];
		$user_rule=			$users_row['rule'];
		
	}
	else 
	{
		$id=				$users_row->id;
		$username=			$users_row->username;
		$password=			$users_row->password;
		$name=				$users_row->name;
		$mobile=			$users_row->mobile;
		$telephone=			$users_row->telephone;
		$email=				$users_row->email;
		$address=			$users_row->address;
		$notes=				$users_row->notes;
		
		$user_group_id=		$users_row->user_group_id;
		$user_group=		$users_row->group;
		$user_rule_id=		$users_row->user_rule_id;
		$user_rule=			$users_row->rule;
		
		
		$updated_at=		$users_row->updated_at;
		
		$are_canceled=		$users_row->are_canceled;
	}
	
}
?>
<form id="frm_process_data" name="frm_process_data" action="<?php echo base_url();?>ums/users/submit_process/<?php echo $id ?>"  method="post">

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
			$undo_redirect_url=base_url()."ums/users/view_all";
		}
		else 
		{
			
			$undo_redirect_url=base_url()."ums/users/go_form/$id/view";
		}
		?>
		
		<a href="<?php echo $undo_redirect_url; ?>"><img src='<?php echo base_url()."/images/icons/undo.png"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_undo'); ?>'/></a>
		</td>
		
		<td width="100px"></td>
		<td width="100px"></td>
		 
		 
		<?php }?>
		
		<?php if($mode=='view') { ?>
		
		<td width="100px">
		<a href="<?php echo base_url();?>ums/users/go_form/0/add"><img src='<?php echo base_url()."/images/icons/add.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_add'); ?>'/></a>
		</td> 
		
		<td width="100px">
		<a href="<?php echo base_url();?>ums/users/go_form/<?php echo $id; ?>/edit"><img src='<?php echo base_url()."/images/icons/edit.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_edit'); ?>'/></a> 
		</td> 
		
		<td width="100px">
		<a href="<?php echo base_url();?>ums/users/delete/<?php echo $id; ?>"><img src='<?php echo base_url()."/images/icons/delete.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_delete'); ?>'  onclick="return delete_confirm('<?php echo $this->config->item('language'); ?>');" /></a> 
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
		<a href="<?php echo base_url();?>ums/users/cancel_uncancel/<?php echo $id."/".$what_will."/form"; ?>"><img src='<?php echo base_url()."/images/icons/".$icon; ?>' width='33'; height='33' title='<?php  echo $title; ?>'  /></a> 
		</td> 
		
		<?php } ?>
		

		<td width="100px"></td>
		<td width="100px"></td>
		<td width="200px">
		<a href="<?php echo base_url();?>ums/users/" ><?php echo $this->lang->line('lnk_view_all'); ?></a> 
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

$dropdowns= new Dropdowns();

$popups= new Popups();

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
	$guiTools->cellLabelTitle('120px', $this->lang->line('username'));
	$guiTools->cellLabelValue('700px',$username); //The 750px width to have agood apearence.
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('password'));
	$guiTools->cellLabelValue('200px',$password);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('name'));
	$guiTools->cellLabelValue('200px',$name);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('120px', $this->lang->line('mobile'));
	$guiTools->cellLabelValue('200px',$mobile);						
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('telephone'));
	$guiTools->cellLabelValue('200px',$telephone);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('email'));
	$guiTools->cellLabelValue('200px',$email);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('120px', $this->lang->line('address'));
	$guiTools->cellLabelValue('200px',$address);						
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('notes'));
	$guiTools->cellLabelValue('200px',$notes);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('user_group'));
	$guiTools->cellLabelValue('200px',$user_group);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('120px', $this->lang->line('user_rule'));
	$guiTools->cellLabelValue('200px',$user_rule);						
	$guiTools->endRow();
	
	
}
else 
{
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle_Required('120px', $this->lang->line('username'));
	$guiTools->cellTextbox('700px','20','20','txt_username','txt_username',$username);						
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle_Required('100px', $this->lang->line('password'));
	$guiTools->cellPassword('200px','30','30','txt_password','txt_password',$password);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle_Required('100px', $this->lang->line('name'));
	$guiTools->cellTextbox('200px','40','50','txt_name','txt_name',$name);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('120px', $this->lang->line('mobile'));
	$guiTools->cellTextbox('200px','30','30','txt_mobile','txt_mobile',$mobile);						
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('telephone'));
	$guiTools->cellTextbox('200px','30','30','txt_telephone','txt_telephone',$telephone);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('email'));
	$guiTools->cellTextbox('200px','40','50','txt_email','txt_email',$email);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('120px', $this->lang->line('address'));
	$guiTools->cellTextbox('200px','50','100','txt_address','txt_address',$address);						
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('notes'));
	$guiTools->cellTextarea('200px','txt_notes','txt_notes','2','40',$notes);
	$guiTools->endRow();
	
	$dropdowns->tr_drpdwn_user_group($this->lang->line('user_group'),$user_group_id);
	
	$popups->tr_popup_user_rule($this->lang->line('user_rule'),$user_rule_id,$user_rule);
	
}

$guiTools->endTable();



?>



</form>
</div>

<?php $this->load->view('includes/footer'); ?>