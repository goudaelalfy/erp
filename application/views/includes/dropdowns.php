<?php 
$this->load->model('ums/users_groups_model'); 
$this->load->model('ums/users_rules_model');
?>

<?php
class Dropdowns {
  
	private $lbl_style;
	private $drpdwn_style;
	   	
   public function __construct() {
   	
		$this->lbl_style="color: #142044; font-family:tahoma; font-size: 12px;";
		$this->drpdwn_style='color:#8B4513; font-family:tahoma; font-size: 11px; width:300px;';
   }
  
   
   
   	//////////////////////////////////////////////////  UMS  //////////////////////////////////////////////////
	
   public function tr_drpdwn_user_group($lbl_txt,$selected_id=0) 
   	{ 
   		
   		
   		$tr_drpdwn="<tr height='20px'>";
   		
   		$tr_drpdwn=$tr_drpdwn."<td width='120px' ><label style='".$this->lbl_style."'>$lbl_txt<span style='color:red'> *</span></label></td>";	
     	
   		$tr_drpdwn=$tr_drpdwn."<td width='200px' ><select name='drpdwn_user_group' id='drpdwn_user_group' style='".$this->drpdwn_style."' >";
     	$tr_drpdwn=$tr_drpdwn."<option value='0'></option>";
      	
     	$users_groups_model=new Users_groups_model();
     	$arr=$users_groups_model->get_all_display_active(); 
     	foreach ($arr as $record) 
      	{ 
      		$are_selected="";
      		if($selected_id==$record->id)
      		{
      			$are_selected="selected='selected'";
      		}
      		
      	  $tr_drpdwn=$tr_drpdwn."<option value='". $record->id."' $are_selected>".$record->name."</option>";
      	} 
     	$tr_drpdwn=$tr_drpdwn."</select></td>";
     	
     	$tr_drpdwn=$tr_drpdwn."</tr>";
     	
     	echo $tr_drpdwn;
   	}
   	
	public function tr_drpdwn_user_rule($lbl_txt) 
   	{ 
   		$tr_drpdwn="<tr height='20px'>";
   		
   		$tr_drpdwn=$tr_drpdwn."<td width='120px' ><label style='".$this->lbl_style."'>$lbl_txt</label></td>";	
     	
   		$tr_drpdwn=$tr_drpdwn."<td width='200px' ><select name='drpdwn_user_rule' id='drpdwn_user_rule' style='".$this->drpdwn_style."' >";
     	$tr_drpdwn=$tr_drpdwn."<option value='0'></option>";
      	
     	$users_rules_model=new Users_rules_model();
     	$arr=$users_rules_model->get_all_display_active(); 
     	foreach ($arr as $record) 
      	{ 
      	  $tr_drpdwn=$tr_drpdwn."<option value='". $record->id."'>".$record->name."</option>";
      	} 
     	$tr_drpdwn=$tr_drpdwn."</select></td>";
     	
     	$tr_drpdwn=$tr_drpdwn."</tr>";
     	
     	echo $tr_drpdwn;
   	}
   	

   	
   	
   
}