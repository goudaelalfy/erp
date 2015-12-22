<?
class Users_groups extends Controller
{
   	
	function Users_groups()
	{
		parent::Controller();

		$this->load->model('ums/Users_groups_model','Users_groups_model',True);
		
		$this->lang->load('ums/users_groups',$this->config->item('language'));
		
		 $this->load->view('ums/users_groups/functions');
		
		//if(!$this->login->check_session())
		//{
		//	redirect('main/login');
		//}
	}
	
	function index()
	{
        $this->view_all();
	}
	
	function view_all($order=null, $order_type=null)
	{
		$data['users_groups'] = $this->Users_groups_model->get_all_display($order, $order_type); 
        $this->load->view('ums/users_groups/view', $data);
	}
	
	function write_div_table_display_records($order=null, $order_type=null)
	{
		$data['users_groups'] = $this->Users_groups_model->get_all_display($order, $order_type);
		 
		$functions = new Functions();
		$link_to_screen=base_url().'ums/users_groups';
		return $functions->display_data_table($data['users_groups'],$link_to_screen,$this);
	}
	
	
	function go_form($id, $mode)
	{
		$data['develop_screens'] = $this->Users_groups_model->get_screens_by_parent(0);  
        if($id!=0)
        {
			$data['users_groups_row'] = $this->Users_groups_model->get_by_id($id);
        }
        $data['mode']= $mode;
        
		$this->load->view('ums/users_groups/form',$data);
	}
	
	function submit_process($id)
	{
		if(isset($_POST['btn_save']))
		{
			
			$data['users_groups_row'] = $this->Users_groups_model->get_by_id($id);
			$updated_at=$data['users_groups_row']->updated_at;
			
			if($id!=0 && $_POST['hdn_updated_at']!=$updated_at)
			{
					$data['develop_screens'] = $this->Users_groups_model->get_screens_by_parent(0);  
					$data['users_groups_row'] = array(
								'id' => $id ,
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
				               	'notes' => $_POST['txt_notes'],
				            );
				                 
				            $data['error']= $this->lang->line('updated_by_another_user_error')."<a  href='".base_url()."/ums/users_groups/go_form/$id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('ums/users_groups/form',$data);
			}
			
			else if($this->code_redundency($id))
				{
					$data['develop_screens'] = $this->Users_groups_model->get_screens_by_parent(0);  
					$data['users_groups_row'] = array(
								'id' => $id ,
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
				               	'notes' => $_POST['txt_notes'],
				            );
				            
				            $duplicated_id=$this->Users_groups_model->get_id_by_code($_POST['txt_code']);
				            $data['error']= $this->lang->line('code_redundency_error')."<a  href='".base_url()."/ums/users_groups/go_form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('ums/users_groups/form',$data);
				               	
				}
				else if($this->name_redundency($id))
				{
					$data['develop_screens'] = $this->Users_groups_model->get_screens_by_parent(0);  
					$data['users_groups_row'] = array(
								'id' => $id ,
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
				               	'notes' => $_POST['txt_notes'],
				            );
				            
				         	$duplicated_id=$this->Users_groups_model->get_id_by_name($_POST['txt_name']);
				            $data['error']= $this->lang->line('name_redundency_error')."<a  href='".base_url()."/ums/users_groups/go_form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            
				            $data['mode']= 'return';
							$this->load->view('ums/users_groups/form',$data);
				}
				else 
				{
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");
						
					        
							if($id==0)
							{
								$data = array(
					               'code' => $_POST['txt_code'] ,
					               'name' => $_POST['txt_name'] ,
					               'notes' => $_POST['txt_notes'],
								   'created_at' =>$current_date,
					               'create_user' => 1,
					            );
								
								$this->Users_groups_model->insert($data);
					
								$id=$this->Users_groups_model->get_max_id();
								
								//$group_screens=$this->session->userdata('group_screens');
								$group_screens= $this->Users_groups_model->get_all_inner_screens();
								
								
								foreach ($group_screens as $record)
								{
									$view=0;
									$add=0;
									$edit=0;
									$delete=0;
									$cancel=0;
									
									if(isset($_POST['chk_'.$record->code.'_view']))
									{
										$view=1;
									}
									if(isset($_POST['chk_'.$record->code.'_add']))
									{
										$add=1;
									}
									if(isset($_POST['chk_'.$record->code.'_edit']))
									{
										$edit=1;
									}
									if(isset($_POST['chk_'.$record->code.'_delete']))
									{
										$delete=1;
									}
									if(isset($_POST['chk_'.$record->code.'_cancel']))
									{
										$cancel=1;
									}
									
									$data_details = array(
					               'user_group_id' => $id ,
					               'screen_code' => $record->code ,
					               'view' => $view,
					               'add' => $add,
								   'edit' => $edit,
					               'delete' => $delete,
								   'cancel' => $cancel,
					            );
									
					            $this->Users_groups_model->insert_details($data_details);
					            
								}
							}
							else 
							{
								$data = array(
					               'code' => $_POST['txt_code'] ,
					               'name' => $_POST['txt_name'] ,
					               'notes' => $_POST['txt_notes'],
								   'updated_at' =>$current_date,
					               'update_user' => 1,
					            );
								
									$this->Users_groups_model->update($id,$data);
									
									$group_screens= $this->Users_groups_model->get_all_inner_screens();
									
									
									foreach ($group_screens as $record)
									{
										$view=0;
										$add=0;
										$edit=0;
										$delete=0;
										$cancel=0;
										if(isset($_POST['chk_'.$record->code.'_view']))
										{
											$view=1;
										}
										if(isset($_POST['chk_'.$record->code.'_add']))
										{
											$add=1;
										}
										if(isset($_POST['chk_'.$record->code.'_edit']))
										{
											$edit=1;
										}
										if(isset($_POST['chk_'.$record->code.'_delete']))
										{
											$delete=1;
										}
										if(isset($_POST['chk_'.$record->code.'_cancel']))
										{
											$cancel=1;
										}
										
										$data_details = array(
						               'view' => $view,
						               'add' => $add,
									   'edit' => $edit,
						               'delete' => $delete,
									   'cancel' => $cancel,
							            );
							            
							            $this->Users_groups_model->update_details($id, $record->code,$data_details);
						            
									}
								
							}
								redirect(base_url()."ums/users_groups/go_form/$id/view");
				}
		}
		
	}
	
	function delete($id)
	{
		$this->Users_groups_model->delete($id);
		$this->Users_groups_model->delete_details($id);
		
		$this->view_all();
	}

	
	function cancel_uncancel($id,$are_canceled,$current_screen)
	{
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
	
		$data = array(
		'are_canceled' => $are_canceled,
		'canceled_at' =>$current_date,
		'cancel_user' => 1,
		);
							
		$this->Users_groups_model->update($id,$data);
		
		if($current_screen=='form')				
		{	
			redirect(base_url()."ums/users_groups/go_form/$id/view");
		}
		else 
		{
			$this->view_all();
		}
	}
	
	
	function submit_display()
	{
		//if(isset($_POST['lnk_delete']))
		{
			if(isset($_POST['chk_current_row']))
			{
				$del=$_POST['chk_current_row'];
		    
				foreach($del as $del_id)
				{
					$this->Users_groups_model->delete($del_id);
					$this->Users_groups_model->delete_details($del_id);
				}
			}			
			$this->view_all();
		}
	}
	
	function code_redundency($id)
	{
		$code = $_POST['txt_code'] ;
		$code_count=$this->Users_groups_model->get_count_by_code($id,$code);
		
			if($code_count>0)
			{
				return true;
			}		

			return false;
	}
	
	function name_redundency($id)
	{
		$name = $_POST['txt_name'] ;
		$name_count=$this->Users_groups_model->get_count_by_name($id,$name);
		
			if($name_count>0)
			{
				return true;
			}

			return false;
	}
	
}
?> 