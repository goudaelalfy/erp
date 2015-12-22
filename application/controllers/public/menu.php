<?
class Menu extends Controller
{
   	
	function Menu()
	{
		parent::Controller();
	}
	
	function set_menu_session($current_menu)
	{
        $this->session->set_userdata('current_menu', $current_menu);
	}	
}
?> 