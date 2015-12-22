<?php $this->load->view('includes/header'); ?>
<?php $this->lang->load('ums/screens_access',$this->config->item('language'));?>

<script type="text/javascript"  src="<?php echo base_url();?>js/ums/screens_access.js" > </script>

<div  class="screens_title" ><?php echo $this->lang->line('title')?></div>

<div  class='screen_display' align="center" id='div_screen_display'>
<form id="frm_display_data" name="frm_display_data" action="<?php echo base_url();?>ums/screens_access/submit_display" method="post">

<table >
	<tr>
		<?php if($mode!='view') { ?>
		<td width="100px" >
		<input type="submit" id='btn_save' name='btn_save' style="background-image: url(<?php echo base_url()."/images/icons/save.gif"; ?>); width:33px ; height:33px" value='' title='<?php  echo $this->lang->line('btn_save'); ?>' onclick="return validate_form('<?php echo $this->config->item('language'); ?>');"/> 
		</td>
		<td width="100px">
		<a href="<?php echo base_url();?>ums/screens_access/view_all/view"><img src='<?php echo base_url()."/images/icons/undo.png"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_undo'); ?>'/></a>
		</td>
		 
		 
		<?php }?>
		
		<?php if($mode=='view') { ?>
		
		
		
		<td width="100px">
		<a href="<?php echo base_url();?>ums/screens_access/go_form/edit"><img src='<?php echo base_url()."/images/icons/edit.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_edit'); ?>'/></a> 
		</td> 
		<td width="100px"></td> 
		 
		
		<?php } ?>
		
		<td width="100px"></td> 
		<td width="100px"></td>
		<td width="100px"></td>
		<td width="100px"></td>
		<td width="200px"></td>
		
	</tr>
	
	<tr>
	<td colspan="7" height="30px"></td> 
	</tr>
	
</table>

<?php 

echo"<div id='div_table_display_records'>";

$functions = new Functions();

$link_to_screen=base_url().'ums/screens_access';

$functions->display_data_table($develop_screens,$link_to_screen,$this); 

		
echo"</div>";

?>

</form>
</div>

<?php $this->load->view('includes/footer'); ?>