<?php 
    
    class User extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $data['users'] = $this->Admin_model->display_all_users();
            
            if(!empty($session_role) && $session_role == "Admin"){
                $this->load->view('admin/user/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_user($id){
            $session_role = $this->session->userdata('urole');

            $data['users'] = $this->Admin_model->display_user_by_id($id);
            
            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('edit');
                
                $this->load->view('admin/user/edit', $data);
                
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
                    
                    $update_user = $this->Admin_model->update_user_details($id, $array);
                    
                    if($update_user){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Update Failed');
                            window.location.href="<?php echo site_url('user'); ?>";
                        </script>
                <?php }
                }
                
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_user(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_user($id); 
        }

    }

?>