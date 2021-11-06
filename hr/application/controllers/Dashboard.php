<?php 
    
    class Dashboard extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['count_users'] = $this->Data_model->count_users(); 
                $data['count_reminders'] = $this->Data_model->count_reminders(); 
                $data['count_health_checks'] = $this->Data_model->count_health_checks(); 
                $data['count_properties'] = $this->Data_model->count_properties(); 
                $data['count_children'] = $this->Data_model->count_children(); 
                $data['count_children_incidents'] = $this->Data_model->count_children_incidents();
                
                $data['children'] = $this->Data_model->display_children(); 
                $data['staff'] = $this->Data_model->display_staff(); 
                
                $this->load->view('hr/dashboard', $data);
            }else{
                redirect('account/login');    
            }
        }
    }

?>