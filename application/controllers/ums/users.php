<?
class Users extends Controller
{
   	
	function Users()
	{
		parent::Controller();

		$this->load->model('ums/Users_model','Users_model',True);
		
		$this->lang->load('ums/users',$this->config->item('language'));
		
		 $this->load->view('ums/users/functions');
		
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
		$data['users'] = $this->Users_model->get_all_display($order, $order_type); 
        $this->load->view('ums/users/view', $data);
	}
	
	function write_div_table_display_records($order=null, $order_type=null)
	{
		$data['users'] = $this->Users_model->get_all_display($order, $order_type);
		 
		$functions = new Functions();
		$link_to_screen=base_url().'ums/users';
		return $functions->display_data_table($data['users'],$link_to_screen,$this);
	}
	
	
	function go_form($id, $mode)
	{ 
        if($id!=0)
        {
			$data['users_row'] = $this->Users_model->get_by_id($id);
        }
        $data['mode']= $mode;
        
		$this->load->view('ums/users/form',$data);
	}
	
	function submit_process($id)
	{
		if(isset($_POST['btn_save']))
		{
			
			$data['users_row'] = $this->Users_model->get_by_id($id);
			$updated_at=$data['users_row']->updated_at;
			
			if($id!=0 && $_POST['hdn_updated_at']!=$updated_at)
			{ 
					$data['users_row'] = array(
								'id' => $id ,
				               	'username' => $_POST['txt_username'] ,
				               	'password' => $_POST['txt_password'] ,
				               	'name' => $_POST['txt_name'],
								'mobile' => $_POST['txt_mobile'] ,
				               	'telephone' => $_POST['txt_telephone'] ,
				               	'email' => $_POST['txt_email'],
								'address' => $_POST['txt_address'] ,
				               	'notes' => $_POST['txt_notes'] ,
				               	'user_group_id' => $_POST['drpdwn_user_group'],
								'user_rule_id' => $_POST['hdn_user_rule'] ,
				            );
				                 
				            $data['error']= $this->lang->line('updated_by_another_user_error')."<a  href='".base_url()."/ums/users/go_form/$id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('ums/users/form',$data);
			}
			
				else if($this->username_redundency($id))
				{
					
					$data['users_row'] = array(
								'id' => $id ,
				               	'username' => $_POST['txt_username'] ,
				               	'password' => $_POST['txt_password'] ,
				               	'name' => $_POST['txt_name'],
								'mobile' => $_POST['txt_mobile'] ,
				               	'telephone' => $_POST['txt_telephone'] ,
				               	'email' => $_POST['txt_email'],
								'address' => $_POST['txt_address'] ,
				               	'notes' => $_POST['txt_notes'] ,
				               	'user_group_id' => $_POST['drpdwn_user_group'],
								'user_rule_id' => $_POST['hdn_user_rule'] ,
				            );
				            
				         	$duplicated_id=$this->Users_model->get_id_by_username($_POST['txt_username']);
				            $data['error']= $this->lang->line('username_redundency_error')."<a  href='".base_url()."/ums/users/go_form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            
				            $data['mode']= 'return';
							$this->load->view('ums/users/form',$data);
				}
				else 
				{
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");
						
					        
							if($id==0)
							{
								$data = array(
					              	'username' => $_POST['txt_username'] ,
					               	'password' => $_POST['txt_password'] ,
					               	'name' => $_POST['txt_name'],
									'mobile' => $_POST['txt_mobile'] ,
					               	'telephone' => $_POST['txt_telephone'] ,
					               	'email' => $_POST['txt_email'],
									'address' => $_POST['txt_address'] ,
					               	'notes' => $_POST['txt_notes'] ,
					               	'user_group_id' => $_POST['drpdwn_user_group'],
									'user_rule_id' => $_POST['hdn_user_rule'] ,
								   	'created_at' =>$current_date,
					               	'create_user' => 1,
					            );
								
								$this->Users_model->insert($data);
								
								$id=$this->Users_model->get_max_id();
																
							}
							else 
							{
								$data = array(
					              	'username' => $_POST['txt_username'] ,
					               	'password' => $_POST['txt_password'] ,
					               	'name' => $_POST['txt_name'],
									'mobile' => $_POST['txt_mobile'] ,
					               	'telephone' => $_POST['txt_telephone'] ,
					               	'email' => $_POST['txt_email'],
									'address' => $_POST['txt_address'] ,
					               	'notes' => $_POST['txt_notes'] ,
					               	'user_group_id' => $_POST['drpdwn_user_group'],
									'user_rule_id' => $_POST['hdn_user_rule'] ,
								   	'updated_at' =>$current_date,
					               	'update_user' => 1,
					            );
								
									$this->Users_model->update($id,$data);
									
								
							}
								redirect(base_url()."ums/users/go_form/$id/view");
				}
		}
		
	}
	
	function delete($id)
	{
		$this->Users_model->delete($id);		
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
							
		$this->Users_model->update($id,$data);
		
		if($current_screen=='form')				
		{	
			redirect(base_url()."ums/users/go_form/$id/view");
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
					$this->Users_model->delete($del_id);
				}
			}			
			$this->view_all();
		}
	}
	
	
	function username_redundency($id)
	{
		$username = $_POST['txt_username'] ;
		$username_count=$this->Users_model->get_count_by_username($id,$username);
		
			if($username_count>0)
			{
				return true;
			}

			return false;
	}
	
}
?> 