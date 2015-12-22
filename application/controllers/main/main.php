<?
class Main extends Controller

{
	function Main()
	{
		parent::Controller();
		
		//$this->load->helper('url');
		//$this->load->library('session');
		
		
		//load login_model class 'file must name login_model' then rename object 'login'.
		$this->load->model('main/login_model','login',True);

		/* check whether login or not */
		if(!$this->login->check_session())
		{
			redirect('main/login');
		}
	}
	
	function index()
	{
		$this->load->view('main/main');
	}
}
?> 