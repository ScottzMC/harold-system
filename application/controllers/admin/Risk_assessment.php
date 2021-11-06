<?php 

    include_once(APPPATH."third_party/PhpWord/Autoloader.php");
    //include_once(APPPATH."core/Front_end.php");
    
    use PhpOffice\PhpWord\Autoloader;
    use PhpOffice\PhpWord\Settings;
    Autoloader::register();
    Settings::loadConfig(); 
    
    class Risk_assessment extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['risk_assessment'] = $this->Admin_model->display_all_risk_assessment();
                
                $this->load->view('admin/risk_assessment/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['risk_assessment'] = $this->Admin_model->display_risk_assessment_by_id($id);
                
                $this->load->view('admin/risk_assessment/detail', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_risk_assessment(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $time = time();
            $last_assessed = $this->input->post('last_assessed');
            $date = $this->input->post('created_date');
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'created_time' => $time,
                'last_assessed' => $last_assessed,
                'created_date' => $date
            );
            
            $insert_risk_assessment = $this->Admin_model->insert_risk_assessment($array);
            
            if($insert_risk_assessment){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('risk_assessment'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('risk_assessment'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_risk_assessment($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['risk_assessment'] = $this->Admin_model->display_risk_assessment_by_id($id);
                
                $this->load->view('admin/risk_assessment/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $time = time();
                    $last_assessed = $this->input->post('last_assessed');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_time' => $time,
                        'last_assessed' => $last_assessed,
                        'created_date' => $date
                    );
                    
                    $update_reminder = $this->Admin_model->update_risk_assessment_details($id, $array);
                    
                    if($update_reminder){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('risk_assessment'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('risk_assessment'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_risk_assessment(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_risk_assessment($id); 
        }
        
        public function download($id){
    		//$this->load->library('phpword');
    
    		$risk = $this->Admin_model->get_risk_assessment_by_id($id);
    
    		//  create new file and remove Compatibility mode from word title
    
    		$phpWord = new \PhpOffice\PhpWord\PhpWord();
    		$phpWord->getCompatibility()->setOoxmlVersion(14);
    		$phpWord->getCompatibility()->setOoxmlVersion(15);
    
    		$targetFile = "./uploads/";
    		$filename = 'risk_assessment.docx';
    
    		// add style settings for the title and paragraph
    		foreach($risk as $r){
    
    			$section = $phpWord->addSection();
    			$section->addText($r['title'], array('bold' => true,'underline' => 'single','name'=> 'arial','size' => 21,'color' =>'red'),array('align' => 'center', 'spaceAfter' => 10));
    			$section->addTextBreak(1);
    			/*if(!empty($r['ne_img'])){
    				$section->addImage($targetFile.$n['ne_img'], array('align' => 'center','width'=>200, 'height'=>200));
    			}*/
    			$section->addTextBreak(1);
    			$section->addText($r['body'], array('name'=> 'arial','size' => 14),array('align' => 'left', 'spaceAfter' => 100));
    			$section->addTextBreak(1);
    			//$section->addText($r['created_time'], array('name'=> 'arial','size' => 14));
    		}
    		
    		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    		$objWriter->save($filename);
    		// send results to browser to download
    		header('Content-Description: File Transfer');
    		header('Content-Type: application/octet-stream');
    		header('Content-Disposition: attachment; filename='.$filename);
    		header('Content-Transfer-Encoding: binary');
    		header('Expires: 0');
    		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    		header('Pragma: public');
    		header('Content-Length: ' . filesize($filename));
    		flush();
    		readfile($filename);
    		unlink($filename); // deletes the temporary file
    		exit;
    		//redirect('risk_assessment');
	    }
    }

?>