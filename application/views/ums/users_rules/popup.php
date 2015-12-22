<?php $this->load->view('includes/header_popup'); ?>
<?php $this->lang->load('ums/users_rules',$this->config->item('language'));?>


<!--Tree JS and Styles -->   
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/ums/users_rules/tree/jquery/plugins/simpleTree/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/ums/users_rules/tree/style.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/users_rules/tree/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/users_rules/tree/jquery/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/users_rules/tree/jquery/plugins/simpleTree/jquery.simple.tree.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/users_rules/tree/langManager.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/users_rules/tree/operations.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/users_rules/tree/init.js"></script>
    
<script type="text/javascript"  src="<?php echo base_url();?>js/ums/users_rules.js" > </script>

<?php 
$this->load->model('ums/Users_rules_model','Users_rules_model',TRUE);

$tree_elements =$this->Users_rules_model->get_element_list_for_popup(null);

?>

<div  class="screens_menu" ><?php echo $this->lang->line('title')?></div>

<div id="screen_display" align="center" >
<form id="frm_display_data" name="frm_display_data"  method="post" >



<div class="contextMenu" id="myMenu1">	
		<li class="addFolder"><img src="<?php echo base_url(); ?>/js/ums/users_rules/tree/jquery/plugins/simpleTree/images/folder_add.png" /> </li>
		<!--<li class="addDoc"><img src="<?php echo base_url(); ?>/js/ums/users_rules/tree/jquery/plugins/simpleTree/images/page_add.png" /> </li>	-->
		<li class="edit"><img src="<?php echo base_url(); ?>/js/ums/users_rules/tree/jquery/plugins/simpleTree/images/folder_edit.png" /> </li>
		<li class="delete"><img src="<?php echo base_url(); ?>/js/ums/users_rules/tree/jquery/plugins/simpleTree/images/folder_delete.png" /> </li>
		<li class="expandAll"><img src="<?php echo base_url(); ?>/js/ums/users_rules/tree/jquery/plugins/simpleTree/images/expand.png"/> </li>
		<li class="collapseAll"><img src="<?php echo base_url(); ?>/js/ums/users_rules/tree/jquery/plugins/simpleTree/images/collapse.png"/> </li>	
</div>
<div class="contextMenu" id="myMenu2">
		<li class="edit"><img src="<?php echo base_url(); ?>/js/ums/users_rules/tree/jquery/plugins/simpleTree/images/page_edit.png" /> </li>
		<li class="delete"><img src="<?php echo base_url(); ?>/js/ums/users_rules/tree/jquery/plugins/simpleTree/images/page_delete.png" /> </li>
</div>

<div id="wrap">
	<div id="annualWizard">	
			<ul  class="simpleTree" id='pdfTree'>		
					<li class="root" id='<?php echo $this->Users_rules_model->get_root_id();  ?>'><span><?php echo $this->Users_rules_model->get_root_name(); ?></span>
						<ul><?php echo $tree_elements; ?></ul>				
					</li>
			</ul>						
</div>	
	
</div> 

</form>
</div>

<div style="height:100px" align="center" >

<?php $this->load->view('includes/footer'); ?>