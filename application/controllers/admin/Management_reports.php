<?php 
    
    class Management_reports extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['management_reports'] = $this->Admin_model->display_all_management_reports();
                $data['management_incidents'] = $this->Admin_model->display_all_management_incidents();
                $data['management_staff'] = $this->Admin_model->display_all_management_staff();
                $data['children'] = $this->Admin_model->display_all_children();
                $data['staff'] = $this->Admin_model->display_all_staff();
                
                $this->load->view('admin/management_reports/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_management_reports(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $availabilty = $this->input->post('availabilty');
            $staff_shift = $this->input->post('staff_shift');
            $repair_performed_by = $this->input->post('repair_performed_by');
            $repair_date = $this->input->post('repair_date');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'availabilty' => $availabilty,
                'staff_shift' => $staff_shift,
                'repair_performed_by' => $repair_performed_by,
                'repair_date' => $repair_date,
                'created_date' => $date
            );
            
            $insert_management = $this->Admin_model->insert_management_reports($array);
            
            if($insert_management){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('management_reports'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('management_reports'); ?>";
                </script> 
      <?php }
        }
        
        public function add_management_incidents(){
            $title = $this->input->post('title');
            $incident = $this->input->post('incident');
            $child_name = $this->input->post('child_name');
            $child_house = $this->input->post('child_house');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'incident' => $incident,
                'child_name' => $child_name,
                'child_house' => $child_house,
                'created_date' => $date
            );
            
            $insert_management = $this->Admin_model->insert_management_incidents($array);
            
            if($insert_management){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('management_reports'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('management_reports'); ?>";
                </script> 
      <?php }
        }
        
        public function add_management_staff(){
            $fullname = $this->input->post('fullname');
            $shift_start_time = $this->input->post('shift_start_time');
            $shift_end_time = $this->input->post('shift_end_time');
            $shift_date = $this->input->post('shift_date');
            $availability = $this->input->post('availability');

            $array = array(
                'fullname' => $fullname,
                'shift_start_time' => $shift_start_time,
                'shift_end_time' => $shift_end_time,
                'shift_date' => $shift_date,
                'availability' => $availability
            );
            
            $insert_staff = $this->Admin_model->insert_management_staff($array);
            
            if($insert_staff){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('management_reports'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('management_reports'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_management_reports($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['management_reports'] = $this->Admin_model->display_management_reports_by_id($id);
                
                $this->load->view('admin/management_reports/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $availabilty = $this->input->post('availabilty');
                    $staff_shift = $this->input->post('staff_shift');
                    $repair_performed_by = $this->input->post('repair_performed_by');
                    $repair_date = $this->input->post('repair_date');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'availabilty' => $availabilty,
                        'staff_shift' => $staff_shift,
                        'repair_performed_by' => $repair_performed_by,
                        'repair_date' => $repair_date,
                        'created_date' => $date
                    );
                    
                    $update_management = $this->Admin_model->update_management_reports_details($id, $array);
                    
                    if($update_management){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('management_reports'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('management_reports'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_management_incidents($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['management_incidents'] = $this->Admin_model->display_management_incidents_by_id($id);
                $data['children'] = $this->Admin_model->display_all_children();

                $this->load->view('admin/management_reports/edit_incident', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $incident = $this->input->post('incident');
                    $child_name = $this->input->post('child_name');
                    $child_house = $this->input->post('child_house');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'incident' => $incident,
                        'child_name' => $child_name,
                        'child_house' => $child_house,
                        'created_date' => $date
                    );
                    
                    $update_incident = $this->Admin_model->update_management_incidents_details($id, $array);
                    
                    if($update_incident){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('management_reports'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('management_reports'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_management_staff($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['management_staff'] = $this->Admin_model->display_management_staff_by_id($id);
                $data['children'] = $this->Admin_model->display_all_children();
                $data['staff'] = $this->Admin_model->display_all_staff();

                $this->load->view('admin/management_reports/edit_staff', $data);
                
                if(isset($btn_submit)){
                    $fullname = $this->input->post('fullname');
                    $shift_start_time = $this->input->post('shift_start_time');
                    $shift_end_time = $this->input->post('shift_end_time');
                    $shift_date = $this->input->post('shift_date');
                    $availability = $this->input->post('availability');
                    
                    $array = array(
                        'fullname' => $fullname,
                        'shift_start_time' => $shift_start_time,
                        'shift_end_time' => $shift_end_time,
                        'shift_date' => $shift_date,
                        'availability' => $availability
                    );
                    
                    $update_staff = $this->Admin_model->update_management_staff_details($id, $array);
                    
                    if($update_staff){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('management_reports'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('management_reports'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_management_reports(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_management_reports($id); 
        }
        
        public function delete_management_incidents(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_management_incidents($id); 
        }
        
        public function delete_management_staff(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_management_staff($id); 
        }
    }

?>