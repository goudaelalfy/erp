<?php
class Stocks_model extends Model
{
   	
		function Stocks_model()
		{
			parent::Model();
		}
		
		
	 	function insert($data)
	    {
	       return $this->db->insert('inventory_stocks', $data);
	    }

	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('inventory_stocks', $data); 
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("inventory_stocks");
	    }
	    
		function get_all()
	    {
	    	$this->db->select('`id`,`code`,`name`,`stock_manager`,`address`,`phone`,`mobile`,`fax`,`email`,`notes`');
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('inventory_stocks');
        	return $query->result();
	    }
	    
	    
		function get_all_active()
	    {
	    	$this->db->select('`id`,`code`,`name`,`stock_manager`,`address`,`phone`,`mobile`,`fax`,`email`,`notes`');
	     	$this->db->where("are_canceled", 0);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('inventory_stocks');
        	return $query->result();
	    }

		function get_all_display($order=null,$order_type=null)
	    {
	    	$this->db->select('`id`,`code`,`name`,`stock_manager`,`address`,`are_canceled`');
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
	    	$query = $this->db->get('inventory_stocks');
        	return $query->result();
	    }
	    
		function get_all_display_active()
	    {
	    	$this->db->select('`id`,`code`,`name`,`stock_manager`,`address`');
	    	$this->db->where("are_canceled", 0);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('inventory_stocks');
        	return $query->result();
	    }
	    
	    
		function get_by_id($id)
	    {
	    	$this->db->from('inventory_stocks');	
	    	$this->db->where("id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }
	    
		function get_id_by_code($code)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("code", $code);
	     	$query = $this->db->get('inventory_stocks');
        	$arr=$query->result();
        	$id=$arr[0]->id;
        	return $id;
	    }
	    
		function get_id_by_name($name)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("name", $name);
	     	$query = $this->db->get('inventory_stocks');
        	$arr=$query->result();
        	$id=$arr[0]->id;
        	return $id;
	    }
	    
		function get_count_by_code($id,$code)
	    {
	    	echo $this->db->count_all_results('inventory_stocks');
			$this->db->where("code", $code);
			if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('inventory_stocks');
			return $this->db->count_all_results();
	    }
	    
		function get_count_by_name($id,$name)
	    {
	    	echo $this->db->count_all_results('inventory_stocks');
			$this->db->where("name", $name);
	    	if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('inventory_stocks');
			return $this->db->count_all_results();
	    }
	    
	    
		function get_count()
		{
			echo $this->db->count_all_results('inventory_stocks');
			$this->db->from('inventory_stocks');
			return $this->db->count_all_results();
		}
	    
		function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('inventory_stocks');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
		function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('inventory_stocks');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }

}
?>