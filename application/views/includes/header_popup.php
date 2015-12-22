<?php $this->lang->load('includes/header_popup',$this->config->item('language'));?>
<?php $this->load->view('includes/gui_tools'); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 
if($this->config->item('language')=='english')
$dir='ltr';
elseif ($this->config->item('language')=='arabic')
$dir='rtl';
?>

<html xmlns="http://www.w3.org/1999/xhtml" dir=<?php echo $dir ?> >
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?php echo $this->lang->line('header_title')?></title>
   
   <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
    
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/menu.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/includes/functions.js"></script>
   

</head>

<body >



<div class="header_popup" >

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


 
<div class="center" >



<table class="center_table"><tr valign="top" ><td></td><td width="100%">



<div class="content_popup">