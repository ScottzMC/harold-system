<?php

    include_once(APPPATH."third_party/PhpWord/Autoloader.php");
    //include_once(APPPATH."core/Front_end.php");
    
    use PhpOffice\PhpWord\Autoloader;
    use PhpOffice\PhpWord\Settings;
    Autoloader::register();
    Settings::loadConfig();
    
    class Support_plan extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['support_plan'] = $this->Admin_model->display_all_support_plan();
                
                $this->load->view('admin/support_plan/view', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['support_plan'] = $this->Admin_model->display_support_plan_by_id($id);
                
                $this->load->view('admin/support_plan/detail', $data);
            }else{
                redirect('account/login');    
            }
        }
        
        public function add_support_plan(){
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
            
            $insert_support_plan = $this->Admin_model->insert_support_plan($array);
            
            if($insert_support_plan){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('support_plan'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('support_plan'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_support_plan($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['support_plan'] = $this->Admin_model->display_support_plan_by_id($id);
                
                $this->load->view('admin/support_plan/edit', $data);
                
                if(isset($btn_submit)){
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
                    
                    $update_support_plan = $this->Admin_model->update_support_plan_details($id, $array);
                    
                    if($update_support_plan){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('support_plan'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('support_plan'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete_support_plan(){
           $id = $this->input->post('del_id');
           $this->Admin_model->delete_support_plan($id); 
        }
        
        public function download_file($id){
            $support = $this->Admin_model->get_support_plan_by_id($id);
    
    		//  create new file and remove Compatibility mode from word title
    
    		$phpWord = new \PhpOffice\PhpWord\PhpWord();
    		$phpWord->getCompatibility()->setOoxmlVersion(14);
    		$phpWord->getCompatibility()->setOoxmlVersion(15);
    
    		$targetFile = "./uploads/";
    		$filename = 'support_plan.docx';
    
    		// add style settings for the title and paragraph
    		foreach($support as $s){
    
    			$section = $phpWord->addSection();
    			$section->addText($s['title'], array('bold' => true,'underline' => 'single','name'=> 'arial','size' => 21,'color' =>'red'),array('align' => 'center', 'spaceAfter' => 10));
    			$section->addTextBreak(1);
    			/*if(!empty($r['ne_img'])){
    				$section->addImage($targetFile.$n['ne_img'], array('align' => 'center','width'=>200, 'height'=>200));
    			}*/
    			$section->addTextBreak(1);
    			$section->addText($s['body'], array('name'=> 'arial','size' => 14),array('align' => 'left', 'spaceAfter' => 100));
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
        }
        
        public function download()  {
    		//$this->load->library('phpword');
    
    		$support = $this->Admin_model->get_support_plan();
    
    		//  create new file and remove Compatibility mode from word title
    
    		$phpWord = new \PhpOffice\PhpWord\PhpWord();
    		$phpWord->getCompatibility()->setOoxmlVersion(14);
    		$phpWord->getCompatibility()->setOoxmlVersion(15);
    
    		$targetFile = "./uploads/";
    		$filename = 'support_plan.docx';
    
    		// add style settings for the title and paragraph
    		foreach($support as $s){
    
    			$section = $phpWord->addSection();
    			$section->addText($s['title'], array('bold' => true,'underline' => 'single','name'=> 'arial','size' => 21,'color' =>'red'),array('align' => 'center', 'spaceAfter' => 10));
    			$section->addTextBreak(1);
    			/*if(!empty($r['ne_img'])){
    				$section->addImage($targetFile.$n['ne_img'], array('align' => 'center','width'=>200, 'height'=>200));
    			}*/
    			$section->addTextBreak(1);
    			$section->addText($s['body'], array('name'=> 'arial','size' => 14),array('align' => 'left', 'spaceAfter' => 100));
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