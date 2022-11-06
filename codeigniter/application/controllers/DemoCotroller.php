<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class DemoCotroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('insertmodel');
		$this->load->model('kich_hoat');
		
		
	}

	public function list()
	{
		$this->load->view('DEMO/list');
	}
	public function index()
	{
		$this->load->view('DEMO/index');
	}
	
	public function kich_hoat($id)
	{	
			$this->kich_hoat->Update($id);
			$email = $this->kich_hoat->GetEmail($id);

			$this->load->library('phpmailer_lib');
			$mail = $this->phpmailer_lib->load();
			$mail->setFrom('phamminhtinh1998@gmail.com', 'Admin');
			$mail->addAddress($email['email']);
			$mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
			$Content = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
					<p>
						<a href='".base_url('dowload/'.$email['id'])."'>Click Link Dowload</a>
					</p>
						";
			$mail->Body = $Content;
			$mail->send();
			return $this->index();
		
	}
	public function kich_hoat_admin(){
			$email = $this->input->post('email');
			$ma = $this->input->post('ma');

			$this->load->library('phpmailer_lib');
			$mail = $this->phpmailer_lib->load();
			$mail->setFrom('phamminhtinh1998@gmail.com', 'Admin');
			$mail->addAddress($email);
			$mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
			$Content = "<h1>Kich hoat lay tai lieu</h1>
					<p>
						<a href='".base_url('kich_hoat/'.$ma)."'>Click Link Kích Hoạt</a>
					</p>
						";
			$mail->Body = $Content;
			$mail->send();
	}
	public function kich_hoat_download()
	{
			$email = $this->input->post('email');
			$ma = $this->input->post('ma');

			$this->load->library('phpmailer_lib');
			$mail = $this->phpmailer_lib->load();
			
			$mail->setFrom('phamminhtinh1998@gmail.com', 'Admin');
			$mail->addAddress($email);
			$mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
			$Content = "<h1>Kich hoat lay tai lieu</h1>
					<p>
						<a href='".base_url('dowload/'.$ma)."'>Click Link Dowload</a>
					</p>
						";
			$mail->Body = $Content;
			$mail->send();
	}
    
    public function Submit()
    {
		$ma=substr(md5(microtime()),rand(0,26),5);
		$email = $this->input->post('email');
		$name =$this->input->post('name');
		$tuoi =$this->input->post('tuoi');
		$data=[
			'email'=>$email,
			'ho_ten'=>$name,
			'tuoi'=>$tuoi,
			'statust'=>0,
			'ma'=>$ma,
		];
		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();
		$mail->setFrom('phamminhtinh1998@gmail.com', 'Admin');
		$mail->addAddress($email);
		$mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
		$Content = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
					<p>
						<a href='".base_url('kich_hoat/'.$ma)."'>Click Link Kích Hoạt</a>
					</p>";
		$mail->Body = $Content;
		$result = $this->insertmodel->Insert($data);
		$mail->send();
		if($result)
		{	
				echo "thành công";
		}else{
			$this->index();
		}
	  }

	  public function dowload($id)
	  {

		$date = date('d/m/y h:i:s');
		$this->kich_hoat->Update_dowload($id,$date);
		$content = "welcom"; // Read the file's contents
		$this->load->helper('download');
		force_download(APPPATH.'../assets/a.txt',$content);
	  }	
	  
	  public function get_email()
	  {
		$get_email= json_encode($this->insertmodel->get_mail());
		echo($get_email); 
	  }
			
}
