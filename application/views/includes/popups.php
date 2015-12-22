<?php 
$this->load->model('ums/users_groups_model'); 
$this->load->model('ums/users_rules_model');
?>

<?php
class Popups {
  
	private $lbl_style;
	   	
   public function __construct() {
   	
		$this->lbl_style="color: #142044; font-family:tahoma; font-size: 12px;";
  }
  
   
   
   	//////////////////////////////////////////////////  UMS  //////////////////////////////////////////////////
   	
	public function tr_popup_user_rule($lbl_txt,$selected_id=0,$selected_name='') 
   	{ 
   		$tr_popup="<tr height='20px'>";
   		
   		$tr_popup=$tr_popup."<td width='120px' ><label style='".$this->lbl_style."'>$lbl_txt<span style='color:red'> *</span></label></td>";	
     	
   		$tr_popup=$tr_popup."<td width='200px' >
   		<input type='hidden' id='hdn_user_rule' name='hdn_user_rule' value='$selected_id'/>
   		<input type='text' size='40'  id='txt_user_rule' name='txt_user_rule' value='$selected_name' readonly='readonly'  style='color:#8B4513; font-family:tahoma; font-size: 11px;'/>
   		<input type='button' id='btn_user_rule' name='btn_user_rule' value='...' onclick=\"window.open('../../../users_rules/popup','Select Users Rule','width=600px,height=450px,toolbar=no,sizeable=0,  directories=no,status=yes,menubar=no,scrollbars=yes,copyhistory=yes');\" />
   		</td>";
     	
     	$tr_popup=$tr_popup."</tr>";
     	
     	echo $tr_popup;
   	}
   	
   	
   
}