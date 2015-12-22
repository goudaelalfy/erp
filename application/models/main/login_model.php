<?php
class Login_model extends Model
{
		function Login_model()
		{
			parent::Model();
			//$this->load->library('session');
		}
		
		function checkAuth($uName,$pass)
		{
			$this->db->select('*');
			$this->db->where('username',$uName);
			$this->db->where('password',md5($pass));
			//$this->db->where('enabled',1);
			
			$query = $this->db->get(ums_users);
			//echo $this->db->last_query();
			if($query->num_rows()>0)
			{
				$data = $query->row_array();
				$sessionArray = array( 'uid'=>$data['ID'],
				'role'=>$data['your_group'],
				'name'=>$data['firstname'].' '.$data['surname'],
				'logged_in'=>TRUE
				);
				
				$this->session->set_userdata($sessionArray);
				$log=array('user_id'=>$this->session->userdata('uid'),
				'action_type'=>'LOGIN',
				'item_type'=>'USER',
				'time'=>time());
				//echo $this->db->last_query();
				$this->log_message($log);
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		
		public function check_session()
		{
			if ($this->session->userdata('uid') AND $this->session->userdata('logged_in')=='TRUE') 
			{
				return TRUE;
			} 
			else 
			{
				return FALSE;
			}
		}
		
		public function logout()
		{
		
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('logged_in');
			session_destroy();
			$log=array('user_id'=>$this->session->userdata('uid'),
			'action_type'=>'LOGOUT',
			'item_type'=>'USER',
			'time'=>time());
			$this->log_message($log);
		}
		
		public function log_message($logArray)
		{
			if(isset($logArray))
			{
				$this->db->insert('your_log',$logArray);
			}
		}
}
?>