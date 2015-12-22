<?php
class Users_groups_model extends Model
{
   	
		function Users_groups_model()
		{
			parent::Model();
		}
		
		
	 	function insert($data)
	    {
	       return $this->db->insert('ums_users_groups', $data);
	    }

	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('ums_users_groups', $data); 
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("ums_users_groups");
	    }
	    
		function get_all()
	    {
	    	$this->db->select('`id`,`code`,`name`,`notes`');
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('ums_users_groups');
        	return $query->result();
	    }
	    
		function get_all_active()
	    {
	    	$this->db->select('`id`,`code`,`name`,`notes`');
	     	$this->db->where("are_canceled", 0);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('ums_users_groups');
        	return $query->result();
	    }
	    
		function get_all_display($order=null,$order_type=null)
	    {
	    	$this->db->select('`id`,`code`,`name`,`notes`,`are_canceled`');
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
	    	$query = $this->db->get('ums_users_groups');
        	return $query->result();
	    }
	    
		function get_all_display_active()
	    {
	    	$this->db->select('`id`,`code`,`name`,`notes`');
	    	$this->db->where("are_canceled", 0);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('ums_users_groups');
        	return $query->result();
	    }
	    
	    
		function get_by_id($id)
	    {
	    	$this->db->from('ums_users_groups');	
	    	$this->db->where("id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }
	    
		function get_id_by_code($code)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("code", $code);
	     	$query = $this->db->get('ums_users_groups');
        	$arr=$query->result();
        	$id=$arr[0]->id;
        	return $id;
	    }
	    
		function get_id_by_name($name)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("name", $name);
	     	$query = $this->db->get('ums_users_groups');
        	$arr=$query->result();
        	$id=$arr[0]->id;
        	return $id;
	    }
	    
		function get_count_by_code($id,$code)
	    {
	    	echo $this->db->count_all_results('ums_users_groups');
			$this->db->where("code", $code);
			if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('ums_users_groups');
			return $this->db->count_all_results();
	    }
	    
		function get_count_by_name($id,$name)
	    {
	    	echo $this->db->count_all_results('ums_users_groups');
			$this->db->where("name", $name);
	    	if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('ums_users_groups');
			return $this->db->count_all_results();
	    }
	    
	    
	    
		function get_count()
		{
			echo $this->db->count_all_results('ums_users_groups');
			$this->db->from('ums_users_groups');
			return $this->db->count_all_results();
		}
	    
		function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('ums_users_groups');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
		function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('ums_users_groups');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }
	    
	    
		function get_screens_by_parent($parent_id)
	    {
	    	$this->db->select('`id`,`code`,`name_en`,`name_ar`,`notes`,`parent_id`');
	    	$this->db->where("parent_id", $parent_id);
	    	$query = $this->db->get('ums_develop_screens');
        	return $query->result();
	    }
	    
		function get_screens_by_user_group_id($parent_id,$user_group_id)
	    {
	    	$this->db->select('`id`,`code`,`name_en`,`name_ar`,`view`,`add`,`edit`,`delete`,`cancel`');
	    	$this->db->from('ums_develop_screens');
	    	$this->db->join('ums_users_groups_screens_privielges', 'ums_develop_screens.code = ums_users_groups_screens_privielges.screen_code');
	    	$this->db->where("parent_id", $parent_id);
	    	$this->db->where("user_group_id", $user_group_id);
	    	$query = $this->db->get();
        	return $query->result();
	    }
	    
	    
		function get_all_inner_screens()
	    {
	    	$this->db->select('`id`,`code`,`name_en`,`name_ar`,`notes`,`parent_id`');
	    	$this->db->where("parent_id !=", 0);
	    	$query = $this->db->get('ums_develop_screens');
        	return $query->result();
	    }
	    

	    //Details Methods.
	 	function insert_details($data)
	    {
	       return $this->db->insert('ums_users_groups_screens_privielges', $data);
	    }
	    
		function update_details($user_group_id, $screen_code, $data)
	    {
	       	$this->db->where('user_group_id', $user_group_id);
	       	$this->db->where('screen_code', $screen_code);
        	return $this->db->update('ums_users_groups_screens_privielges', $data); 
	    }
		function delete_details($user_group_id)
	    {
	       	$this->db->where('user_group_id', $user_group_id);
	       	return $this->db->delete("ums_users_groups_screens_privielges");
	    }
		
		
}
?>