<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peoplemodel extends CI_Model {

	public function getPeoples()
	{
		$this->db->select("*");
		$this->db->from('mon_event_data');
		
		$query = $this->db->get();
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
			
			echo "There is no data in the database";
			exit(); }
	}
	public function getPeoples2()
	{
		$this->db->select("*");
		$this->db->from('mon_event_detail');
		
		$query = $this->db->get();
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
			
			echo "There is no data in the database";
			exit(); }
	}
        
        
        
        
	public function insertPerson($id, $URL,$a) {
		$this->db->set('EVENT_ID', $id);
                $this->db->set('EVENT_URL', $URL);
                $this->db->set('URL_LIKES', $a);
                
                $this->db->insert('mon_event_data');
	}	
}
