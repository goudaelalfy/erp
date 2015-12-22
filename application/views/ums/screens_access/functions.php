<?php
class Functions {
  

   public function __construct() {
     
   }

   
	public function display_data_table($array_of_data,$link_to_screen='',$object) 
	{
		
		$current_language=$object->config->item('language');
		
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

							echo"<th  >". $object->lang->line('develop_screens')."</th>";
							echo"<th  >". $object->lang->line('access_level')."</th>";
							
					echo "</tr>";
				}
				
				
				
				$screen_id=$record->id;
				$screen_code=$record->code;
				
				if($current_language=='english')
				{
					$screen_name=$record->name_en;
				}
				else if($current_language=='arabic')
				{
					$screen_name=$record->name_ar;
				}
					echo "<tr>";
					echo "<td colspan='3' align='center'> $screen_name </td>";	
					echo "</tr>";
					
					
				//if($mode=='add' || ($mode=='return' && $id==0) )
				//{
		
					$data['develop_screens_inner'] = $object->Screens_access_model->get_screens_by_parent($screen_id);
					$develop_screens_inner=$data['develop_screens_inner'];
					
					//$object->session->set_userdata('group_screens', $develop_screens_inner);
					
					foreach ($develop_screens_inner as $record_inner)
					{
						
						$screen_code=$record_inner->code;
						
						if($current_language=='english')
						{
							$screen_name=$record_inner->name_en;
						}
						else if($current_language=='arabic')
						{
							$screen_name=$record_inner->name_ar;
						}
						
						
							echo "<tr>";
						
						
							//$color_row='#C2D1E0';
							$color_row='#FFFFFF';
							$height_row='25px';
							
		
							$arr_data = $object->Screens_access_model->get_screens_access();
							$value_field='id';
							if($current_language=='english')
							{
								$display_field='name_en';
							}
							else if($current_language=='arabic')
							{
								$display_field='name_ar';
							}
							
							
							$guiTools = new GuiTools();
							
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'> $screen_name </td>";	
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'>";
							$guiTools->dropdown('dropdown_screen_access', 'dropdown_screen_access', $arr_data, $value_field, $display_field) ;
							echo "</td>";
							
							
							
							echo "</tr>";
						}
					
					$index=$index+1;
				//}
		}
		
		echo"</table>";


	}
	
	
	
	   
}
