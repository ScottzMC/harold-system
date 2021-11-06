<?php 
    
    class Sanction_report extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['sanction_report'] = $this->Admin_model->display_all_sanction_report();
                $data['children'] = $this->Admin_model->display_all_children();

                $this->load->view('admin/sanction_report/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_sanction_report(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $child_name = $this->input->post('child_name');
            $house_name = $this->input->post('house_name');
            $disciplinary_date = $this->input->post('disciplinary_date');
            $action_taken = $this->input->post('action_taken');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'child_name' => $child_name,
                'house_name' => $house_name,
                'disciplinary_date' => $disciplinary_date,
                'action_taken' => $action_taken,
                'created_date' => $date
            );
            
            $insert_sanction = $this->Admin_model->insert_sanction_report($array);
            
            if($insert_sanction){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('sanction_report'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('sanction_report'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_sanction_report($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['sanction_report'] = $this->Admin_model->display_sanction_report_by_id($id);
                $data['children'] = $this->Admin_model->display_all_children();

                $this->load->view('admin/sanction_report/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $child_name = $this->input->post('child_name');
                    $house_name = $this->input->post('house_name');
                    $disciplinary_date = $this->input->post('disciplinary_date');
                    $action_taken = $this->input->post('action_taken');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'child_name' => $child_name,
                        'house_name' => $house_name,
                        'disciplinary_date' => $disciplinary_date,
                        'action_taken' => $action_taken,
                        'created_date' => $date
                    );
                    
                    $update_sanction = $this->Admin_model->update_sanction_report_details($id, $array);
                    
                    if($update_sanction){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('sanction_report'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('sanction_report'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_sanction_report(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_sanction_report($id); 
        }
    }

?>