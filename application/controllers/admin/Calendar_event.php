<?php 
    
    class Calendar_event extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['calendar'] = $this->Admin_model->display_all_calendar_events();
                $data['appointment'] = $this->Admin_model->display_by_appointment_calendar_events();
                $data['meeting'] = $this->Admin_model->display_by_meeting_calendar_events();
                $data['todolist'] = $this->Admin_model->display_by_todolist_calendar_events();
                
                $this->load->view('admin/calendar_events/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_event(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $note = $this->input->post('note');
            $category = $this->input->post('category');
            $status = "Upcoming";
            $time = $this->input->post('event_time');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'note' => $note,
                'category' => $category,
                'status' => $status,
                'event_time' => $time,
                'created_date' => $date
            );
            
            $insert_event = $this->Admin_model->insert_calendar_events($array);
            
            if($insert_event){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('calendar_event'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('calendar_event'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_event($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['calendar'] = $this->Admin_model->display_calendar_events_by_id($id);
                
                $this->load->view('admin/calendar_events/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $note = $this->input->post('note');
                    $category = $this->input->post('category');
                    $status = $this->input->post('status');
                    $time = $this->input->post('event_time');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'note' => $note,
                        'category' => $category,
                        'status' => $status,
                        'event_time' => $time,
                        'created_date' => $date
                    );
                    
                    $update_event = $this->Admin_model->update_calendar_events_details($id, $array);
                    
                    if($update_event){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('calendar_event'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('calendar_event'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_calendar_event(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_calendar_event($id); 
        }
    }

?>