<?php 
    
    class Reminder extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reminder'] = $this->Admin_model->display_all_reminders();
                
                $this->load->view('admin/reminder/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_reminder(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $status = "Upcoming";
            $time = $this->input->post('reminder_time');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'status' => $status,
                'reminder_time' => $time,
                'created_date' => $date
            );
            
            $insert_reminder = $this->Admin_model->insert_reminders($array);
            $send_reminder = $this->send_mail($title, $body, $status, $time, $date);
            
            if($insert_reminder && $send_reminder){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('reminder'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('reminder'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_reminder($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reminder'] = $this->Admin_model->display_reminders_by_id($id);
                
                $this->load->view('admin/reminder/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $status = $this->input->post('status');
                    $time = $this->input->post('reminder_time');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'status' => $status,
                        'reminder_time' => $time,
                        'created_date' => $date
                    );
                    
                    $update_reminder = $this->Admin_model->update_reminders_details($id, $array);
                    
                    if($update_reminder){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('reminder'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('reminder'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_reminder(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_reminders($id); 
        }
        
        public function send_mail($title, $body, $status, $time, $date){
          $email = $this->session->userdata('uemail');
          
          $subject = "Reminder Notification";
          $body = " This is a reminder that has been sent to your mail and has the following details below: 
            The Reminder title - $title, 
            The Reminder description - $body,
            The status of Reminder - $status,
            The time of Reminder - $time,
            The date Reminder was added - $date";

          $config = Array(
         'protocol' => 'smtp',
         'smtp_host' => 'smtp.scottnnaghor.com',
         'smtp_port' => 25,
         'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
         'smtp_pass' => 'TigerPhenix100', // change it to account email password
         'mailtype' => 'html',
         'charset' => 'iso-8859-1',
         'wordwrap' => TRUE
         );

         $this->load->library('email', $config);
         //$this->load->library('encrypt');
         $this->email->from('admin@scottnnaghor.com', "Harold Team");
         $this->email->to("$email");
         //$this->email->cc("testcc@domainname.com");
         $this->email->subject("$subject");
         $this->email->message("$body");
         $this->email->send();
        }
    }

?>