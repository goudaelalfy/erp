<?php
class Users_rules_model extends Model 
{

		function Users_rules_model()
		{
			parent::Model();
		}
		
		
		
		function insert($data)
	    {
	       return $this->db->insert('ums_users_rules', $data);
	    }

	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('ums_users_rules', $data); 
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("ums_users_rules");
	    }	
	    
	/////////////////////////Get. /////////////////////////////////////////////////////
	
	    
	function get_all_display_active()
	    {
	    	$this->db->select('`id`,`code`,`name`,`notes`');
	    	$this->db->where("are_canceled", 0);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('ums_users_rules');
        	return $query->result();
	    }
	    
	    
	function get_by_id($id)
	    {
	    	$this->db->from('ums_users_rules');	
	    	$this->db->where("id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }   
	    
	function get_id_by_code($code)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("code", $code);
	     	$query = $this->db->get('ums_users_rules');
        	$arr=$query->result();
        	$id=$arr[0]->id;
        	return $id;
	    }
	    
	function get_id_by_name($name)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("name", $name);
	     	$query = $this->db->get('ums_users_rules');
        	$arr=$query->result();
        	$id=$arr[0]->id;
        	return $id;
	    }    
	    
	function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('ums_users_rules');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
	function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('ums_users_rules');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }
	    
	
	function get_max_position()
	    {
	    	$this->db->select_max('position');
	     	$query = $this->db->get('ums_users_rules');
        	return $query->result();
	    } 
	    
	public function get_by_parent($parent_id)
		{	
			 $this->db->select('id,code, name ');
		     $this->db->where("parent_id",$parent_id);
		     $this->db->order_by("position"); 
		     
		     $query = $this->db->get('ums_users_rules');
	         return $query->result();
		}
		
	function get_count_by_code($id,$code)
	    {
	    	echo $this->db->count_all_results('ums_users_rules');
			$this->db->where("code", $code);
			if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('ums_users_rules');
			return $this->db->count_all_results();
	    }
	    
	function get_count_by_name($id,$name)
	    {
	    	echo $this->db->count_all_results('ums_users_rules');
			$this->db->where("name", $name);
	    	if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('ums_users_rules');
			return $this->db->count_all_results();
	    }	
	
	function get_element_list($parent_id)
	{
		if ($parent_id == null) {
			$parent_id = 0;
		}
		else {
			$parent_id = (int) $parent_id;
		}
		
		$str = 'FAILED';
		
        $result = $this->get_by_parent($parent_id);

        
        if ($result !== false)
        {
        	$str = NULL;
        	
	        foreach ($result as $record)
			{
				foreach ($record as $key=>$value)
				{
					if($key=='id')
					$id=$value;
					elseif($key=='code')
					$code=$value;
					elseif($key=='name')
					$name=$value;
				}
				
				$supp = NULL;
                
                  	$supp = "<ul class='ajax'>"
                    ."<li id='".$id."'>{url:".base_url()."ums/users_rules/out_tree/".$id."}</li>"
                    ."</ul>";
                
        
                $str .= "<li class='text' id='".$id."'>"
                ."<span>".$code."&nbsp;&nbsp;&nbsp;&nbsp;".$name."</span>"
                .$supp
                ."</li>";
						
			}

        }
        return $str;		
		
	}
	
	
	function get_element_list_for_popup($parent_id)
	{
		if ($parent_id == null) {
			$parent_id = 0;
		}
		else {
			$parent_id = (int) $parent_id;
		}
		
		$str = 'FAILED';
		
        $result = $this->get_by_parent($parent_id);

        
        if ($result !== false)
        {
        	$str = NULL;
        	
	        foreach ($result as $record)
			{
				foreach ($record as $key=>$value)
				{
					if($key=='id')
					$id=$value;
					elseif($key=='code')
					$code=$value;
					elseif($key=='name')
					$name=$value;
				}
				
				$supp = NULL;
                
                  	$supp = "<ul class='ajax'>"
                    ."<li id='".$id."'>{url:".base_url()."ums/users_rules/out_tree_for_popup/".$id."}</li>"
                    ."</ul>";
                
        
                $str .= "<li class='text' id='".$id."'>"
                ."<span><label onmousemove='this.cursor=hand;' onclick=\"on_select('$id','$code&nbsp;&nbsp;&nbsp;&nbsp;$name')\">".$code."&nbsp;&nbsp;&nbsp;&nbsp;".$name."</label></span>"
                .$supp
                ."</li>";
						
			}

        }
        return $str;		
		
	}
	
	
	public function get_root_id()
	{
		return 0;
	}
	
	public function get_root_name()
	{
		return 'Users Rules';
	}
	
	
	
	
	//////////////Insertion.//////////////////////////////////////////////////////////
	
	public function insert_element($name, $parent_id, $slave)
	{
		$parent_id = (int) $parent_id;
		
		
		$data = array(
               'name' => $name ,
               'position' => (int) $this->get_max_id() + 1 ,
			   'parent_id' => $parent_id 
            );
		
		$query = $this->insert($data);
							
		$out = FAILED;
		if ($query == true) {
				$out = '({ "elementId":"'.$this->get_max_id().'", "elementName":"'.$name.'"})';
		}
		
		return $out; 	
 	}
	
 	
	  
	    
	
	




}
