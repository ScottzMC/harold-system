<?php 
    
    class Health_check extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['health_check'] = $this->Admin_model->display_all_health_check();
                
                $this->load->view('admin/health_check/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_health_check(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $completed_by = $this->input->post('completed_by');
            $child_feedback = $this->input->post('child_feedback');
            $medical_outcome = $this->input->post('medical_outcome');
            $status = "Pending";
            $time = $this->input->post('created_time');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'completed_by' => $completed_by,
                'medical_outcome' => $medical_outcome,
                'child_feedback' => $child_feedback,
                'status' => $status,
                'created_time' => $time,
                'created_date' => $date
            );
            
            $insert_event = $this->Admin_model->insert_health_check($array);
            
            if($insert_event){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('health_check'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('health_check'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_health_check($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['health_check'] = $this->Admin_model->display_health_check_by_id($id);
                
                $this->load->view('admin/health_check/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $completed_by = $this->input->post('completed_by');
                    $child_feedback = $this->input->post('child_feedback');
                    $medical_outcome = $this->input->post('medical_outcome');
                    $status = $this->input->post('status');
                    $time = $this->input->post('created_time');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'completed_by' => $completed_by,
                        'medical_outcome' => $medical_outcome,
                        'child_feedback' => $child_feedback,
                        'status' => $status,
                        'created_time' => $time,
                        'created_date' => $date
                    );
                    
                    $update_health_check = $this->Admin_model->update_health_check_details($id, $array);
                    
                    if($update_health_check){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('health_check'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('health_check'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_health_check(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_health_check($id); 
        }
    }

?>