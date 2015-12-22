<?php
class GuiTools {
  

   public function __construct() {
     
   }

   
	public function beginDiv($style='') 
   {
     echo"<Div style='$style' >";
   }
	public function endDiv() 
   {
     echo"</Div>";
   }
   
	public function newLine() 
   {
     echo"<br>";
   }
   
   
   public function beginTable($style='') 
   {
     echo"<table style='$style' >";
   }
   
	public function endTable() 
   {
     echo"</table>";
   }
   
 	public function beginRow($trHeight='20px') 
   {
     echo"<tr height='$trHeight'>";
   }
   
	public function endRow() 
   {
     echo"</tr>";
   }
   

   
   public function cellLabel($tdWidth, $text, $id='',$name='',$tdcolspan='',$labelstyle='') 
   {
     echo"<td width='$tdWidth' colspan='$tdcolspan' ><label  id='$id' name='$name' style='$labelstyle' >$text</label></td>";
   }
   
   public function cellLabelTitle($tdWidth, $text) 
   {
     echo"<td width='$tdWidth' ><label style='color: #142044; font-family:tahoma; font-size: 12px;' >$text</label></td>";
   }
   public function cellLabelTitle_Required($tdWidth, $text) 
   {
     echo"<td width='$tdWidth' ><label style='color: #142044; font-family:tahoma; font-size: 12px;' >$text<span style='color:red'> *</span></label></td>";
   }
   
   public function cellLabelValue($tdWidth, $text) 
   {
     echo"<td width='$tdWidth' ><label style='color:#8B4513; font-family:tahoma; font-size: 11px;' >$text</label></td>";
   }
   
   
   public function cellTextbox($tdWidth,$txtSize, $txtLength, $txtId,$txtName,$txtValue, $string_added='') 
   {
     echo"<td width='$tdWidth'><input type='text' size='$txtSize' maxlength='$txtLength' id='$txtId' name='$txtName' value='$txtValue' $string_added style='color:#8B4513; font-family:tahoma; font-size: 11px;'/></td>";
   }
   
   public function cellTextarea($tdWidth, $txtareaId,$txtareaName, $txtareaRows, $txtareaCols, $txtareaValue, $string_added='') 
   {
     echo"<td width='$tdWidth'><textarea rows='$txtareaRows' cols='$txtareaCols' id='$txtareaId' name='$txtareaName' $string_added style='color:#8B4513; font-family:tahoma; font-size: 11px;'>$txtareaValue</textarea> </td>";
   }
   
   
   //Note 	You must edit these params to be default or reduce them.
   	public function dropdown($dropdownId, $dropdownName, $arr_data,$value_field, $display_field, $selected_value='', $string_added='') 
   { 
     $dropdown_cell="<select name='$dropdownName' id='$dropdownId'> <option value='0'></option>";
     
      foreach ($arr_data as $record) 
      { 
        $dropdown_cell=$dropdown_cell."<option value='". $record->$value_field."'>".$record->$display_field."</option>";
      } 
                            
     $dropdown_cell=$dropdown_cell."</select>";
     
     echo $dropdown_cell;
   }
   
   
	public function cellPassword($tdWidth,$pwSize, $pwLength, $pwId,$pwName , $string_added) 
   {
     echo"<td width='$tdWidth'><input type='password' size='$pwSize' maxlength='$pwLength' id='$pwId' name='$pwName' $string_added /></td>";
   }
   
  	public function cellHidden($hdnId, $hdnName, $hdnValue) 
   {
     echo"<td ><input type='hidden' id='$hdnId' name='$hdnName' value='$hdnValue' /></td>";
   }
   
   
	public function cellSubmit($tdWidth,$id,$name,$value) 
   {
     echo"<td width='$tdWidth'><input type='submit' id='$id' name='$name' value='$value' /></td>";
   }
   
}