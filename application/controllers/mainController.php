<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{    $this->load->model('dbModel');
    
		
	$data['message']=$this->dbModel->getMessages();
	$datam['messagem']=$this->dbModel->getbeatDetails();
	$datasome['messagemsome']=$this->dbModel->getsomebeatDetails();
	$alldata=array_merge($data,$datam,$datasome);
		$this->load->view('welcome_message',$alldata);
	}

public function sendMessage(){
	$this->load->library('form_validation');
	$this->form_validation->set_rules('name','Names','required|trim|alpha');
	$this->form_validation->set_rules('email','Email','required|trim|valid_email');
	$this->form_validation->set_rules('comments','Comments','required|trim');
	 
	   
	 
	if($this->form_validation->run()){
        $this->load->model('dbModel');
        $this->load->helper('security');
		$datam['messagem']=$this->dbModel->getbeatDetails();
		$datasome['messagemsome']=$this->dbModel->getsomebeatDetails();
	 $data=array(
		'message'=>$this->input->post('comments',TRUE),
		'email'=>$this->input->post('email',TRUE),
		);
		$this->dbModel->insertAll($data);
		$data['message']=$this->dbModel->getMessages();
    
       $alldata=array_merge($data,$datam,$datasome);
		$this->load->view('welcome_message',$alldata);
		}
		else{
			$datam['messagem']=$this->dbModel->getbeatDetails();
			$datasome['messagemsome']=$this->dbModel->getsomebeatDetails();
              $data=array(
    'message'=>''
    );    $data['message']=$this->dbModel->getMessages();
    
        $alldata=array($data,$datam,$datasome);
		$this->load->view('welcome_message',$alldata);
			}
}

  public function mysodiqadmin(){
      $error = array('error' =>'');
      
     $this->load->view('mysodiqadmin',$error);
  }
public function uploadFile(){
      $this->load->library('form_validation');
	$this->form_validation->set_rules('title','beat title','required|trim|alpha');
	
	
	if($this->form_validation->run()){
        $this->load->model('dbModel');
        $this->load->helper('security');
	
	  
        $config['upload_path'] = './music/';
        $config['allowed_types'] = '*';
        $config['max_size']    = '30000000';
      

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('fileToUpload'))
        {     print_r($_FILES) ;
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('mysodiqadmin', $error);
        }
        else
        {$file=$this->upload->data();
				$data=array(
      'name'=>$this->input->post('title',TRUE),
	  'beatlink'=>"http://localhost/mysite/music/".$file['file_name']
	  );
	  $this->dbModel->insertbeatDetails($data);
		
	  
        echo "new beat has been successfully uploaded";
		
		
    }
	} 
else{
		$this->mysodiqadmin();
			}	
}
public function contactUs(){
	$data['messages']='';
	$this->load->view('contact',$data);
}
public function beatscategory(){
	$this->load->model('dbModel');
	$data['message']=$this->dbModel->getMessages();
	$datam['messagem']=$this->dbModel->getbeatDetails();
	$datasome['messagemsome']=$this->dbModel->getsomebeatDetails();
	$alldata=array_merge($data,$datam,$datasome);
		$this->load->view('category',$alldata);
}
public function aboutUs(){
	$this->load->model('dbModel');
	$data['message']=$this->dbModel->getMessages();	
	$this->load->view('about',$data);
}
public function sendMail(){
	$this->load->library('form_validation');
	$this->form_validation->set_rules('mname','Names','required|trim|alpha');
	$this->form_validation->set_rules('memail','Email','required|trim|valid_email');
	$this->form_validation->set_rules('mcomments','Comments','required|trim');
	 
	if($this->form_validation->run()){
		$this->load->library('email');
		$this->email->from(set_value('memail'), set_value('mname'));
		$this->email->to('real2safe@yahoo.com');
		$this->email->subject('Message from flickbeats webApp');
		$this->email->message(set_value('mcomments'));
		$this->email->send();
		
		$data['messages']='Your message has successfully been sent!';
        $this->load->view('contact',$data);
	}
	else{
	$data['messages']='';
	$this->load->view('contact',$data);
	}
}
}