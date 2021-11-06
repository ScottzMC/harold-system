<?php 
    
    class Reference extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['reference'] = $this->Data_model->display_all_reference();
                
                $this->load->view('hr/reference/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_reference(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $time = time();
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'created_time' => $time,
                'created_date' => $date
            ); 
            
            $insert_reference = $this->Data_model->insert_reference($array);
            
            if($insert_reference){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('reference'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('reference'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_reference($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['reference'] = $this->Data_model->display_reference_by_id($id);
                
                $this->load->view('hr/reference/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $time = time();
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'document' => $fileName,
                        'created_time' => $time,
                        'created_date' => $date
                    ); 
                    
                    $update_reference = $this->Data_model->update_reference($id, $array);
                    
                    if($update_reference){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('reference'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('reference'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_reference(){
           $id = $this->input->post('del_id');
           $this->Data_model->delete_reference($id); 
        }
    
    }

?>