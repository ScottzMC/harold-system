<?php 
    
    class Discipline extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['discipline'] = $this->Data_model->display_all_disciplinaries();

                $this->load->view('hr/discipline/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_discipline(){
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $time = time();
            $date = $this->input->post('created_date');
            
            $array = array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'title' => $title,
                'body' => $body,
                'created_time' => $time,
                'created_date' => $date
            );
            
            $insert_discipline = $this->Data_model->insert_disciplinaries($array);
            
            if($insert_discipline){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('discipline'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('discipline'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_discipline($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['discipline'] = $this->Data_model->display_disciplinaries_by_id($id);

                $this->load->view('hr/discipline/edit', $data);
                
                if(isset($btn_submit)){
                    $firstname = $this->input->post('firstname');
                    $lastname = $this->input->post('lastname');
                    $email = $this->input->post('email');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $time = time();
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'email' => $email,
                        'title' => $title,
                        'body' => $body,
                        'created_time' => $time,
                        'created_date' => $date
                    );
                    
                    $update_discipline = $this->Data_model->update_disciplinaries($id, $array);
                    
                    if($update_discipline){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('discipline'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('discipline'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_discipline(){
           $id = $this->input->post('del_id');
           $this->Data_model->delete_disciplinaries($id); 
        }
    }

?>