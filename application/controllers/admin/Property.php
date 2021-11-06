<?php 
    
    class Property extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['property'] = $this->Admin_model->display_all_property();
                
                $this->load->view('admin/property/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_property(){
            $housename = $this->input->post('housename');
            $body = $this->input->post('body');
            $category = $this->input->post('category');
            $telephone = $this->input->post('telephone');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $postcode = $this->input->post('postcode');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $date = $this->input->post('created_date');
            
            $array = array(
                'housename' => $housename,
                'body' => $body,
                'category' => $category,
                'telephone' => $telephone,
                'mobile' => $mobile,
                'address' => $address,
                'postcode' => $postcode,
                'city' => $city,
                'state' => $state,
                'created_date' => $date
            );
            
            $insert_property = $this->Admin_model->insert_property($array);
            
            if($insert_property){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('property'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('property'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_property($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['property'] = $this->Admin_model->display_property_by_id($id);
                
                $this->load->view('admin/property/edit', $data);
                
                if(isset($btn_submit)){
                    $housename = $this->input->post('housename');
                    $body = $this->input->post('body');
                    $category = $this->input->post('category');
                    $telephone = $this->input->post('telephone');
                    $mobile = $this->input->post('mobile');
                    $address = $this->input->post('address');
                    $postcode = $this->input->post('postcode');
                    $city = $this->input->post('city');
                    $state = $this->input->post('state');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'housename' => $housename,
                        'body' => $body,
                        'category' => $category,
                        'telephone' => $telephone,
                        'mobile' => $mobile,
                        'address' => $address,
                        'postcode' => $postcode,
                        'city' => $city,
                        'state' => $state,
                        'created_date' => $date
                    );
                    
                    $update_property = $this->Admin_model->update_property_details($id, $array);
                    
                    if($update_property){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('property'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('property'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_property(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_property($id); 
        }
    }

?>