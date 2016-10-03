<?php 
class home extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->verify_session();
	}	

	public function index()
	{
		$user = $this->session->userdata('usuario');
		$data = array('usuario' => $user);
		$this->load->view('home_view', $data);
	}

	function verify_session()
	{
		if (!$this->session->userdata('usuario'))
		{
			$data = array('mensaje'=>'Debes estar logueado para tener acceso.');
			redirect(base_url().'login');
		}/*else{

		}*/
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login');
	}
}
?>