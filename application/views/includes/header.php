<?php $this->lang->load('includes/header',$this->config->item('language'));?>

<?php $this->load->view('includes/dropdowns'); ?>
<?php $this->load->view('includes/popups'); ?>

<?php $this->load->view('includes/gui_tools'); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 
if($this->config->item('language')=='english')
$dir='ltr';
elseif ($this->config->item('language')=='arabic')
$dir='rtl';
?>

<html xmlns="http://www.w3.org/1999/xhtml" dir='<?php echo $dir ?>'  >
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">


    <title><?php echo $this->lang->line('header_title')?></title>
   
   <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
    
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/menu.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/includes/functions.js"></script>
   

</head>

<body >


<!-- Commented To Display Error Of PHP 
<div class="header" >

<div>
<table width="100%">
<tr>
<td  width="25%"></td>
<td  width="25%"></td>
<td  width="25%"></td>
<td  width="25%" align="center"><img src="<?php echo base_url();?>/images/logos/triple_logo.jpg"/></td>
</tr>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>


</div>

</div>

-->




<?php
if($this->session->userdata('current_menu')!=null)
{ 
	$current_menu='#'.$this->session->userdata('current_menu');
}
else 
{
	$current_menu='#p_pr';
}
?>

<script type="text/javascript"> 
$(document).ready(function()
{
	$('<?php echo $current_menu; ?>').css({backgroundImage:"url(down.png)"}).next("div.menu_body").slideToggle(400).siblings("div.menu_body").slideUp("slow");
 	$('<?php echo $current_menu; ?>').siblings().css({backgroundImage:"url(left.png)"});
});
</script>
 
<div class="center" >



<table class="center_table"><tr valign="top" ><td>
 	<div class="left" id="firstpane" > 

		<p class="menu_head" id="p_pr"><img src="<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_pr_img')?>"  id="img_menu_pr" onmouseover="document.getElementById('img_menu_pr').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_pr_over_img')?>';" onmouseout="document.getElementById('img_menu_pr').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_pr_img'); ?>';"  onclick="set_menu('<?php echo base_url().'public/menu/set_menu_session/p_pr' ?>');" /></p>
		<div class="menu_body" id="div_pr">
		<a href="#"><?php echo 'Accounts Tree';?></a>
         <a href="<?php echo base_url();?>gl/accounts_types"><?php echo 'Accounts Types';?></a>
         <a href="#"><?php echo 'Currencies';?></a>	
		</div>		
		
		<p class="menu_head" id="p_inventory"><img src="<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_inventory_img')?>"  id="img_menu_inventory" onmouseover="document.getElementById('img_menu_inventory').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_inventory_over_img')?>';" onmouseout="document.getElementById('img_menu_inventory').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_inventory_img'); ?>';" onclick="set_menu('<?php echo base_url().'public/menu/set_menu_session/p_inventory' ?>');" /></p>
		<div class="menu_body" id="div_inventory">
		<a href="<?php echo base_url();?>inventory/stocks"><?php echo $this->lang->line('header_main_menu_inventory_stocks');?></a>
		</div>
		
		<p class="menu_head" id="p_sales"><img src="<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_sales_img')?>"  id="img_menu_sales" onmouseover="document.getElementById('img_menu_sales').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_sales_over_img')?>';" onmouseout="document.getElementById('img_menu_sales').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_sales_img') ; ?>';"  onclick="set_menu('<?php echo base_url().'public/menu/set_menu_session/p_sales' ?>');" /></p>
		<div class="menu_body" id="div_sales">
		<a href="#"><?php echo 'Accounts Tree';?></a>
         <a href="<?php echo base_url();?>gl/accounts_types"><?php echo 'Accounts Types';?></a>
         <a href="#"><?php echo 'Currencies';?></a>	
		</div>
		
		<p class="menu_head" id="p_gl"><img src="<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_gl_img')?>"  id="img_menu_gl" onmouseover="document.getElementById('img_menu_gl').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_gl_over_img')?>';" onmouseout="document.getElementById('img_menu_gl').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_gl_img'); ?>';"  onclick="set_menu('<?php echo base_url().'public/menu/set_menu_session/p_gl' ?>');" /></p>
		<div class="menu_body" id="div_gl">
		<a href="<?php echo base_url();?>gl/accounts_tree"><?php echo $this->lang->line('header_main_menu_gl_accounts_tree')?></a>
         <a href="<?php echo base_url();?>gl/accounts_types"><?php echo 'Accounts Types';?></a>
         <a href="#"><?php echo 'Currencies';?></a>	
		</div>
		
		<p class="menu_head" id="p_manufacturing"><img src="<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_manufacturing_img')?>"  id="img_menu_manufacturing" onmouseover="document.getElementById('img_menu_manufacturing').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_manufacturing_over_img')?>';" onmouseout="document.getElementById('img_menu_manufacturing').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_manufacturing_img'); ?>';"  onclick="set_menu('<?php echo base_url().'public/menu/set_menu_session/p_manufacturing' ?>');" /></p>
		<div class="menu_body" id="div_manufacturing">
		<a href="#"><?php echo 'Accounts Tree';?></a>
         <a href="<?php echo base_url();?>gl/accounts_types"><?php echo 'Accounts Types';?></a>
         <a href="#"><?php echo 'Currencies';?></a>	
		</div>
		
		<p class="menu_head" id="p_dimensions"><img src="<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_dimensions_img')?>"  id="img_menu_dimensions" onmouseover="document.getElementById('img_menu_dimensions').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_dimensions_over_img')?>';" onmouseout="document.getElementById('img_menu_dimensions').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_dimensions_img'); ?>';"  onclick="set_menu('<?php echo base_url().'public/menu/set_menu_session/p_dimensions' ?>');" /></p>
		<div class="menu_body" id="div_dimensions">
		<a href="#"><?php echo 'Accounts Tree';?></a>
        <a href="<?php echo base_url();?>gl/accounts_types"><?php echo 'Accounts Types';?></a>
        <a href="<?php echo base_url();?>gl/accounts_types"><?php echo 'Currencies';?></a>	
		</div>

		<p class="menu_head" id="p_settings"><img src="<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_settings_img')?>"  id="img_menu_settings" onmouseover="document.getElementById('img_menu_settings').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_settings_over_img')?>';" onmouseout="document.getElementById('img_menu_settings').src = '<?php echo base_url();?>/images/menu/<?php echo $this->lang->line('header_main_menu_settings_img'); ?>';"  onclick="set_menu('<?php echo base_url().'public/menu/set_menu_session/p_settings' ?>');" /></p>
		<div class="menu_body" id="div_settings">
        <a href="<?php echo base_url();?>ums/users_groups">	<?php echo $this->lang->line('header_main_menu_ums_users_groups')?></a>
        <a href="<?php echo base_url();?>ums/users_rules">		<?php echo $this->lang->line('header_main_menu_ums_users_rules')?></a>	
        <a href="<?php echo base_url();?>ums/users">		<?php echo $this->lang->line('header_main_menu_ums_users')?></a>	
		<a href="<?php echo base_url();?>ums/screens_access">		<?php echo $this->lang->line('header_main_menu_ums_screens_access')?></a>	
		
		</div>

		<br></br>
		<br></br>
		<br></br>
		<br></br>
		


</div>



</td><td width="100%">



<div class="content">