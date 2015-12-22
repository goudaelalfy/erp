<?
class Stocks extends Controller
{
   	
	function Stocks()
	{
		parent::Controller();
		
		$this->load->model('inventory/Stocks_model','Stocks_model',True);
		
		$this->lang->load('inventory/stocks',$this->config->item('language'));
		
		 $this->load->view('inventory/stocks/functions');
		
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
        $data['stocks'] = $this->Stocks_model->get_all_display($order, $order_type); 
        $this->load->view('inventory/stocks/view', $data);
	}
	
	function write_div_table_display_records($order=null, $order_type=null)
	{
		$data['stocks'] = $this->Stocks_model->get_all_display($order, $order_type);
		 
		$functions = new Functions();
		$link_to_screen=base_url().'inventory/stocks';
		return $functions->display_data_table($data['stocks'],$link_to_screen,$this);
	}
	
	function go_form($id, $mode)
	{
        if($id!=0)
        {
			$data['stocks_row'] = $this->Stocks_model->get_by_id($id);
        }
        $data['mode']= $mode;
        
		$this->load->view('inventory/stocks/form',$data);
	}
	
	function submit_process($id)
	{
		if(isset($_POST['btn_save']))
		{
    			
				if($this->code_redundency($id))
				{
					$data['stocks_row'] = array(
								'id' => $id ,
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
								'stock_manager' => $_POST['txt_stock_manager'] ,
				               	'address' => $_POST['txt_address'] ,
								'phone' => $_POST['txt_phone'] ,
				               	'mobile' => $_POST['txt_mobile'] ,
								'fax' => $_POST['txt_fax'] ,
				               	'email' => $_POST['txt_email'] ,
				               	'notes' => $_POST['txt_notes'],
				            );
				            
				            $duplicated_id=$this->Stocks_model->get_id_by_code($_POST['txt_code']);
				            $data['error']= $this->lang->line('code_redundency_error')."<a  href='".base_url()."/inventory/stocks/go_form/$duplicated_id/view' >".$this->lang->line('redundency_error_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('inventory/stocks/form',$data);
				               	
				}
				else if($this->name_redundency($id))
				{
					$data['stocks_row'] = array(
								'id' => $id ,
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
								'stock_manager' => $_POST['txt_stock_manager'] ,
				               	'address' => $_POST['txt_address'] ,
								'phone' => $_POST['txt_phone'] ,
				               	'mobile' => $_POST['txt_mobile'] ,
								'fax' => $_POST['txt_fax'] ,
				               	'email' => $_POST['txt_email'] ,
				               	'notes' => $_POST['txt_notes'],
				            );
				            
				         	$duplicated_id=$this->Stocks_model->get_id_by_name($_POST['txt_name']);
				            $data['error']= $this->lang->line('name_redundency_error')."<a  href='".base_url()."/inventory/stocks/go_form/$duplicated_id/view' >".$this->lang->line('redundency_error_link')."</a>";
				            
				            
				            $data['mode']= 'return';
							$this->load->view('inventory/stocks/form',$data);
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
								'stock_manager' => $_POST['txt_stock_manager'] ,
				               	'address' => $_POST['txt_address'] ,
								'phone' => $_POST['txt_phone'] ,
				               	'mobile' => $_POST['txt_mobile'] ,
								'fax' => $_POST['txt_fax'] ,
				               	'email' => $_POST['txt_email'] ,
				               	'notes' => $_POST['txt_notes'],
							  	'created_at' =>$current_date,
				               	'create_user' => 1,
				            );
							
							$this->Stocks_model->insert($data);
							
							$id=$this->Stocks_model->get_max_id();
							
						}
						else 
						{
							$data = array(
				               	'code' => $_POST['txt_code'] ,
				               	'name' => $_POST['txt_name'] ,
								'stock_manager' => $_POST['txt_stock_manager'] ,
				               	'address' => $_POST['txt_address'] ,
								'phone' => $_POST['txt_phone'] ,
				               	'mobile' => $_POST['txt_mobile'] ,
								'fax' => $_POST['txt_fax'] ,
				               	'email' => $_POST['txt_email'] ,
				               	'notes' => $_POST['txt_notes'],
							   	'updated_at' =>$current_date,
				               	'update_user' => 1,
				            );
							
								$this->Stocks_model->update($id,$data);
						}
		
						redirect(base_url()."inventory/stocks/go_form/$id/view");
				}
		}
		
	}
	
	function delete($id)
	{
		$this->Stocks_model->delete($id);
		
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
							
		$this->Stocks_model->update($id,$data);
		
		if($current_screen=='form')				
		{	
			redirect(base_url()."inventory/stocks/go_form/$id/view");
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
					$this->Stocks_model->delete($del_id);
				}
			}
			$this->view_all();
		}
		
	}
	
	
	function code_redundency($id)
	{
		$code = $_POST['txt_code'] ;
		$code_count=$this->Stocks_model->get_count_by_code($id,$code);
		
			if($code_count>0)
			{
				return true;
			}		

			return false;
	}
	
	function name_redundency($id)
	{
		$name = $_POST['txt_name'] ;
		$name_count=$this->Stocks_model->get_count_by_name($id,$name);
		
			if($name_count>0)
			{
				return true;
			}

			return false;
	}
	
}
?> 