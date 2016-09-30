<?php 

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('usuarios_model');
	}

	public function index()
	{
		$this->load->view('usuarios_view');
	}

	public function registro()
	{
		$this->load->view('registro_view');
	}

	public function registro_verify ()
	{
		if($this->input->post('submit_reg'))
		{
			//$this->form_validation->set_rules('name del campo en el form', 'label', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
			$this->form_validation->set_rules('user', 'Usuario', 'required|trim|callback_verify_user');
			$this->form_validation->set_rules('pass', 'Contraseña', 'required');

			//Mensaje personalizado de error
			$this->form_validation->set_message('required', 'El campo %s es obligatorio.');
			$this->form_validation->set_message('verify_user', 'El %s ya existe.');

			if($this->form_validation->run() != FALSE ){
				$this->usuarios_model->add_user();
				$data = array('mensaje'=>'El usuario se ha creado correctamente.');
				$this->load->view('registro_view', $data);

			}else{
				$this->load->view('registro_view');
			}
				
		}
	}

	public function verify_user($user)
	{
		$variable = $this->usuarios_model->verify_user($user);
		if($variable == true)
		{
			return false;

		}else
		{
			return true;
		}
	}
}
?>