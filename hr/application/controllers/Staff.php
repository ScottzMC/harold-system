<?php 
    
    class Staff extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['staff'] = $this->Data_model->display_all_staff();
                
                $this->load->view('hr/staff/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_staff(){
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $role = $this->input->post('role');
            $telephone = $this->input->post('telephone');
            $address1 = $this->input->post('address1');
            $address2 = $this->input->post('address2');
            $postcode = $this->input->post('postcode');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            
            $array = array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'role' => $role,
                'telephone' => $telephone,
                'address1' => $address1,
                'address2' => $address2,
                'postcode' => $postcode,
                'city' => $city,
                'state' => $state
            );
            
            $insert_staff = $this->Data_model->insert_staff($array);
            
            if($insert_staff){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('staff'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_staff($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['staff'] = $this->Data_model->display_staff_by_id($id);
                
                $this->load->view('hr/staff/edit', $data);
                
                if(isset($btn_submit)){
                    $firstname = $this->input->post('firstname');
                    $lastname = $this->input->post('lastname');
                    $role = $this->input->post('role');
                    $telephone = $this->input->post('telephone');
                    $address1 = $this->input->post('address1');
                    $address2 = $this->input->post('address2');
                    $postcode = $this->input->post('postcode');
                    $city = $this->input->post('city');
                    $state = $this->input->post('state');
                    
                    $array = array(
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'role' => $role,
                        'telephone' => $telephone,
                        'address1' => $address1,
                        'address2' => $address2,
                        'postcode' => $postcode,
                        'city' => $city,
                        'state' => $state
                    ); 
                    
                    $update_staff = $this->Data_model->update_staff($id, $array);
                    
                    if($update_staff){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_staff(){
           $id = $this->input->post('del_id');
           $this->Data_model->delete_staff($id); 
        }
    
    }

?>