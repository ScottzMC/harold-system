<?php 
    
    class House_repairs extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house_repair'] = $this->Admin_model->display_all_house_repairs();
                
                $this->load->view('admin/house_repair/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_house_repairs(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $category = $this->input->post('category');
            $status = $this->input->post('status');
            $repair_fullname = $this->input->post('repair_fullname');
            $repair_email = $this->input->post('repair_email');
            $repair_mobile = $this->input->post('repair_mobile');
            $repair_address = $this->input->post('repair_address');
            $time = $this->input->post('created_time');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'category' => $category,
                'status' => $status,
                'repair_fullname' => $repair_fullname,
                'repair_email' => $repair_email,
                'repair_mobile' => $repair_mobile,
                'repair_address' => $repair_address,
                'created_time' => $time,
                'created_date' => $date
            );
            
            $insert_house = $this->Admin_model->insert_house_repairs($array);
            
            if($insert_house){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('house_repairs'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('house_repairs'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_house_repair($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house_repair'] = $this->Admin_model->display_house_repairs_by_id($id);
                
                $this->load->view('admin/house_repair/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $category = $this->input->post('category');
                    $status = $this->input->post('status');
                    $repair_fullname = $this->input->post('repair_fullname');
                    $repair_email = $this->input->post('repair_email');
                    $repair_mobile = $this->input->post('repair_mobile');
                    $repair_address = $this->input->post('repair_address');
                    $time = $this->input->post('created_time');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'category' => $category,
                        'status' => $status,
                        'repair_fullname' => $repair_fullname,
                        'repair_email' => $repair_email,
                        'repair_mobile' => $repair_mobile,
                        'repair_address' => $repair_address,
                        'created_time' => $time,
                        'created_date' => $date
                    );
                    
                    $update_house = $this->Admin_model->update_house_repairs_details($id, $array);
                    
                    if($update_house){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('house_repairs'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('house_repairs'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_house_repairs(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_house_repairs($id); 
        }
    }

?>