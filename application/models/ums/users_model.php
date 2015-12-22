<?php
class Users_model extends Model
{
   	
		function Users_model()
		{
			parent::Model();
		}
		
		
	 	function insert($data)
	    {
	       return $this->db->insert('ums_users', $data);
	    }

	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('ums_users', $data); 
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("ums_users");
	    }
	    
		function get_all()
	    {
	    	$this->db->select('`id`,`username`,`password`,`name`,`mobile`,`telephone`,`email`,`address`,`notes`,`user_group_id`,`user_rule_id`');
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('ums_users');
        	return $query->result();
	    }
	    
		function get_all_active()
	    {
	    	$this->db->select('`id`,`username`,`password`,`name`,`mobile`,`telephone`,`email`,`address`,`notes`,`user_group_id`,`user_rule_id`');
	     	$this->db->where("are_canceled", 0);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('ums_users');
        	return $query->result();
	    }
	    
		function get_all_display($order=null,$order_type=null)
	    {
	    	$this->db->select('`id`,`username`,`name`,`mobile`,`email`,`address`,`are_canceled`');
	     	if($order==null)
	     	{
	    		$this->db->order_by("id", "desc");
	     	}
	     	else 
	     	{
	     		if($order_type==null)
	     		{
	     			$this->db->order_by($order, "asc");
	     		}
	     		else 
	     		{
	     			$this->db->order_by($order, $order_type);
	     		}
	     	}
	    	$query = $this->db->get('ums_users');
        	return $query->result();
	    }
	    
		function get_all_display_active()
	    {
	    	$this->db->select('`id`,`username`,`name`,`mobile`,`email`,`address`');
	    	$this->db->where("are_canceled", 0);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('ums_users');
        	return $query->result();
	    }
	    
	    
		function get_by_id($id)
	    {
	    	$this->db->select('`ums_users.id`,`ums_users.username`,`ums_users.password`,`ums_users.name`,`ums_users.mobile`,`ums_users.telephone`,`ums_users.email`,`ums_users.address`,`ums_users.notes`,`ums_users.user_group_id`,`ums_users.user_rule_id`,`ums_users.are_canceled`,`ums_users.updated_at`,`ums_users_groups.name` as `group`,`ums_users_rules.name` as `rule`');
	     	$this->db->from('ums_users');	
	    	$this->db->join('ums_users_rules', 'ums_users_rules.id = ums_users.user_rule_id', 'left');
	    	$this->db->join('ums_users_groups', 'ums_users_groups.id = ums_users.user_group_id', 'left');
	    	$this->db->where("ums_users.id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }
	    
	    
		function get_id_by_username($username)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("username", $username);
	     	$query = $this->db->get('ums_users');
        	$arr=$query->result();
        	$id=$arr[0]->id;
        	return $id;
	    }
	   
		function get_count_by_username($id,$username)
	    {
	    	echo $this->db->count_all_results('ums_users');
			$this->db->where("name", $username);
	    	if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('ums_users');
			return $this->db->count_all_results();
	    }
	    
	    
	    
		function get_count()
		{
			echo $this->db->count_all_results('ums_users');
			$this->db->from('ums_users');
			return $this->db->count_all_results();
		}
	    
		function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('ums_users');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
		function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('ums_users');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }
		
}
?>