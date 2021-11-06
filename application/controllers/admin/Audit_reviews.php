<?php 
    
    class Audit_reviews extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['audit_reviews'] = $this->Admin_model->display_all_audit_reviews();
                
                $this->load->view('admin/audit_reviews/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_audit_reviews(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $performed_by = $this->input->post('performed_by');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'performed_by' => $performed_by,
                'created_date' => $date
            );
            
            $insert_audit_reviews = $this->Admin_model->insert_audit_reviews($array);
            
            if($insert_audit_reviews){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('audit_reviews'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('audit_reviews'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_audit_reviews($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['audit_reviews'] = $this->Admin_model->display_audit_reviews_by_id($id);
                
                $this->load->view('admin/audit_reviews/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $performed_by = $this->input->post('performed_by');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'performed_by' => $performed_by,
                        'created_date' => $date
                    );
                    
                    $update_audit_reviews = $this->Admin_model->update_audit_reviews_details($id, $array);
                    
                    if($update_audit_reviews){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('audit_reviews'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('audit_reviews'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_audit_reviews(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_audit_reviews($id); 
        }
    }

?>