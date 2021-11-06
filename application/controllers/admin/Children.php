<?php 
    
    class Children extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_all_children();
                
                $this->load->view('admin/children/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function detail($code){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_by_code($code);
                $data['social_worker'] = $this->Admin_model->display_social_worker_by_code($code);
                $data['medical'] = $this->Admin_model->display_medical_report_by_code($code);
                $data['education'] = $this->Admin_model->display_education_report_by_code($code);
                $data['finance'] = $this->Admin_model->display_finance_information_by_code($code);
                $data['foster_care'] = $this->Admin_model->display_foster_care_by_code($code);
                $data['disciplinaries'] = $this->Admin_model->display_disciplinaries_by_code($code);
                $data['incidents'] = $this->Admin_model->display_incidents_by_code($code);
                $data['absences'] = $this->Admin_model->display_absences_by_code($code);
                $data['sanction'] = $this->Admin_model->display_sanction_rewards_by_code($code);
                $data['abilities'] = $this->Admin_model->display_abilities_evaluation_by_code($code);
                $data['keywork_session'] = $this->Admin_model->display_keywork_session_by_code($code);
                $data['supervision_action'] = $this->Admin_model->display_supervision_action_by_code($code);
                $data['case_recording'] = $this->Admin_model->display_case_recording_by_code($code);
                $data['health_information'] = $this->Admin_model->display_health_information_by_code($code);
                $data['visitor_logs'] = $this->Admin_model->display_visitor_logs_by_code($code);
                
                $data['count_disciplinaries'] = $this->Admin_model->count_displinaries($code);
                $data['count_incidents'] = $this->Admin_model->count_incidents($code);
                $data['count_absences'] = $this->Admin_model->count_absences($code);
                $data['count_sanction'] = $this->Admin_model->count_children_sanction_rewards($code);
                
                $btn_incident = $this->input->post('send_incident');
                
                if(isset($btn_incident)){
                    $fullname = $this->input->post('fullname');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $this->send_incident_mail($fullname, $title, $body, $date); ?>
                    <script>
                        alert('Sent to Mail');
                        window.location.href="<?php echo site_url('children/detail/'.$code); ?>";
                    </script>
          <?php }

                $this->load->view('admin/children/detail', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_children(){
            $shuffle = str_shuffle("ABCDTUVXY");
            $unique = rand(000, 999);
            $code = $shuffle.$unique;
            
            $fullname = $this->input->post('fullname');
            $age = $this->input->post('age');
            $email = $this->input->post('email');
            $dob = $this->input->post('dob');
            $child_status = $this->input->post('child_status');
            $induction = $this->input->post('induction');
            $complaint = $this->input->post('complaint');
            $gender = $this->input->post('gender');
            $ethnic = $this->input->post('ethnic');
            $support_hours = $this->input->post('support_hours');
            $move_in_out = $this->input->post('move_in_out');
            $house_name = $this->input->post('house_name');
            $address = $this->input->post('address');
            $guardian_fullname = $this->input->post('guardian_fullname');
            $guardian_email = $this->input->post('guardian_email');
            $guardian_telephone = $this->input->post('guardian_telephone');
            $guardian_address = $this->input->post('guardian_address');
            $guardian = $this->input->post('guardian');
            $telephone = $this->input->post('telephone');
            $date = $this->input->post('created_date');
            
            $files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);
    
              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/children/",
                    //'upload_path'   => "./uploads/../../uploads/community/",
                    'allowed_types' => "jpg|png",
                    'overwrite'     => TRUE,
                    'max_size'      => "30000",  // Can be set to particular file size
                    //'max_height'    => "768",
                    //'max_width'     => "1024"
                );
    
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
    
                $this->upload->do_upload('userFiles1');
                $fileName = str_replace(' ', '_', $_FILES['userFiles1']['name']);
              }
            
            $array = array(
                'code' => $code,
                'fullname' => $fullname,
                'email' => $email,
                'age' => $age,
                'dob' => $dob,
                'child_status' => $child_status,
                'support_hours' => $support_hours,
                'move_in_out' => $move_in_out,
                'induction' => $induction,
                'complaint' => $complaint,
                'gender' => $gender,
                'ethnic' => $ethnic,
                'address' => $address,
                'telephone' => $telephone,
                'guardian' => $guardian,
                'house_name' => $house_name,
                'image' => $fileName,
                'guardian_fullname' => $guardian_fullname,
                'guardian_email' => $guardian_email,
                'guardian_telephone' => $guardian_telephone,
                'guardian_address' => $guardian_address,
                'created_date' => $date
            );
            
            $add_array = array(
                'code' => $code,
                'created_date' => $date
            );
            
            $insert_children = $this->Admin_model->insert_children($array);
            $insert_medical_history = $this->Admin_model->insert_medical_history($add_array);
            $insert_personal_education = $this->Admin_model->insert_education_report($add_array);
            $insert_finance_information = $this->Admin_model->insert_finance_information($add_array);
            $insert_disciplinaries = $this->Admin_model->insert_disciplinaries($add_array);
            $insert_incidents = $this->Admin_model->insert_incidents($add_array);
            $insert_absences = $this->Admin_model->insert_absences($add_array);
            $insert_sanction = $this->Admin_model->insert_children_sanction_rewards($add_array);
            $insert_abilities = $this->Admin_model->insert_abilities_evaluation($add_array);
            $insert_keywork = $this->Admin_model->insert_keywork_session($add_array);
            $insert_supervision = $this->Admin_model->insert_supervision_action($add_array);
            $insert_case = $this->Admin_model->insert_case_recording($add_array);
            $insert_health = $this->Admin_model->insert_health_information($add_array);
            $insert_visitor = $this->Admin_model->insert_children_visitor_logs($add_array);
            
            if($insert_children && $insert_medical_history && $insert_personal_education && $insert_finance_information && $insert_disciplinaries && $insert_incidents
            && $insert_absences && $insert_sanction && $insert_abilities && $insert_keywork && $insert_supervision && $insert_case && $insert_health && $insert_visitor){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('children'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('children'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_children($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_by_code($code);
                $data['medical'] = $this->Admin_model->display_medical_report_by_code($code);
                $data['education'] = $this->Admin_model->display_education_report_by_code($code);
                $data['finance'] = $this->Admin_model->display_finance_information_by_code($code);
                $data['foster_care'] = $this->Admin_model->display_foster_care_by_code($code);
                $data['abilities'] = $this->Admin_model->display_abilities_evaluation_by_code($code);
                $data['keywork_session'] = $this->Admin_model->display_keywork_session_by_code($code);
                $data['supervision_action'] = $this->Admin_model->display_supervision_action_by_code($code);
                $data['case_recording'] = $this->Admin_model->display_case_recording_by_code($code);
                $data['health_information'] = $this->Admin_model->display_health_information_by_code($code);
                $data['visitor_logs'] = $this->Admin_model->display_visitor_logs_by_code($code);
                
                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $fullname = $this->input->post('fullname');
                    $age = $this->input->post('age');
                    $dob = $this->input->post('dob');
                    $child_status = $this->input->post('child_status');
                    $induction = $this->input->post('induction');
                    $complaint = $this->input->post('complaint');
                    $ethnic = $this->input->post('ethnic');
                    $support_hours = $this->input->post('support_hours');
                    $move_in_out = $this->input->post('move_in_out');
                    $gender = $this->input->post('gender');
                    $house_name = $this->input->post('house_name');
                    $address = $this->input->post('address');
                    $guardian_fullname = $this->input->post('guardian_fullname');
                    $guardian_email = $this->input->post('guardian_email');
                    $guardian_telephone = $this->input->post('guardian_telephone');
                    $guardian_address = $this->input->post('guardian_address');
                    $guardian = $this->input->post('guardian');
                    $telephone = $this->input->post('telephone');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'fullname' => $fullname,
                        'age' => $age,
                        'dob' => $dob,
                        'child_status' => $child_status,
                        'support_hours' => $support_hours,
                        'move_in_out' => $move_in_out,
                        'induction' => $induction,
                        'complaint' => $complaint,
                        'ethnic' => $ethnic,
                        'gender' => $gender,
                        'address' => $address,
                        'telephone' => $telephone,
                        'guardian' => $guardian,
                        'house_name' => $house_name,
                        'guardian_fullname' => $guardian_fullname,
                        'guardian_email' => $guardian_email,
                        'guardian_telephone' => $guardian_telephone,
                        'guardian_address' => $guardian_address,
                        'created_date' => $date
                    );
                    
                    $update_children = $this->Admin_model->update_children_by_code($code, $array);
                    
                    if($update_children){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_children_image($code){
              $files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);
    
              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/children/",
                    //'upload_path'   => "./uploads/../../uploads/community/",
                    'allowed_types' => "jpg|png",
                    'overwrite'     => TRUE,
                    'max_size'      => "30000",  // Can be set to particular file size
                    //'max_height'    => "768",
                    //'max_width'     => "1024"
                );
    
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
    
                $this->upload->do_upload('userFiles1');
                $fileName = str_replace(' ', '_', $_FILES['userFiles1']['name']);
              }
            
            $array = array(
                'image' => $fileName,
            ); 
            
            $update_image = $this->Admin_model->update_children_image($code, $array);
            
            if($update_image){ ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('children'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('children'); ?>";
                </script> 
      <?php }
        }
        
        public function delete_children(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_children($id); 
        }
        
        // Social Worker 
        
        public function add_social_worker(){
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $fullname = $this->input->post('fullname');
                    $email = $this->input->post('email');
                    $mobile = $this->input->post('mobile');
                    $address = $this->input->post('address');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'children_code' => $code,
                        'fullname' => $fullname,
                        'email' => $email,
                        'mobile' => $mobile,
                        'address' => $address,
                        'created_date' => $date
                    );
                    
                    $insert_social_worker = $this->Admin_model->insert_social_worker($array);
                    
                    if($insert_social_worker){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_social_worker($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['social_worker'] = $this->Admin_model->display_social_worker_by_code_and_id($id, $code);

                $this->load->view('admin/children/edit_social_worker', $data);
                
                if(isset($btn_submit)){
                    $fullname = $this->input->post('fullname');
                    $email = $this->input->post('email');
                    $mobile = $this->input->post('mobile');
                    $address = $this->input->post('address');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'fullname' => $fullname,
                        'email' => $email,
                        'mobile' => $mobile,
                        'address' => $address,
                        'created_date' => $date
                    );
                    
                    $update_social_worker = $this->Admin_model->update_social_worker($id, $code, $array);
                    
                    if($update_social_worker){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_social_worker(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_social_worker($id); 
        }
        
        // End of Social Worker
        
        // Medical History
        
        public function edit_medical_history($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['medical'] = $this->Admin_model->display_medical_report_by_code($code);

                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_medical_history = $this->Admin_model->update_medical_history_details($code, $array);
                    
                    if($update_medical_history){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_medical_history(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_medical_history($id); 
        }
        
        // End of Medical History
        
        // Personal Education 
        
        public function edit_personal_education($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['education'] = $this->Admin_model->display_education_report_by_code($code);

                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_education = $this->Admin_model->update_education_report_details($code, $array);
                    
                    if($update_education){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_personal_education(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_personal_education($id); 
        }
        
        // End of Personal Education
        
        // Finance Information 
        
        public function edit_finance_information($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['finance'] = $this->Admin_model->display_finance_information_by_code($code);

                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_finance = $this->Admin_model->update_finance_information_details($code, $array);
                    
                    if($update_finance){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_finance_information(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_finance_information($id); 
        }
        
        // End of Finance Information
        
        // Foster Care
        
        public function edit_foster_care($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['foster_care'] = $this->Admin_model->display_foster_care_by_code($code);

                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_foster = $this->Admin_model->update_foster_care($code, $array);
                    
                    if($update_foster){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_foster_care(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_foster_care($id); 
        }
        
        // End of Foster Care 
        
        // Disciplinaries 
        
        public function add_disciplinaries(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_disciplinaries = $this->Admin_model->insert_disciplinaries($array);
                    
                    if($insert_disciplinaries){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_disciplinaries($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['disciplinaries'] = $this->Admin_model->display_disciplinaries_by_code_and_id($id, $code);

                $this->load->view('admin/children/edit_disciplinaries', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_disciplinaries = $this->Admin_model->update_disciplinaries($id, $code, $array);
                    
                    if($update_disciplinaries){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_disciplinaries(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_disciplinaries($id); 
        }
        
        // End of Disciplinaries 
        
        // Incidents 
        
        public function add_incidents(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_incidents = $this->Admin_model->insert_incidents($array);
                    
                    if($insert_incidents){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_incidents($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['incidents'] = $this->Admin_model->display_incidents_by_code_and_id($id, $code);

                $this->load->view('admin/children/edit_incident', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_incidents = $this->Admin_model->update_incidents($id, $code, $array);
                    
                    if($update_incidents){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_incidents(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_incidents($id); 
        }
        
        // End of Incidents 
        
        // Absences 
        
        public function add_absences(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_absences = $this->Admin_model->insert_absences($array);
                    
                    if($insert_absences){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_absences($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['absences'] = $this->Admin_model->display_absences_by_code_and_id($id, $code);

                $this->load->view('admin/children/edit_absences', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_absences = $this->Admin_model->update_absences($id, $code, $array);
                    
                    if($update_absences){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_absences(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_absences($id); 
        }
        
        // End of Absences
        
        // Sanction Rewards 
        
        public function add_sanction_rewards(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_sanction_rewards = $this->Admin_model->insert_children_sanction_rewards($array);
                    
                    if($insert_sanction_rewards){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_sanction_rewards($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['sanction'] = $this->Admin_model->display_children_sanction_rewards_by_code_and_id($id, $code);

                $this->load->view('admin/children/edit_sanction_rewards', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_sanction_rewards = $this->Admin_model->update_children_sanction_rewards($id, $code, $array);
                    
                    if($update_sanction_rewards){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_sanction_rewards(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_sanction_rewards($id); 
        }
        
        // End of Sanction Rewards
        
        // Abilities Evaluation 
        
        public function add_abilities_evaluation(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_abilities_evaluation = $this->Admin_model->insert_abilities_evaluation($array);
                    
                    if($insert_abilities_evaluation){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_abilities_evaluation($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['abilities'] = $this->Admin_model->display_abilities_evaluation_by_code($code);

                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_abilities_evaluation = $this->Admin_model->update_abilities_evaluation($code, $array);
                    
                    if($update_abilities_evaluation){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_abilities_evaluation(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_abilities_evaluation($id); 
        }
        
        // End of Abilities Evaluation
        
        // Keywork Session 
        
        public function add_keywork_session(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_keywork_session = $this->Admin_model->insert_keywork_session($array);
                    
                    if($insert_keywork_session){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_keywork_session($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['keywork_session'] = $this->Admin_model->display_keywork_session_by_code($code);

                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_keywork_session = $this->Admin_model->update_keywork_session($code, $array);
                    
                    if($update_keywork_session){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_keywork_session(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_keywork_session($id); 
        }
        
        // End of Keywork Session
        
        // Supervision Action 
        
        public function add_supervision_action(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_supervision_action = $this->Admin_model->insert_supervision_action($array);
                    
                    if($insert_supervision_action){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_supervision_action($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['supervision_action'] = $this->Admin_model->display_supervision_action_by_code($code);

                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_supervision_action = $this->Admin_model->update_supervision_action($code, $array);
                    
                    if($update_supervision_action){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_supervision_action(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_supervision_action($id); 
        }
        
        // End of Supervision Action
        
        // Case Recording 
        
        public function add_case_recording(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_case_recording = $this->Admin_model->insert_case_recording($array);
                    
                    if($insert_case_recording){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_case_recording($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['case_recording'] = $this->Admin_model->display_case_recording_by_code($code);

                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_case_recording = $this->Admin_model->update_case_recording($code, $array);
                    
                    if($update_case_recording){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_case_recording(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_case_recording($id); 
        }
        
        // End of Case Recording
        
        // Health Information 
        
        public function add_health_information(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_health_information = $this->Admin_model->insert_health_information($array);
                    
                    if($insert_health_information){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_health_information($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['health_information'] = $this->Admin_model->display_health_information_by_code($code);

                $this->load->view('admin/children/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_health_information = $this->Admin_model->update_health_information($code, $array);
                    
                    if($update_health_information){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_health_information(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_health_information($id); 
        }
        
        // End of Health Information
        
        // Visitor Logs 
        
        public function add_visitor_logs(){
            $data['printout'] = $this->Admin_model->display_all_children_report();
            $data['children'] = $this->Admin_model->display_all_children();
                
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){

                $this->load->view('admin/children/view', $data);
                
                if(isset($btn_submit)){
                    $code = $this->input->post('code');
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $insert_visitor_logs = $this->Admin_model->insert_children_visitor_logs($array);
                    
                    if($insert_visitor_logs){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('children'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit_visitor_logs($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Admin_model->display_children_report_by_code($code);
                $data['visitor_logs'] = $this->Admin_model->display_children_visitor_logs_by_code_and_id($id, $code);

                $this->load->view('admin/children/edit_visitor_logs', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update_visitor_logs = $this->Admin_model->update_children_visitor_logs($id, $code, $array);
                    
                    if($update_visitor_logs){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script>
                  <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('children'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_visitor_logs(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_visitor_logs($id); 
        }
        
        // End of Visitor Logs
        
        public function send_incident_mail($fullname, $title, $body, $date){
          $email = $this->session->userdata('uemail');
          
          $subject = "Children Incident";
          $body = " This is $fullname incident that has been sent to your mail and has the following details below: 
            The Incident Fullname - $fullname, 
            The Incident Title - $title,
            The Incident - $body,
            The date Incident was added - $date";

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