<?php 
    
    class Data_model extends CI_Model{
        
        // Account 
        
        public function create_user($data){
            $escape_data = $this->db->escape_str($data);
            $query = $this->db->insert('users', $escape_data);
            return $query;
          }
          
          public function validate($email, $password){
        	$escape_email = $this->db->escape_str($email);
            $escape_password = $this->db->escape_str($password);
            
            $this->db->where('role', "HR");
    	  	$this->db->where('email', $escape_email);
        	$query = $this->db->get('users');
    
        	if($query->num_rows() > 0){
              	$result = $query->row_array();
              	if($this->bcrypt->check_password($escape_password, $result['password'])){
        		    return $query->result();
              	}else{
            		return array();
              	}
    	    }else{
            	return NULL;
        	}
      	   }
          	
          public function update_user_password($email, $password){
            $query = $this->db->query("UPDATE users SET password = '$password' WHERE email = '$email' ");
            return $query;
          }
          
          public function activate_user($code){
            $query = $this->db->query("UPDATE users SET status = 'Activated' WHERE code = '$code' ");
             return $query;
          }
          
          public function update_login_activity($email, $data){
              $this->db->where('email', $email);
              $query = $this->db->update('users', $data);
              return $query;
          }
        
        // End of Account 
        
        // Dashboard 
        
        public function count_users(){
            $query = $this->db->query("SELECT COUNT(*) AS total_users FROM users")->result();
            return $query;
        }
        
        public function count_reminders(){
            $query = $this->db->query("SELECT COUNT(*) AS total_reminders FROM reminders")->result();
            return $query;
        }
        
        public function count_health_checks(){
            $query = $this->db->query("SELECT COUNT(*) AS total_health_checks FROM health_checks")->result();
            return $query;
        }
        
        public function count_properties(){
            $query = $this->db->query("SELECT COUNT(*) AS total_properties FROM properties")->result();
            return $query;
        }
        
        public function count_children(){
            $query = $this->db->query("SELECT COUNT(*) AS total_children FROM children")->result();
            return $query;
        }
        
        public function count_children_incidents(){
            $query = $this->db->query("SELECT COUNT(*) AS total_children_incidents FROM children_incidents")->result();
            return $query;
        }
        
        public function display_children(){
            $this->db->limit('10');
            $query = $this->db->get("children")->result();
            return $query;
        }
        
        public function display_staff(){
            $this->db->limit('10');
            $this->db->where('role', 'Staff');
            $query = $this->db->get("users")->result();
            return $query;
        }
        
        // End of Dashboard 
        
        // Profile 
        
        public function display_all_profile(){
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function display_profile_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function delete_profile($id){
            $query = $this->db->query("DELETE FROM users WHERE id = '$id' ");
        }
        
        public function update_profile_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('users', $data);
          return $query;
        }
         
        // End of Profile 
        
        // Qualifications 
        
        public function display_all_qualifications(){
            $query = $this->db->get('qualifications')->result();
            return $query;
        }
        
        public function display_qualifications_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('qualifications')->result();
            return $query;
        }
        
        public function delete_qualification($id){
            $query = $this->db->query("DELETE FROM qualifications WHERE id = '$id' ");
        }
        
        public function insert_qualification($data){
            $query = $this->db->insert('qualifications', $data);
            return $query;
        }
        
        public function update_qualifications($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('qualifications', $data);
          return $query;
        }
        
        // End of Qualifications
        
        // Legal Document 
        
        public function display_all_legal_document(){
            $query = $this->db->get('legal_document')->result();
            return $query;
        }
        
        public function display_legal_document_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('legal_document')->result();
            return $query;
        }
        
        public function delete_legal_document($id){
            $query = $this->db->query("DELETE FROM legal_document WHERE id = '$id' ");
        }
        
        public function insert_legal_document($data){
            $query = $this->db->insert('legal_document', $data);
            return $query;
        }
        
        public function update_legal_document($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('legal_document', $data);
          return $query;
        }
        
        // End of Legal Document
        
        // DBS Certificate 
        
        public function display_all_dbs_certificate(){
            $query = $this->db->get('dbs_certificate')->result();
            return $query;
        }
        
        public function display_dbs_certificate_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('dbs_certificate')->result();
            return $query;
        }
        
        public function delete_dbs_certificate($id){
            $query = $this->db->query("DELETE FROM dbs_certificate WHERE id = '$id' ");
        }
        
        public function insert_dbs_certificate($data){
            $query = $this->db->insert('dbs_certificate', $data);
            return $query;
        }
        
        public function update_dbs_certificate($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('dbs_certificate', $data);
          return $query;
        }
        
        // End of DBS Certificate
        
        // Reference 
        
        public function display_all_reference(){
            $query = $this->db->get('reference')->result();
            return $query;
        }
        
        public function display_reference_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('reference')->result();
            return $query;
        }
        
        public function delete_reference($id){
            $query = $this->db->query("DELETE FROM reference WHERE id = '$id' ");
        }
        
        public function insert_reference($data){
            $query = $this->db->insert('reference', $data);
            return $query;
        }
        
        public function update_reference($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('reference', $data);
          return $query;
        }
        
        // End of Reference
        
         // Disciplinaries 
        
        public function display_all_disciplinaries(){
            $query = $this->db->get('disciplinaries')->result();
            return $query;
        }
        
        public function display_disciplinaries_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('disciplinaries')->result();
            return $query;
        }
        
        public function insert_disciplinaries($data){
            $query = $this->db->insert('disciplinaries', $data);
            return $query;
        }
        
        public function update_disciplinaries($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('disciplinaries', $data);
          return $query;
        }
        
        public function delete_disciplinaries($id){
            $query = $this->db->query("DELETE FROM disciplinaries WHERE id = '$id' ");
        }
        
        // End of Disciplinaries 
        
        // Vehicle Detail 
        
        public function display_all_vehicle_detail(){
            $query = $this->db->get('vehicle_details')->result();
            return $query;
        }
        
        public function display_vehicle_detail_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('vehicle_details')->result();
            return $query;
        }
        
        public function insert_vehicle_detail($data){
            $query = $this->db->insert('vehicle_details', $data);
            return $query;
        }
        
        public function update_vehicle_detail($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('vehicle_details', $data);
          return $query;
        }
        
        public function delete_vehicle_detail($id){
            $query = $this->db->query("DELETE FROM vehicle_details WHERE id = '$id' ");
        }
        
        // End of Vehicle Detail 
        
        // Staff 
        
        public function display_all_staff(){
            //$this->db->where('role', 'HR');
            $this->db->where('role', 'Staff');
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function display_staff_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function insert_staff($data){
            $query = $this->db->insert('users', $data);
            return $query;
        }
        
        public function update_staff($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('users', $data);
          return $query;
        }
        
        public function delete_staff($id){
            $query = $this->db->query("DELETE FROM users WHERE id = '$id' ");
        }
        
        // End of Staff
        
    }

?>