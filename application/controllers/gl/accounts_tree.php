<?
class Accounts_tree extends Controller 
{
	
	function Accounts_tree()
	{
		parent::Controller();
		
		//to use base url function in view.
		//$this->load->database();
		//$this->load->helper('url');		
		$this->load->model('gl/Accounts_tree_model','Accounts_tree_model',True);
		
		$this->lang->load('gl/accounts_tree',$this->config->item('language'));
		
		 $this->load->view('gl/accounts_tree/functions');
		
	}
	
	function index()
	{
		$this->load->view('gl/accounts_tree/view');
	}
	
	function go_form($mode,$id)
	{
		$data['accounts_tree_row'] = $this->Accounts_tree_model->get_by_id($id);
        
        $data['mode']= $mode;
			
		$this->load->view('gl/accounts_tree/form', $data);

	}
	
	function out_tree($parent_id)
	{
  		$out = $this->Accounts_tree_model->get_element_list($parent_id);	
  		echo $out;
	}
	
	
	
	
	
	
	function insert($parent_id)
	{
	
		if ( ( isset($_POST['name']) === true && $_POST['name'] != NULL )  &&
		     ( isset($_POST['parent_id']) === true && $_POST['parent_id'] != NULL )  &&
	         ( isset($_POST['slave']) === true && $_POST['slave'] != NULL )		   
		   )
		{				
			$parent_id = checkVariable($_POST['parent_id']);
			$slave = (int) checkVariable($_POST['slave']);
			$name = checkVariable($_POST['name']);			
		  
			$out = $treeManager->insert_element($name, $parent_id, $slave);						
		}
		else {
			$out = FAILED; 
		}
	}
	
	
	function submit_process($id)
	{
		if(isset($_POST['btn_save']))
		{
    			
				if($this->code_redundency($id))
				{
					$data['accounts_tree_row'] = array(
								'parent_id' => $_POST['hdn_parent_id'] ,
					
								'id' => $id ,
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
				               	'notes' => $_POST['txt_notes'],
				            );
				            
				            $duplicated_id=$this->Accounts_tree_model->get_id_by_code($_POST['txt_code']);
				            $data['error']= $this->lang->line('code_redundency_error')."<a  href='".base_url()."/gl/accounts_tree/go_form/$duplicated_id/view' >".$this->lang->line('redundency_error_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('gl/accounts_tree/form',$data);
				               	
				}
				else if($this->name_redundency($id))
				{
					$data['accounts_tree_row'] = array(
								'parent_id' => $_POST['hdn_parent_id'] ,
					
								'id' => $id ,
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
				               	'notes' => $_POST['txt_notes'],
				            );
				            
				         	$duplicated_id=$this->Accounts_tree_model->get_id_by_name($_POST['txt_name']);
				            $data['error']= $this->lang->line('name_redundency_error')."<a  href='".base_url()."gl/accounts_tree/go_form/$duplicated_id/view' >".$this->lang->line('redundency_error_link')."</a>";
				            
				            
				            $data['mode']= 'return';
							$this->load->view('gl/accounts_tree/form',$data);
				}
				else 
				{
		    			$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");
							
		    			
						if($id==0)
						{
							$data = array(
								'parent_id' => $_POST['hdn_parent_id'] ,
				               	
								'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
				               	'notes' => $_POST['txt_notes'],
							  	'created_at' =>$current_date,
				               	'create_user' => 1,
				            );
							
							$this->Accounts_tree_model->insert($data);
							
							$id=$this->Accounts_tree_model->get_max_id();
							
						}
						else 
						{
							$data = array(
								'parent_id' => $_POST['hdn_parent_id'] ,
							
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
				               	'notes' => $_POST['txt_notes'],
							   	'updated_at' =>$current_date,
				               	'update_user' => 1,
				            );
							
								$this->Accounts_tree_model->update($id,$data);
						}
		
						redirect(base_url()."gl/accounts_tree/go_form/view/$id");
				}
		}
		
	}
	
	function delete($id)
	{
		$this->Accounts_tree_model->delete($id);
		
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
							
		$this->Accounts_tree_model->update($id,$data);
		
		if($current_screen=='form')				
		{	
			redirect(base_url()."inventory/stocks/go_form/$id/view");
		}
		else 
		{
			$this->view_all();
		}
	}
	
	
	
	function code_redundency($id)
	{
		$code = $_POST['txt_code'] ;
		$code_count=$this->Accounts_tree_model->get_count_by_code($id,$code);
		
			if($code_count>0)
			{
				return true;
			}		

			return false;
	}
	
	function name_redundency($id)
	{
		$name = $_POST['txt_name'] ;
		$name_count=$this->Accounts_tree_model->get_count_by_name($id,$name);
		
			if($name_count>0)
			{
				return true;
			}

			return false;
	}
	
	

	
}
