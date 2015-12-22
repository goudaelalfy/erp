<?php $this->lang->load('home/login',$this->config->item('language'));?>
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
    <title><?php echo $this->lang->line('login_title')?></title>
   
   <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
  
    
    
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/menu.js"></script>
</head>

<body>


<div class="header">

</div>

 
 
 
 
 
 
 
 
<div class="login">

<?php 
$this->load->helper('form');
$guiTools = new GuiTools();


//Adding Attributes.
$attributes = array('name' => 'frmLogin', 'id' => 'frmLogin');

//Adding Hidden Input Fields.
$hidden = array('username' => 'gouda', 'password' => 'gouda');


echo form_open('main/login', $attributes, $hidden);


$guiTools->beginTable();

$guiTools->beginRow();
$guiTools->cellLabel(100,'','',$this->lang->line('login_username'),'');
$guiTools->cellTextbox(100,'txtUserName', 'txtUserName');
$guiTools->cellLabel(100);
$guiTools->endRow();

$guiTools->beginRow();
$guiTools->cellLabel(100,'','',$this->lang->line('login_password'),'');
$guiTools->cellPassword(100,'txtPassword', 'txtPassword');
$guiTools->cellLabel(100);
$guiTools->endRow();

$guiTools->beginRow();
$guiTools->endRow();

$guiTools->beginRow();
$guiTools->cellLabel(100);
$guiTools->cellSubmit(100, 'smtLogin', 'smtLogin', $this->lang->line('login_smt'));
$guiTools->cellLabel(100);
$guiTools->endRow();

$guiTools->beginRow();
$guiTools->endRow();

$guiTools->beginRow();
$guiTools->cellLabel(100);
$guiTools->cellLabel(100,'2','',$this->lang->line('login_invalid'),'color:red');
$guiTools->endRow();


$guiTools->endTable();

form_close();



echo '<p>'.$this->lang->line('login_welcome_message').'</p>';

?>
</div>







<div class="footer">

<?php 
echo $this->lang->line('login_developed_by').' <a href="#">'.$this->lang->line('login_company_site_link').'</a>';
?>
</div>    
   
</body>
</html>