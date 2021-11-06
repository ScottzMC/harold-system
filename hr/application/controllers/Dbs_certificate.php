<?php 
    
    class Dbs_certificate extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['dbs_certificate'] = $this->Data_model->display_all_dbs_certificate();
                
                $this->load->view('hr/dbs_certificate/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_dbs_certificate(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $time = time();
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
                    'upload_path'   => "../uploads/dbs_certificate/",
                    //'upload_path'   => "./uploads/../../uploads/community/",
                    'allowed_types' => "jpg|png|pdf|docx|doc|xlsx",
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
                'title' => $title,
                'body' => $body,
                'document' => $fileName,
                'created_time' => $time,
                'created_date' => $date
            ); 
            
            $insert_dbs = $this->Data_model->insert_dbs_certificate($array);
            
            if($insert_dbs){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('dbs_certificate'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('dbs_certificate'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_dbs_certificate($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['dbs_certificate'] = $this->Data_model->display_dbs_certificate_by_id($id);
                
                $this->load->view('hr/dbs_certificate/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $time = time();
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
                            'upload_path'   => "../uploads/dbs_certificate/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|pdf|docx|doc|xlsx",
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
                        'title' => $title,
                        'body' => $body,
                        'document' => $fileName,
                        'created_time' => $time,
                        'created_date' => $date
                    ); 
                    
                    $update_dbs = $this->Data_model->update_dbs_certificate($id, $array);
                    
                    if($update_dbs){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('dbs_certificate'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('dbs_certificate'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_dbs_certificate(){
           $id = $this->input->post('del_id');
           $this->Data_model->delete_dbs_certificate($id); 
        }
        
        public function download($id){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT document FROM dbs_certificate WHERE id = '$id' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/dbs_certificate/'.$qry->document;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
    }

?>