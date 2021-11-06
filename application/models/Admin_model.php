<?php 

    class Admin_model extends CI_Model{
        
        // Account 
        
        public function create_user($data){
            $escape_data = $this->db->escape_str($data);
            $query = $this->db->insert('users', $escape_data);
            return $query;
          }
          
          public function validate($email, $password){
        	$escape_email = $this->db->escape_str($email);
            $escape_password = $this->db->escape_str($password);
    
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
        
        // Users 
        
        public function display_all_users(){
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function display_user_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function delete_user($id){
            $query = $this->db->query("DELETE FROM users WHERE id = '$id' ");
        }
        
        public function update_user_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('users', $data);
          return $query;
        }
         
        // End of Users 
        
        // Calendar
        
        public function display_all_calendar_events(){
            $query = $this->db->get('calendar_events')->result();
            return $query;
        }
        
        public function display_by_appointment_calendar_events(){
            $this->db->where('category', 'Appointments');
            $query = $this->db->get('calendar_events')->result();
            return $query;
        }
        
        public function display_by_meeting_calendar_events(){
            $this->db->where('category', 'Meetings');
            $query = $this->db->get('calendar_events')->result();
            return $query;
        }
        
        public function display_by_todolist_calendar_events(){
            $this->db->where('category', 'To-do List');
            $query = $this->db->get('calendar_events')->result();
            return $query;
        }
        
        public function display_calendar_events_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('calendar_events')->result();
            return $query;
        }
        
        public function insert_calendar_events($data){
            $query = $this->db->insert('calendar_events', $data);
            return $query;
        }
        
        public function delete_calendar_event($id){
            $query = $this->db->query("DELETE FROM calendar_events WHERE id = '$id' ");
        }
        
        public function update_calendar_events_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('calendar_events', $data);
          return $query;
        }
        
        // End of Calendar
        
        // Audit Reviews
        
        public function display_all_audit_reviews(){
            $query = $this->db->get('audit_reviews')->result();
            return $query;
        }
        
        public function display_audit_reviews_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('audit_reviews')->result();
            return $query;
        }
        
        public function insert_audit_reviews($data){
            $query = $this->db->insert('audit_reviews', $data);
            return $query;
        }
        
        public function delete_audit_reviews($id){
            $query = $this->db->query("DELETE FROM audit_reviews WHERE id = '$id' ");
        }
        
        public function update_audit_reviews_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('audit_reviews', $data);
          return $query;
        }
        
        // End of Audit Reviews
        
        // Reminders
        
        public function display_all_reminders(){
            $query = $this->db->get('reminders')->result();
            return $query;
        }
        
        public function display_reminders_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('reminders')->result();
            return $query;
        }
        
        public function insert_reminders($data){
            $query = $this->db->insert('reminders', $data);
            return $query;
        }
        
        public function delete_reminders($id){
            $query = $this->db->query("DELETE FROM reminders WHERE id = '$id' ");
        }
        
        public function update_reminders_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('reminders', $data);
          return $query;
        }
        
        // End of Reminders 
        
        // Children 
        
        public function display_children_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_social_worker_by_code($code){
            $this->db->where('children_code', $code);
            $query = $this->db->get('social_worker')->result();
            return $query;
        }
        
        public function update_children_by_code($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children', $data);
          return $query;
        }
        
        public function display_social_worker_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('social_worker')->result();
            return $query;
        }
        
        public function insert_social_worker($data){
            $query = $this->db->insert('social_worker', $data);
            return $query;
        }
        
        public function insert_children($data){
            $query = $this->db->insert('children', $data);
            return $query;
        }
        
        public function delete_social_worker($id){
            $query = $this->db->query("DELETE FROM social_worker WHERE id = '$id' ");
        }
        
        public function delete_children($id){
            $query = $this->db->query("DELETE FROM children WHERE id = '$id' ");
        }
        
        public function update_social_worker($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('social_worker', $data);
          return $query;
        }
        
        public function update_children_image($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children', $data);
          return $query;
        }
        
        // End of Children 
        
        // Children's Activity
        
        public function display_all_children_activity(){
            $query = $this->db->get('children_activity')->result();
            return $query;
        }
        
        public function display_children_activity_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_activity')->result();
            return $query;
        }
        
        public function insert_children_activity($data){
            $query = $this->db->insert('children_activity', $data);
            return $query;
        }
        
        public function delete_children_activity($id){
            $query = $this->db->query("DELETE FROM children_activity WHERE id = '$id' ");
        }
        
        public function update_children_activity_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_activity', $data);
          return $query;
        }
        
        // End of Children's Activity 
        
        // Health & Safety Check
        
        public function display_all_health_check(){
            $query = $this->db->get('health_checks')->result();
            return $query;
        }
        
        public function display_health_check_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('health_checks')->result();
            return $query;
        }
        
        public function insert_health_check($data){
            $query = $this->db->insert('health_checks', $data);
            return $query;
        }
        
        public function delete_health_check($id){
            $query = $this->db->query("DELETE FROM health_checks WHERE id = '$id' ");
        }
        
        public function update_health_check_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('health_checks', $data);
          return $query;
        }
        
        // End of Health & Safety Check 
        
        // House repairs
        
        public function display_all_house_repairs(){
            $query = $this->db->get('house_repairs')->result();
            return $query;
        }
        
        public function display_house_repairs_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('house_repairs')->result();
            return $query;
        }
        
        public function insert_house_repairs($data){
            $query = $this->db->insert('house_repairs', $data);
            return $query;
        }
        
        public function delete_house_repairs($id){
            $query = $this->db->query("DELETE FROM house_repairs WHERE id = '$id' ");
        }
        
        public function update_house_repairs_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('house_repairs', $data);
          return $query;
        }
        
        // End of House repairs
        
        // Risk Assessment
        
        public function display_all_risk_assessment(){
            $query = $this->db->get('risk_assessment')->result();
            return $query;
        }
        
        public function display_risk_assessment_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('risk_assessment')->result();
            return $query;
        }
        
        public function get_risk_assessment_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('risk_assessment');
            return $query->result_array();
        }
        
        public function insert_risk_assessment($data){
            $query = $this->db->insert('risk_assessment', $data);
            return $query;
        }
        
        public function delete_risk_assessment($id){
            $query = $this->db->query("DELETE FROM risk_assessment WHERE id = '$id' ");
        }
        
        public function update_risk_assessment_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('risk_assessment', $data);
          return $query;
        }
        
        // End of Risk Assessment
        
        // Support Plan
        
        public function display_all_support_plan(){
            $query = $this->db->get('support_plan')->result();
            return $query;
        }
        
        public function display_support_plan_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('support_plan')->result();
            return $query;
        }
        
        public function get_support_plan_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('support_plan');
            return $query->result_array();
        }
        
        public function insert_support_plan($data){
            $query = $this->db->insert('support_plan', $data);
            return $query;
        }
        
        public function delete_support_plan($id){
            $query = $this->db->query("DELETE FROM support_plan WHERE id = '$id' ");
        }
        
        public function update_support_plan_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('support_plan', $data);
          return $query;
        }
        
        // End of Support Plan
        
        // Procedure
        
        public function display_all_procedure(){
            $query = $this->db->get('procedure_pol')->result();
            return $query;
        }
        
        public function display_procedure_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('procedure_pol')->result();
            return $query;
        }
        
        public function insert_procedure($data){
            $query = $this->db->insert('procedure_pol', $data);
            return $query;
        }
        
        public function delete_procedure($id){
            $query = $this->db->query("DELETE FROM procedure_pol WHERE id = '$id' ");
        }
        
        public function update_procedure_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('procedure_pol', $data);
          return $query;
        }
        
        // End of Procedure
        
        // Property
        
        public function display_all_property(){
            $query = $this->db->get('properties')->result();
            return $query;
        }
        
        public function display_property_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('properties')->result();
            return $query;
        }
        
        public function insert_property($data){
            $query = $this->db->insert('properties', $data);
            return $query;
        }
        
        public function delete_property($id){
            $query = $this->db->query("DELETE FROM properties WHERE id = '$id' ");
        }
        
        public function update_property_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('properties', $data);
          return $query;
        }
        
        // End of Property
        
        // Document Storage
        
        public function display_all_document_storage(){
            $query = $this->db->get('document_storage')->result();
            return $query;
        }
        
        public function display_document_storage_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('document_storage')->result();
            return $query;
        }
        
        public function insert_document_storage($data){
            $query = $this->db->insert('document_storage', $data);
            return $query;
        }
        
        public function delete_document_storage($id){
            $query = $this->db->query("DELETE FROM document_storage WHERE id = '$id' ");
        }
        
        public function update_document_storage_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('document_storage', $data);
          return $query;
        }
        
        // End of Document Storage
        
        // Support Work
        
        public function display_all_support_work(){
            $query = $this->db->get('support_work')->result();
            return $query;
        }
        
        public function display_support_work_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('support_work')->result();
            return $query;
        }
        
        public function get_support_work() {
            $query = $this->db->get('support_work');
            return $query->result_array();
        }
        
        public function insert_support_work($data){
            $query = $this->db->insert('support_work', $data);
            return $query;
        }
        
        public function delete_support_work($id){
            $query = $this->db->query("DELETE FROM support_work WHERE id = '$id' ");
        }
        
        public function update_support_work_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('support_work', $data);
          return $query;
        }
        
       // End of Support Work
       
       // Incident Report
        
        public function display_all_incident_report(){
            $query = $this->db->get('incident_report')->result();
            return $query;
        }
        
        public function display_incident_report_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('incident_report')->result();
            return $query;
        }
        
        public function insert_incident_report($data){
            $query = $this->db->insert('incident_report', $data);
            return $query;
        }
        
        public function delete_incident_report($id){
            $query = $this->db->query("DELETE FROM incident_report WHERE id = '$id' ");
        }
        
        public function update_incident_report_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('incident_report', $data);
          return $query;
        }
        
       // End of Incident Report
       
       // Sanction Report
        
        public function display_all_sanction_report(){
            $query = $this->db->get('sanction_report')->result();
            return $query;
        }
        
        public function display_sanction_report_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('sanction_report')->result();
            return $query;
        }
        
        public function insert_sanction_report($data){
            $query = $this->db->insert('sanction_report', $data);
            return $query;
        }
        
        public function delete_sanction_report($id){
            $query = $this->db->query("DELETE FROM sanction_report WHERE id = '$id' ");
        }
        
        public function update_sanction_report_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('sanction_report', $data);
          return $query;
        }
        
       // End of Sanction Report
       
       // Report Printout
        
        public function display_all_children_report(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_children_report_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_children_report_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function update_children_report_details($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children', $data);
          return $query;
        }
        
        public function insert_children_report($data){
            $query = $this->db->insert('children', $data);
            return $query;
        }
        
        public function update_children_report_image($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children', $data);
          return $query;
        }
        
        public function delete_children_report($id){
            $query = $this->db->query("DELETE FROM children WHERE id = '$id' ");
        }
        
        // Medical History
        
        public function display_medical_report_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_medical_history')->result();
            return $query;
        }
        
        public function insert_medical_history($data){
            $query = $this->db->insert('children_medical_history', $data);
            return $query;
        }
        
        public function update_medical_history_details($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_medical_history', $data);
          return $query;
        }
        
        public function delete_medical_history($id){
            $query = $this->db->query("DELETE FROM children_medical_history WHERE id = '$id' ");
        }
        
        // End of Medical History
        
        // Personal Education 
        
        public function display_education_report_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_personal_education')->result();
            return $query;
        }
        
        public function insert_education_report($data){
            $query = $this->db->insert('children_personal_education', $data);
            return $query;
        }
        
        public function update_education_report_details($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_personal_education', $data);
          return $query;
        }
        
        public function delete_personal_education($id){
            $query = $this->db->query("DELETE FROM children_personal_education WHERE id = '$id' ");
        }
        
        // End of Personal Education
        
        // Finance Information
        
        public function display_finance_information_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_finance_information')->result();
            return $query;
        }
        
        public function insert_finance_information($data){
            $query = $this->db->insert('children_finance_information', $data);
            return $query;
        }
        
        public function update_finance_information_details($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_finance_information', $data);
          return $query;
        }
        
        public function delete_finance_information($id){
            $query = $this->db->query("DELETE FROM children_finance_information WHERE id = '$id' ");
        }
        
        // End of Finance Information
        
        // Foster Care
        
        public function display_foster_care_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_foster_care')->result();
            return $query;
        }
        
        public function insert_foster_care($data){
            $query = $this->db->insert('children_foster_care', $data);
            return $query;
        }
        
        public function update_foster_care($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_foster_care', $data);
          return $query;
        }
        
        public function delete_foster_care($id){
            $query = $this->db->query("DELETE FROM children_foster_care WHERE id = '$id' ");
        }
        
        // End of Foster Care
        
        // Disciplinaries 
        
        public function display_disciplinaries_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_disciplinaries')->result();
            return $query;
        }
        
        public function display_disciplinaries_by_code_and_id($id, $code){
            $this->db->where('id', $id);
            $this->db->where('code', $code);
            $query = $this->db->get('children_disciplinaries')->result();
            return $query;
        }
        
        public function count_displinaries($code){
            $query = $this->db->query("SELECT COUNT(*) AS total_disc FROM children_disciplinaries WHERE code = '$code' ")->result();
            return $query;
        }
        
        public function insert_disciplinaries($data){
            $query = $this->db->insert('children_disciplinaries', $data);
            return $query;
        }
        
        public function update_disciplinaries($id, $code, $data){
          $this->db->where('id', $id);
          $this->db->where('code', $code);
          $query = $this->db->update('children_disciplinaries', $data);
          return $query;
        }
        
        public function delete_disciplinaries($id){
            $query = $this->db->query("DELETE FROM children_disciplinaries WHERE id = '$id' ");
        }
        
        // End of Disciplinaries 
        
        // Incidents 
        
        public function display_incidents_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_incidents')->result();
            return $query;
        }
        
        public function display_incidents_by_code_and_id($id, $code){
            $this->db->where('id', $id);
            $this->db->where('code', $code);
            $query = $this->db->get('children_incidents')->result();
            return $query;
        }
        
        public function count_incidents($code){
            $query = $this->db->query("SELECT COUNT(*) AS total_inc FROM children_incidents WHERE code = '$code' ")->result();
            return $query;
        }
        
        public function insert_incidents($data){
            $query = $this->db->insert('children_incidents', $data);
            return $query;
        }
        
        public function update_incidents($id, $code, $data){
          $this->db->where('id', $id);
          $this->db->where('code', $code);
          $query = $this->db->update('children_incidents', $data);
          return $query;
        }
        
        public function delete_incidents($id){
            $query = $this->db->query("DELETE FROM children_incidents WHERE id = '$id' ");
        }
        
        // End of Incidents 
        
         // Absences 
        
        public function display_absences_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_absences')->result();
            return $query;
        }
        
        public function display_absences_by_code_and_id($id, $code){
            $this->db->where('id', $id);
            $this->db->where('code', $code);
            $query = $this->db->get('children_absences')->result();
            return $query;
        }
        
        public function count_absences($code){
            $query = $this->db->query("SELECT COUNT(*) AS total_abs FROM children_absences WHERE code = '$code' ")->result();
            return $query;
        }
        
        public function insert_absences($data){
            $query = $this->db->insert('children_absences', $data);
            return $query;
        }
        
        public function update_absences($id, $code, $data){
          $this->db->where('id', $id);
          $this->db->where('code', $code);
          $query = $this->db->update('children_absences', $data);
          return $query;
        }
        
        public function delete_absences($id){
            $query = $this->db->query("DELETE FROM children_absences WHERE id = '$id' ");
        }
        
        // End of Absences 
        
        // Sanction Rewards 
        
        public function display_sanction_rewards_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_sanction_rewards')->result();
            return $query;
        }
        
        public function display_children_sanction_rewards_by_code_and_id($id, $code){
            $this->db->where('id', $id);
            $this->db->where('code', $code);
            $query = $this->db->get('children_sanction_rewards')->result();
            return $query;
        }
        
        public function count_children_sanction_rewards($code){
            $query = $this->db->query("SELECT COUNT(*) AS total_sanc FROM children_sanction_rewards WHERE code = '$code' ")->result();
            return $query;
        }
        
        public function insert_children_sanction_rewards($data){
            $query = $this->db->insert('children_sanction_rewards', $data);
            return $query;
        }
        
        public function update_children_sanction_rewards($id, $code, $data){
          $this->db->where('id', $id);
          $this->db->where('code', $code);
          $query = $this->db->update('children_sanction_rewards', $data);
          return $query;
        }
        
        public function delete_children_sanction_rewards($id){
            $query = $this->db->query("DELETE FROM children_sanction_rewards WHERE id = '$id' ");
        }
        
        // End of Sanction Rewards
        
        // Abilities Evaluation
        
        public function display_abilities_evaluation_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_abilities_evaluation')->result();
            return $query;
        }
        
        public function insert_abilities_evaluation($data){
            $query = $this->db->insert('children_abilities_evaluation', $data);
            return $query;
        }
        
        public function update_abilities_evaluation($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_abilities_evaluation', $data);
          return $query;
        }
        
        public function delete_abilities_evaluation($id){
            $query = $this->db->query("DELETE FROM children_abilities_evaluation WHERE id = '$id' ");
        }
        
        // End of Abilities Evaluation
        
        // Keywork Session
        
        public function display_keywork_session_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_keywork_session')->result();
            return $query;
        }
        
        public function insert_keywork_session($data){
            $query = $this->db->insert('children_keywork_session', $data);
            return $query;
        }
        
        public function update_keywork_session($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_keywork_session', $data);
          return $query;
        }
        
        public function delete_keywork_session($id){
            $query = $this->db->query("DELETE FROM children_keywork_session WHERE id = '$id' ");
        }
        
        // End of Keywork Session
        
        // Supervision Action
        
        public function display_supervision_action_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_supervision_action')->result();
            return $query;
        }
        
        public function insert_supervision_action($data){
            $query = $this->db->insert('children_supervision_action', $data);
            return $query;
        }
        
        public function update_supervision_action($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_supervision_action', $data);
          return $query;
        }
        
        public function delete_supervision_action($id){
            $query = $this->db->query("DELETE FROM children_supervision_action WHERE id = '$id' ");
        }
        
        // End of Supervision Action
        
         // Case Recording
        
        public function display_case_recording_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_case_recording')->result();
            return $query;
        }
        
        public function insert_case_recording($data){
            $query = $this->db->insert('children_case_recording', $data);
            return $query;
        }
        
        public function update_case_recording($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_case_recording', $data);
          return $query;
        }
        
        public function delete_case_recording($id){
            $query = $this->db->query("DELETE FROM children_case_recording WHERE id = '$id' ");
        }
        
        // End of Case Recording
        
        // Health Information
        
        public function display_health_information_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_health_information')->result();
            return $query;
        }
        
        public function insert_health_information($data){
            $query = $this->db->insert('children_health_information', $data);
            return $query;
        }
        
        public function update_health_information($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_health_information', $data);
          return $query;
        }
        
        public function delete_health_information($id){
            $query = $this->db->query("DELETE FROM children_health_information WHERE id = '$id' ");
        }
        
        // End of Health Information
        
        // Visitor Logs 
        
        public function display_visitor_logs_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_visitor_logs')->result();
            return $query;
        }
        
        public function display_children_visitor_logs_by_code_and_id($id, $code){
            $this->db->where('id', $id);
            $this->db->where('code', $code);
            $query = $this->db->get('children_visitor_logs')->result();
            return $query;
        }
        
        public function insert_children_visitor_logs($data){
            $query = $this->db->insert('children_visitor_logs', $data);
            return $query;
        }
        
        public function update_children_visitor_logs($id, $code, $data){
          $this->db->where('id', $id);
          $this->db->where('code', $code);
          $query = $this->db->update('children_visitor_logs', $data);
          return $query;
        }
        
        public function delete_children_visitor_logs($id){
            $query = $this->db->query("DELETE FROM children_visitor_logs WHERE id = '$id' ");
        }
        
        // End of Visitor Logs
        
       // End of Report Printout
       
       // Management Reports 
       
        public function display_all_management_reports(){
            $query = $this->db->get('management_reports')->result();
            return $query;
        }
        
        public function display_all_management_incidents(){
            $query = $this->db->get('management_children_incidents')->result();
            return $query;
        }
        
        public function display_all_management_staff(){
            $query = $this->db->get('management_staff')->result();
            return $query;
        }
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_all_staff(){
            $this->db->where('role', 'Staff');
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function display_management_reports_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('management_reports')->result();
            return $query;
        }
        
        public function display_management_incidents_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('management_children_incidents')->result();
            return $query;
        }
        
        public function display_management_staff_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('management_staff')->result();
            return $query;
        }
        
        public function insert_management_reports($data){
            $query = $this->db->insert('management_reports', $data);
            return $query;
        }
        
        public function insert_management_incidents($data){
            $query = $this->db->insert('management_children_incidents', $data);
            return $query;
        }
        
        public function insert_management_staff($data){
            $query = $this->db->insert('management_staff', $data);
            return $query;
        }
        
        public function delete_management_reports($id){
            $query = $this->db->query("DELETE FROM management_reports WHERE id = '$id' ");
        }
        
        public function delete_management_incidents($id){
            $query = $this->db->query("DELETE FROM management_children_incidents WHERE id = '$id' ");
        }
        
        public function delete_management_staff($id){
            $query = $this->db->query("DELETE FROM management_staff WHERE id = '$id' ");
        }
        
        public function update_management_reports_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('management_reports', $data);
          return $query;
        }
        
        public function update_management_incidents_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('management_children_incidents', $data);
          return $query;
        }
        
        public function update_management_staff_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('management_staff', $data);
          return $query;
        }
        
       // End of Management Reports 
    }

?>