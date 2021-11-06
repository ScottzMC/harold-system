<?php 

    class Account extends CI_Controller{
        
        public function login(){
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
          
            $form_valid = $this->form_validation->run();
            $submit_btn = $this->input->post('login');
            
            if($form_valid == FALSE){
                //$data['menu'] = $this->Data_model->display_menu_options();
                
                $this->load->view('hr/account/login');
            }
            
            if(isset($submit_btn)){
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $time = time();
                $date = date('Y-m-d H:i:s');
                
                $query = $this->db->query("SELECT email FROM users WHERE email = '$email'")->result();
                foreach($query as $qry){
                    $query_email = $qry->email;
                }
                
                $uresult = $this->Data_model->validate($email, $password);
                if(count($uresult) > 0){
                  $sess_data = array(
                  'login' => TRUE,
                  'uid' => $uresult[0]->id,
                  'uemail' => $uresult[0]->email,
                  'ufirstname' => $uresult[0]->firstname,
                  'ulastname' => $uresult[0]->lastname,
                  'urole' => $uresult[0]->role
                 );
        
                  $this->session->set_userdata($sess_data);
                  $status = $this->session->userdata('ustatus'); 
                  
                  $array = array(
                    'logged_in_time' => $time,
                    'logged_in_date' => $date
                  );
                  
                  $this->Data_model->update_login_activity($email, $array);
                ?>
                  <script>
                      alert('Login successfully');
                      window.location.href="<?php echo site_url('dashboard'); ?>";
                  </script> 
                  <?php
                  /*if(isset($_SERVER['HTTP_REFERER'])){
                    redirect($_SERVER['HTTP_REFERER']);
                  }*/
              }else if(empty($query_email)){
                $statusMsg = '<span class="text-danger">Email needs to be activated!</span>';
                $this->session->set_flashdata('msgError', $statusMsg);
                
                //$data['menu'] = $this->Data_model->display_menu_options();
                $this->load->view('hr/account/login');  
              }else{
                $statusMsg = '<span class="text-danger">Wrong Email-ID or Password!</span>';
                $this->session->set_flashdata('msgError', $statusMsg);
                
                //$data['menu'] = $this->Data_model->display_menu_options();
                $this->load->view('hr/account/login');
               }
            }
        }
        
        /*public function register(){
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
          
            $form_valid = $this->form_validation->run();
            $submit_btn = $this->input->post('register');
            
            if($form_valid == FALSE){
                //$data['menu'] = $this->Data_model->display_menu_options();

                $this->load->view('admin/account/register');
            }
            
            if(isset($submit_btn)){
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $hashed_password = $this->bcrypt->hash_password($password);
                
                $shuffle = "ABCDEFGHZXCQWE";
                $unique = rand(000, 999);
                $code = $shuffle.$unique;
                
                $role = "Admin";
                //$status = "Deactivated";
                $time = time();
                $date = date('Y-m-d H:i:s');
                
                /*$subject = "Activate your Account";
                  $body = "
                    Welcome to FastFood and thank you for registering an account. Upon clicking the link, your account would be activated,
                    Your email is - $email
                    please click the link to activate the account - https://scottnnaghor.com/fastfood/account/activate_user/$code";
                  $time = time();
                  $date = date('Y-m-d H:i:s');
        
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
                 $this->email->from('admin@scottnnaghor.com', "FastFood Team");
                 $this->email->to("$email");
                 //$this->email->cc("testcc@domainname.com");
                 $this->email->subject("$subject");
                 $this->email->message("$body"); 
                
                $register_array = array(
                    //'code' => $code,
                    'firstname' => "FirstName",
                    'lastname' => "LastName",
                    'email' => $email,
                    'password' => $hashed_password,
                    'role' => $role,
                    //'status' => $status,
                    'created_time' => $time,
                    'created_date' => $date
                );
                
                $array = array('email' => $email);
                
                $add_user = $this->Admin_model->create_user($register_array);

                if($add_user){ ?>
                    <script>
                        alert('Account has been created successfully.');
                        window.location.href="<?php echo site_url('account/login'); ?>";
                    </script>
          <?php }else{ ?>
                   <script>
                        alert('Account has not been created');
                    </script> 
          <?php }
            }
        }*/
        
        public function logout(){
          // destroy session
          $data = array('login' => '', 'uid' => '', 'ufirstname' => '', 'ulastname' => '', 'uemail' => '', 'urole' => '');
          $this->session->unset_userdata($data);
          $this->session->sess_destroy();
          redirect('account/login');
        }
    }

?>