<?php
class Functions {
  

   public function __construct() {
     
   }

   
	public function display_data_table($array_of_data,$link_to_screen='',$object) 
	{

		
		echo "<table class='screen_display_table' >";
		$index=0;
		$color_row='';
		$height_row='';
		
		foreach ($array_of_data as $record)
		{
			
				$current_row_id=0;
				
				if($index==0)
				{
					echo "<tr>";
					foreach ($record as $key=>$value)
					{
						if($key=='id')
						{
							echo "<th style='width:30px;' > <input type='checkbox' name='chk_all' id='chk_all' onchange='checkUncheck_DisplayDataForm()' /> </th> ";
						}
						else if($key!='are_canceled')
						{
							echo"<th><img class='sort_images' src='".base_url()."/images/icons/sort_desc.png' width='15'; height='15' title='".$object->lang->line('btn_sort_desc')."'  onclick=\"sort('$link_to_screen/write_div_table_display_records/$key/desc');\"   onmouseover='this.cursor=hand;' />   &nbsp;".$object->lang->line($key)."  &nbsp; <img class='sort_images' src='".base_url()."/images/icons/sort_asc.png' width='15'; height='15' title='".$object->lang->line('btn_sort_asc')."'  onclick=\"sort('$link_to_screen/write_div_table_display_records/$key/asc');\"/></th>";
						}
					}
					
					echo"<th style='width:150px;'>".$object->lang->line('btn_manage_from_table')."</th>";
					echo "</tr>";
				}
				
				echo "<tr>";
				foreach ($record as $key=>$value)
				{
					if($index%2==1)
					{
						$color_row='#ECF0FC';
						$height_row='30px';
					}
					else 
					{
						$color_row='#FFFFFF';
						$height_row='25px';
					}

					if($key=='id')
					{
						echo "<td align='center' style='width:30px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_current_row[]' name='chk_current_row[]' value='$value' ></td>";
					
						$current_row_id=$value;
					}
					else if($key=='are_canceled')
					{
						if($value==0)
						{
							$what_will=1;
							$icon="cancel_for_table.png";
							$title=$object->lang->line('btn_cancel');
						}
						else
						{
							$what_will=0;
							$icon="uncancel_for_table.png";
							$title=$object->lang->line('btn_uncancel');
						}
						$cancel_link="<a href='$link_to_screen/cancel_uncancel/$current_row_id/$what_will/view' ><img src='".base_url()."/images/icons/$icon' width='15'; height='15'  title='".$title."' /></a>";
					}
					
					else if($key=='code' || $key=='name' )
					{
						if($key=='code')
						$width_row='150px';
						else 
						$width_row='300px';
						
						
						echo"<td align='center' style='width:$width_row; height:$height_row; background-color:$color_row;'> <a  href='$link_to_screen/go_form/$current_row_id/view' >$value</a>  </td>";	
					}			
					else 
					{
						$width_row='250px';
						echo"<td  align='center' style='width:$width_row; height:$height_row; background-color:$color_row;'> $value </td>";	
					}
				}
				
				echo"<td style='width:120px; height:$height_row; background-color:$color_row;'> <a href='$link_to_screen/go_form/$current_row_id/edit'>  &nbsp; &nbsp;&nbsp;  <img src='".base_url()."/images/icons/edit_for_table.gif' width='20'; height='20' title='".$object->lang->line('btn_edit')."'/></a>   &nbsp;  &nbsp; &nbsp;  $cancel_link  &nbsp; &nbsp; &nbsp; <a href='$link_to_screen/delete/$current_row_id'  onclick=\"return delete_confirm('".$object->config->item('language')."')\"><img src='".base_url()."/images/icons/delete_for_table.gif' width='15'; height='15'  title='".$object->lang->line('btn_delete')."' /></a> </td>";	
				echo "</tr>";
				
			$index=$index+1;
		}
		
		echo"</table>";

	}
	   
}