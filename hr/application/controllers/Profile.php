<?php 

    class Profile extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $data['profile'] = $this->Data_model->display_all_profile();
            
            if(!empty($session_role) && $session_role == "HR"){
                $this->load->view('hr/profile/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit($id){
            $session_role = $this->session->userdata('urole');

            $data['profile'] = $this->Data_model->display_profile_by_id($id);
            
            if(!empty($session_role) && $session_role == "HR"){
                
                $btn_submit = $this->input->post('edit');
                
                $this->load->view('hr/profile/edit', $data);
                
                if(isset($btn_submit)){
                    $firstname = $this->input->post('firstname');
                    $lastname = $this->input->post('lastname');
                    $telephone = $this->input->post('telephone');
                    $address1 = $this->input->post('address1');
                    $address2 = $this->input->post('address2');
                    $postcode = $this->input->post('postcode');
                    $city = $this->input->post('city');
                    $state = $this->input->post('state');
                    
                    $array = array(
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'telephone' => $telephone,
                        'address1' => $address1,
                        'address2' => $address2,
                        'postcode' => $postcode,
                        'city' => $city,
                        'state' => $state
                    );
                    
                    $update_user = $this->Data_model->update_profile_details($id, $array);
                    
                    if($update_user){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('profile'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Update Failed');
                            window.location.href="<?php echo site_url('profile'); ?>";
                        </script>
                <?php }
                }
                
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_image($id){
          $submit_btn = $this->input->post('submit_image');
          
          if(isset($submit_btn)){
              $files = $_FILES;
              $cpt1 = count($_FILES['fileToUpload']['name']);
        
              for($i=0; $i<$cpt1; $i++){
                $_FILES['fileToUpload']['name']= $files['fileToUpload']['name'][$i];
                $_FILES['fileToUpload']['type']= $files['fileToUpload']['type'][$i];
                $_FILES['fileToUpload']['tmp_name']= $files['fileToUpload']['tmp_name'][$i];
                $_FILES['fileToUpload']['error']= $files['fileToUpload']['error'][$i];
                $_FILES['fileToUpload']['size']= $files['fileToUpload']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "../uploads/profile/",
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite'     => TRUE,
                    'max_size'      => "3000",  // Can be set to particular file size
                    //'max_height'    => "768",
                    //'max_width'     => "1024"
                );
    
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
    
                $this->upload->do_upload('fileToUpload');
                $fileName = $_FILES['fileToUpload']['name'];
              }
              
              $update_array = array('photo' => $fileName);
    
              $update_image = $this->Data_model->update_profile_details($id, $update_array);
    
              if($update_image){ ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('profile'); ?>";
                </script>
          <?php
              }else{ ?>
                <script>
                    alert('Update Failed');
                    window.location.href="<?php echo site_url('profile/edit/'.$id); ?>";
                </script>
          <?php 
            }  
          }
        }
        
        public function delete_profile(){
           $id = $this->input->post('del_id');
           $this->Data_model->delete_profile($id); 
        }
    }

?>