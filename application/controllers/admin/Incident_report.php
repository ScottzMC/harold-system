<?php 
    
    class Incident_report extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['incident_report'] = $this->Admin_model->display_all_incident_report();
                $data['children'] = $this->Admin_model->display_all_children();

                $this->load->view('admin/incident_report/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_incident_report(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $child_name = $this->input->post('child_name');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'child_name' => $child_name,
                'created_date' => $date
            );
            
            $insert_incident = $this->Admin_model->insert_incident_report($array);
            
            if($insert_incident){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('incident_report'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('incident_report'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_incident_report($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['incident_report'] = $this->Admin_model->display_incident_report_by_id($id);
                $data['children'] = $this->Admin_model->display_all_children();
                
                $this->load->view('admin/incident_report/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $child_name = $this->input->post('child_name');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'child_name' => $child_name,
                        'created_date' => $date
                    );
                    
                    $update_incident = $this->Admin_model->update_incident_report_details($id, $array);
                    
                    if($update_incident){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('incident_report'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('incident_report'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_incident_report(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_incident_report($id); 
        }
    }

?>