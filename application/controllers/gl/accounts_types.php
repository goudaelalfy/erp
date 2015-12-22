<?
class Accounts_types extends Controller 
{
	
	function Accounts_types()
	{
		parent::Controller();
		
		//to use base url function in view.
		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('gl/Accounts_types_model');
	}
	
	function index()
	{
		$data['query'] = $this->Accounts_types_model->get_all();
 		
		$this->load->view('gl/accounts_types',$data);
	}
}
