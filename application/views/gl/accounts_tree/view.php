<?php $this->load->view('includes/header'); ?>
<?php $this->lang->load('gl/accounts_tree',$this->config->item('language'));?>


<!--Tree JS and Styles -->   
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/gl/accounts_tree/tree/jquery/plugins/simpleTree/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/gl/accounts_tree/tree/style.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/gl/accounts_tree/tree/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/gl/accounts_tree/tree/jquery/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/gl/accounts_tree/tree/jquery/plugins/simpleTree/jquery.simple.tree.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/gl/accounts_tree/tree/langManager.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/gl/accounts_tree/tree/gl_accountsTreeOperations.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/gl/accounts_tree/tree/init.js"></script>
    


<?php 
$this->load->model('gl/Accounts_tree_model','Accounts_tree_model',TRUE);

$tree_elements =$this->Accounts_tree_model->get_element_list(null);

?>




<div class="screens_menu">
<a href="<?php echo base_url();?>gl/accounts_tree"><?php echo $this->lang->line('title')?></a>
</div>

<div  class="screens_header" ><?php echo $this->lang->line('title')?></div>

<div id="display_data" align="center" >
<form id="frm_display_data" name="frm_display_data"  method="post">





<div class="contextMenu" id="myMenu1">	
		<li class="addFolder"><img src="<?php echo base_url(); ?>/js/gl/accounts_tree/tree/jquery/plugins/simpleTree/images/folder_add.png" /> </li>
		<li class="addDoc"><img src="<?php echo base_url(); ?>/js/gl/accounts_tree/tree/jquery/plugins/simpleTree/images/page_add.png" /> </li>	
		<li class="edit"><img src="<?php echo base_url(); ?>/js/gl/accounts_tree/tree/jquery/plugins/simpleTree/images/folder_edit.png" /> </li>
		<li class="delete"><img src="<?php echo base_url(); ?>/js/gl/accounts_tree/tree/jquery/plugins/simpleTree/images/folder_delete.png" /> </li>
		<li class="expandAll"><img src="<?php echo base_url(); ?>/js/gl/accounts_tree/tree/jquery/plugins/simpleTree/images/expand.png"/> </li>
		<li class="collapseAll"><img src="<?php echo base_url(); ?>/js/gl/accounts_tree/tree/jquery/plugins/simpleTree/images/collapse.png"/> </li>	
</div>
<div class="contextMenu" id="myMenu2">
		<li class="edit"><img src="<?php echo base_url(); ?>/js/gl/accounts_tree/tree/jquery/plugins/simpleTree/images/page_edit.png" /> </li>
		<li class="delete"><img src="<?php echo base_url(); ?>/js/gl/accounts_tree/tree/jquery/plugins/simpleTree/images/page_delete.png" /> </li>
</div>

<div id="wrap">
	<div id="annualWizard">	
			<ul  class="simpleTree" id='pdfTree'>		
					<li class="root" id='<?php echo $this->Accounts_tree_model->get_root_id();  ?>'><span><?php echo $this->Accounts_tree_model->get_root_name(); ?></span>
						<ul><?php echo $tree_elements; ?></ul>				
					</li>
			</ul>						
	</div>	
	
</div> 
<div id='processing'></div>

</form>
</div>

<div style="height:100px" align="center" >

<?php $this->load->view('includes/footer'); ?>