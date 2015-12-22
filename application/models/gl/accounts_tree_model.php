<?php
class Accounts_tree_model extends Model 
{

		function Accounts_tree_model()
		{
			parent::Model();
		}
		
		
		
		function insert($data)
	    {
	       return $this->db->insert('gl_accounts', $data);
	    }

	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('gl_accounts', $data); 
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("gl_accounts");
	    }	
	
	    
	/////////////////////////Get. /////////////////////////////////////////////////////
	
	function get_by_id($id)
	    {
	    	$this->db->from('gl_accounts');	
	    	$this->db->where("id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }   
	    
	function get_id_by_code($code)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("code", $code);
	     	$query = $this->db->get('gl_accounts');
        	$arr=$query->result();
        	$id=$arr[0]->id;
        	return $id;
	    }
	    
	function get_id_by_name($name)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("name", $name);
	     	$query = $this->db->get('gl_accounts');
        	$arr=$query->result();
        	$id=$arr[0]->id;
        	return $id;
	    }    
	    
	function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('gl_accounts');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
	function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('gl_accounts');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }
	    
	
	function get_max_position()
	    {
	    	$this->db->select_max('position');
	     	$query = $this->db->get('gl_accounts');
        	return $query->result();
	    } 
	    
	public function get_by_parent($parent_id)
		{	
			 $this->db->select('id,code, name, slave ');
		     $this->db->where("parent_id",$parent_id);
		     $this->db->order_by("position"); 
		     
		     $query = $this->db->get('gl_accounts');
	         return $query->result();
		}
		
	function get_count_by_code($id,$code)
	    {
	    	echo $this->db->count_all_results('gl_accounts');
			$this->db->where("code", $code);
			if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('gl_accounts');
			return $this->db->count_all_results();
	    }
	    
	function get_count_by_name($id,$name)
	    {
	    	echo $this->db->count_all_results('gl_accounts');
			$this->db->where("name", $name);
	    	if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('gl_accounts');
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
					elseif($key=='slave')
					$slave=$value;
				}
				
				$supp = NULL;
                if ($slave == 0)
                {
                    $supp = "<ul class='ajax'>"
                    ."<li id='".$id."'>{url:".base_url()."gl/accounts_tree/out_tree/".$id."}</li>"
                    ."</ul>";
                }
        
                $str .= "<li class='text' id='".$id."'>"
                ."<span>".$code."&nbsp;&nbsp;&nbsp;&nbsp;".$name."</span>"
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
		return 'Accounts Tree';
	}
	
	
	
	
	//////////////Insertion.//////////////////////////////////////////////////////////
	
	public function insert_element($name, $parent_id, $slave)
	{
		$parent_id = (int) $parent_id;
		
		
		$data = array(
               'name' => $name ,
               'position' => (int) $this->get_max_id() + 1 ,
			   'parent_id' => $parent_id ,
               'slave' => $slave 
            );
		
		$query = $this->insert($data);
							
		$out = FAILED;
		if ($query == true) {
				$out = '({ "elementId":"'.$this->get_max_id().'", "elementName":"'.$name.'", "slave":"'.$slave.'"})';
		}
		
		return $out; 	
 	}
	
 	
	  
	    
	
	




}
