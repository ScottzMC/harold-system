<?php 
    
    class Dashboard extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['count_users'] = $this->Admin_model->count_users(); 
                $data['count_reminders'] = $this->Admin_model->count_reminders(); 
                $data['count_health_checks'] = $this->Admin_model->count_health_checks(); 
                $data['count_properties'] = $this->Admin_model->count_properties(); 
                $data['count_children'] = $this->Admin_model->count_children(); 
                $data['count_children_incidents'] = $this->Admin_model->count_children_incidents();
                
                $data['children'] = $this->Admin_model->display_children(); 
                $data['staff'] = $this->Admin_model->display_staff(); 
                
                $this->load->view('admin/dashboard', $data);
            }else{
                redirect('account/login');    
            }
        }
    }

?>