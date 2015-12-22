
<?php $this->load->view('includes/header'); ?>
<?php $this->lang->load('inventory/stocks',$this->config->item('language'));?>

<script type="text/javascript"  src="<?php echo base_url();?>js/inventory/stocks.js" > </script>

<div class="screens_title" ><?php echo $this->lang->line('title')?></div>


<div id="div_process_data" align="center">

<?php 
$current_language=$this->config->item('language');


$id=0;
$code='';
$name='';
$stock_manager='';
$address='';
$phone='';
$mobile='';
$fax='';
$email='';
$notes='';

if($mode!='add')
{
	if($mode=='return')
	{
		$id=			$stocks_row['id'];
		$code=			$stocks_row['code'];
		$name=			$stocks_row['name'];
		$stock_manager=	$stocks_row['stock_manager'];
		$address=		$stocks_row['address'];
		$phone=			$stocks_row['phone'];
		$mobile=		$stocks_row['mobile'];
		$fax=			$stocks_row['fax'];
		$email=			$stocks_row['email'];
		$notes=			$stocks_row['notes'];
		
	}
	else 
	{
		$id=			$stocks_row->id;
		$code=			$stocks_row->code;
		$name=			$stocks_row->name;
		$stock_manager=	$stocks_row->stock_manager;
		$address=		$stocks_row->address;
		$phone=			$stocks_row->phone;
		$mobile=		$stocks_row->mobile;
		$fax=			$stocks_row->fax;
		$email=			$stocks_row->email;
		$notes=			$stocks_row->notes;
		
		$are_canceled=	$stocks_row->are_canceled;
	}
}
?>
<form id="frm_process_data" name="frm_process_data" action="<?php echo base_url();?>inventory/stocks/submit_process/<?php echo $id ?>"  method="post">

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
			$undo_redirect_url=base_url()."inventory/stocks/view_all";
		}
		else 
		{
			
			$undo_redirect_url=base_url()."inventory/stocks/go_form/$id/view";
		}
		?>
		
		<a href="<?php echo $undo_redirect_url; ?>"><img src='<?php echo base_url()."/images/icons/undo.png"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_undo'); ?>'/></a>
		</td>
		
		<td width="100px"></td>
		<td width="100px"></td> 
		<?php }?>
		
		<?php if($mode=='view') { ?>
		
		<td width="100px">
		<a href="<?php echo base_url();?>inventory/stocks/go_form/0/add"><img src='<?php echo base_url()."/images/icons/add.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_add'); ?>'/></a>
		</td> 
		
		<td width="100px">
		<a href="<?php echo base_url();?>inventory/stocks/go_form/<?php echo $id; ?>/edit"><img src='<?php echo base_url()."/images/icons/edit.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_edit'); ?>'/></a> 
		</td> 
		
		<td width="100px">
		<a href="<?php echo base_url();?>inventory/stocks/delete/<?php echo $id; ?>"><img src='<?php echo base_url()."/images/icons/delete.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_delete'); ?>'  onclick="return delete_confirm('<?php echo $this->config->item('language'); ?>');" /></a> 
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
		<a href="<?php echo base_url();?>inventory/stocks/cancel_uncancel/<?php echo $id."/".$what_will."/form"; ?>"><img src='<?php echo base_url()."/images/icons/".$icon; ?>' width='33'; height='33' title='<?php  echo $title; ?>'  /></a> 
		</td> 
		
		
		<?php } ?>
			
		<td width="100px"></td>
		<td width="100px"></td>
		<td width="200px">
		<a href="<?php echo base_url();?>inventory/stocks/" ><?php echo $this->lang->line('lnk_view_all'); ?></a> 
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
	$guiTools->cellLabelTitle('100px', $this->lang->line('stock_manager'));
	$guiTools->cellLabelValue('200px',$stock_manager);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('address'));
	$guiTools->cellLabelValue('400px',$address);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('phone'));
	$guiTools->cellLabelValue('60px',$phone);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('mobile'));
	$guiTools->cellLabelValue('60px',$mobile);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('fax'));
	$guiTools->cellLabelValue('60px',$fax);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('email'));
	$guiTools->cellLabelValue('200px',$email);
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
	$guiTools->cellLabelTitle('100px', $this->lang->line('stock_manager'));
	$guiTools->cellTextbox('200px','50','50','txt_stock_manager','txt_stock_manager',$stock_manager);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('address'));
	$guiTools->cellTextbox('400px','100','100','txt_address','txt_address',$address);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('phone'));
	$guiTools->cellTextbox('60px','30','30','txt_phone','txt_phone',$phone);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('mobile'));
	$guiTools->cellTextbox('60px','30','txt_mobile','txt_mobile',$mobile);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('fax'));
	$guiTools->cellTextbox('60px','30','30','txt_fax','txt_fax',$fax);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('email'));
	$guiTools->cellTextbox('200px','50','50','txt_email','txt_email',$email);
	$guiTools->endRow();
	
	$guiTools->beginRow();
	$guiTools->cellLabelTitle('100px', $this->lang->line('notes'));
	$guiTools->cellTextbox('200px','100','100','txt_notes','txt_notes',$notes);
	$guiTools->endRow();
}


$guiTools->endTable();


?>



</form>
</div>

<?php $this->load->view('includes/footer'); ?>