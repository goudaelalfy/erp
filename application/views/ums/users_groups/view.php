<?php $this->load->view('includes/header'); ?>
<?php $this->lang->load('ums/users_groups',$this->config->item('language'));?>


<script type="text/javascript"  src="<?php echo base_url();?>js/ums/users_groups.js" > </script>

<div  class="screens_title" ><?php echo $this->lang->line('title')?></div>

<div  class='screen_display' align="center">
<form id="frm_display_data" name="frm_display_data" action="<?php echo base_url();?>ums/users_groups/submit_display" method="post">

<table >
	<tr height="50px" valign="top">
		<td width="100px"><a href="<?php echo base_url();?>ums/users_groups/go_form/0/add"><img src='<?php echo base_url()."/images/icons/add.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_add'); ?>'/></a></td> 
		<td width="100px"><a href="javascript: submitform()" onclick="return delete_all_confirm('<?php echo $this->config->item('language'); ?>');" id='lnk_delete_all' name='lnk_delete_all' ><img src='<?php echo base_url()."/images/icons/delete.gif"; ?>' width='33'; height='33' title='<?php  echo $this->lang->line('btn_delete_all'); ?>' /></a></td> 
		<td width="100px"></td> 
		<td width="100px"></td> 
		<td width="100px"></td>
		<td width="100px"></td> 
		<td width="200px"></td>
	</tr>
</table>

<?php 

echo"<div id='div_table_display_records'>";

$functions = new Functions();

$link_to_screen=base_url().'ums/users_groups';

$functions->display_data_table($users_groups,$link_to_screen,$this); 

echo"</div>";

?>

</form>
</div>

<?php $this->load->view('includes/footer'); ?>