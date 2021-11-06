<?php 
    
    class Children_activity extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children_activity'] = $this->Admin_model->display_all_children_activity();
                
                $this->load->view('admin/children_activity/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_children_activity(){
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $body = $this->input->post('body');
            $status = $this->input->post('status');
            $time = $this->input->post('hour_time');
            $date = $this->input->post('created_date');
            
            $array = array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'body' => $body,
                'status' => $status,
                'hour_time' => $time,
                'created_date' => $date
            );
            
            $insert_children_activity = $this->Admin_model->insert_children_activity($array);
            
            if($insert_children_activity){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('children_activity'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('children_activity'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_children_activity($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children_activity'] = $this->Admin_model->display_children_activity_by_id($id);
                
                $this->load->view('admin/children_activity/edit', $data);
                
                if(isset($btn_submit)){
                    $firstname = $this->input->post('firstname');
                    $lastname = $this->input->post('lastname');
                    $body = $this->input->post('body');
                    $status = $this->input->post('status');
                    $time = $this->input->post('hour_time');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'body' => $body,
                        'status' => $status,
                        'hour_time' => $time,
                        'created_date' => $date
                    );
                    
                    $update_children_activity = $this->Admin_model->update_children_activity_details($id, $array);
                    
                    if($update_children_activity){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children_activity'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children_activity'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_children_activity(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_children_activity($id); 
        }
    }

?>