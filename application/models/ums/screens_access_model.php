<?php
class Screens_access_model extends Model
{
   	
		function Screens_access_model()
		{
			parent::Model();
		}
		


	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('ums_develop_screens', $data); 
	    }
	    
	    
		function get_screens_by_parent($parent_id)
	    {
	    	$this->db->select('`id`,`code`,`name_en`,`name_ar`,`notes`,`access_id`,`parent_id`');
	    	$this->db->where("parent_id", $parent_id);
	    	$query = $this->db->get('ums_develop_screens');
        	return $query->result();
	    }
	    
		function get_screens_access()
	    {
	    	$this->db->select('`id`,`code`,`name_en`,`name_ar`');
	     	$this->db->order_by("id", "asc");
	    	$query = $this->db->get('ums_develop_screens_access');
        	return $query->result();
	    }
	    
		function get_all()
	    {
	    	$this->db->select('`id`,`code`,`name_en`,`name_ar`');
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('ums_develop_screens');
        	return $query->result();
	    }

		function get_all_display($order=null,$order_type=null)
	    {
	    	$this->db->select('`id`,`code`,`name_en`,`name_ar`');
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
	    	$query = $this->db->get('ums_develop_screens');
        	return $query->result();
	    }    
	    
		function get_by_id($id)
	    {
	    	$this->db->from('ums_develop_screens');	
	    	$this->db->where("id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }
	    
		function get_count()
		{
			echo $this->db->count_all_results('ums_develop_screens');
			$this->db->from('ums_develop_screens');
			return $this->db->count_all_results();
		}
	    
		function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('ums_develop_screens');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
		function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('ums_develop_screens');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }

}
?>