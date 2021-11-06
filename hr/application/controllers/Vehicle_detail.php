<?php 
    
    class Vehicle_detail extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['vehicle'] = $this->Data_model->display_all_vehicle_detail();

                $this->load->view('hr/vehicle_detail/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_vehicle_detail(){
            $vehicle_owner = $this->input->post('vehicle_owner');
            $vehicle = $this->input->post('vehicle');
            $vehicle_model = $this->input->post('vehicle_model');
            $vehicle_number = $this->input->post('vehicle_number');
            $insurance = $this->input->post('insurance');
            $time = time();
            $date = $this->input->post('created_date');
            
            $array = array(
                'vehicle_owner' => $vehicle_owner,
                'vehicle' => $vehicle,
                'vehicle_model' => $vehicle_model,
                'vehicle_number' => $vehicle_number,
                'insurance' => $insurance,
                'created_time' => $time,
                'created_date' => $date
            );
            
            $insert_vehicle = $this->Data_model->insert_vehicle_detail($array);
            
            if($insert_vehicle){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('vehicle_detail'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('vehicle_detail'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_vehicle_detail($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['vehicle'] = $this->Data_model->display_vehicle_detail_by_id($id);

                $this->load->view('hr/vehicle_detail/edit', $data);
                
                if(isset($btn_submit)){
                    $vehicle_owner = $this->input->post('vehicle_owner');
                    $vehicle = $this->input->post('vehicle');
                    $vehicle_model = $this->input->post('vehicle_model');
                    $vehicle_number = $this->input->post('vehicle_number');
                    $insurance = $this->input->post('insurance');
                    $time = time();
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'vehicle_owner' => $vehicle_owner,
                        'vehicle' => $vehicle,
                        'vehicle_model' => $vehicle_model,
                        'vehicle_number' => $vehicle_number,
                        'insurance' => $insurance,
                        'created_time' => $time,
                        'created_date' => $date
                    );
                    
                    $update_vehicle = $this->Data_model->update_vehicle_detail($id, $array);
                    
                    if($update_vehicle){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('vehicle_detail'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('vehicle_detail'); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_vehicle_detail(){
           $id = $this->input->post('del_id');
           $this->Data_model->delete_vehicle_detail($id); 
        }
    }

?>