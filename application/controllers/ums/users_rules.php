<?
class Users_rules extends Controller 
{
	
	function Users_rules()
	{
		parent::Controller();
		
		//to use base url function in view.
		//$this->load->database();
		//$this->load->helper('url');		
		$this->load->model('ums/Users_rules_model','Users_rules_model',True);
		
		$this->lang->load('ums/users_rules',$this->config->item('language'));
		
		 $this->load->view('ums/users_rules/functions');
		
	}
	
	function index()
	{
		$this->load->view('ums/users_rules/view');
	}
	
	function popup()
	{
		$this->load->view('ums/users_rules/popup');
	}
	
	function go_form($mode,$id)
	{
		$data['users_rules_row'] = $this->Users_rules_model->get_by_id($id);
        
        $data['mode']= $mode;
			
		$this->load->view('ums/users_rules/form', $data);

	}
	/*
	function write_div_annualWizard_tree()
	{
		$tree_elements =$this->Users_rules_model->get_element_list(null);
		
		$inner_html="<ul  class='simpleTree' id='pdfTree'><li class='root' id='";
		$inner_html=$inner_html.$this->Users_rules_model->get_root_id();
		$inner_html=$inner_html. "'><span>";
		$inner_html=$inner_html. $this->Users_rules_model->get_root_name(); 
		$inner_html=$inner_html."</span><ul>";
		$inner_html=$inner_html.$tree_elements ;
		$inner_html	=$inner_html."</ul></li></ul>";
		
		
		echo $inner_html;
	}
	*/
	
	function out_tree($parent_id)
	{
  		$out = $this->Users_rules_model->get_element_list($parent_id);	
  		echo $out;
	}
	
	
	function out_tree_for_popup($parent_id)
	{
  		$out = $this->Users_rules_model->get_element_list_for_popup($parent_id);	
  		echo $out;
	}

	
	function insert($parent_id)
	{
	
		if ( ( isset($_POST['name']) === true && $_POST['name'] != NULL )  &&
		     ( isset($_POST['parent_id']) === true && $_POST['parent_id'] != NULL ) 	   
		   )
		{				
			$parent_id = checkVariable($_POST['parent_id']);
			$name = checkVariable($_POST['name']);			
		  
			$out = $treeManager->insert_element($name, $parent_id);						
		}
		else {
			$out = FAILED; 
		}
	}
	
	
	function submit_process($id)
	{
		//if(isset($_POST['btn_save']))
		//{
    			
				if($this->code_redundency($id))
				{
					$data['users_rules_row'] = array(
								'parent_id' => $_POST['hdn_parent_id'] ,
					
								'id' => $id ,
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
				               	'notes' => $_POST['txt_notes'],
				            );
				            
				            $duplicated_id=$this->Users_rules_model->get_id_by_code($_POST['txt_code']);
				            $data['error']= $this->lang->line('code_redundency_error')."<a  href='".base_url()."/ums/users_rules/go_form/view/$duplicated_id' >".$this->lang->line('click_here_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('ums/users_rules/form',$data);
				               	
				}
				else if($this->name_redundency($id))
				{
					$data['users_rules_row'] = array(
								'parent_id' => $_POST['hdn_parent_id'] ,
					
								'id' => $id ,
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
				               	'notes' => $_POST['txt_notes'],
				            );
				            
				         	$duplicated_id=$this->Users_rules_model->get_id_by_name($_POST['txt_name']);
				            $data['error']= $this->lang->line('name_redundency_error')."<a  href='".base_url()."ums/users_rules/go_form/view/$duplicated_id' >".$this->lang->line('click_here_link')."</a>";
				            
				            
				            $data['mode']= 'return';
							$this->load->view('ums/users_rules/form',$data);
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
							
							$this->Users_rules_model->insert($data);
							
							$id=$this->Users_rules_model->get_max_id();
							
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
							
								$this->Users_rules_model->update($id,$data);
						}
		
						redirect(base_url()."ums/users_rules/go_form/view/$id");
				}
		//}
		
	}
	
	
	function delete($id)
	{
		$this->delete_by_parent($id);
		$this->Users_rules_model->delete($id);
		$this->view_all();
	}
	
	function delete_by_parent($id)
	{
		
		
		$data['child_rules'] = $this->Users_rules_model->get_by_parent($id);
		foreach ($data['child_rules'] as $record)
		{
			foreach ($record as $key=>$value)
			{
						if($key=='id')
						{
							$this->Users_rules_model->delete($value);
							$this->delete_by_parent($value);
						}
			}
		}
	}
	
	
	function update_parent($source_id,$destination_id)
	{
			$data = array(
								'parent_id' => $destination_id ,
							   	'updated_at' =>$current_date,
				               	'update_user' => 1,
				            );
							
		$this->Users_rules_model->update($source_id,$data);
		
		$this->view_all();
	}
	
	function code_redundency($id)
	{
		$code = $_POST['txt_code'] ;
		$code_count=$this->Users_rules_model->get_count_by_code($id,$code);
		
			if($code_count>0)
			{
				return true;
			}		

			return false;
	}
	
	function name_redundency($id)
	{
		$name = $_POST['txt_name'] ;
		$name_count=$this->Users_rules_model->get_count_by_name($id,$name);
		
			if($name_count>0)
			{
				return true;
			}

			return false;
	}
	
	

	
}
