<?php 

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('usuarios_model');
	}

	public function index()
	{
		$this->load->view('login_view');
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
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_verify_email');
			$this->form_validation->set_rules('user', 'Usuario', 'required|trim|callback_verify_user');
			$this->form_validation->set_rules('pass', 'Contraseña', 'required|trim|min_length[6] ');
			$this->form_validation->set_rules('pass2', 'Confirmar Contraseña', 'required|trim|matches[pass]');

			//Mensaje personalizado de error
			$this->form_validation->set_message('required', 'El campo %s es obligatorio.');
			$this->form_validation->set_message('verify_user', 'El %s ya existe en la BBDD.');
			$this->form_validation->set_message('valid_email', 'Ingresa un %s válido.');
			$this->form_validation->set_message('matches', 'El campo %s no coincide con la proporcionada anteriormente.');
			$this->form_validation->set_message('min_length', 'El campo %s debe tener un mínimo de 6 caracteres.');
			$this->form_validation->set_message('verify_email', 'El campo %s ya existe en la BBDD.');

			if($this->form_validation->run() != FALSE ){
				$this->usuarios_model->add_user();
				$data = array('mensaje'=>'El usuario se ha creado correctamente.');
				$this->load->view('registro_view', $data);

			}else{
				$this->load->view('registro_view');
			}
				
		}else{
			redirect(base_url().'login');
		}
	}

	public function verify_user($user)
	{
		$verifyUser = $this->usuarios_model->verify($user, 'usuario');
		if($verifyUser == true)
		{
			return false;

		}else
		{
			return true;
		}
	}

	public function verify_email($email)
	{
		$verifyEmail = $this->usuarios_model->verify($email, 'email');
		if($verifyEmail == true)
		{
			return false;

		}else
		{
			return true;
		}
	}

	public function verify_session()
	{
		if($this->input->post('submit')) {

			$verifySession = $this->usuarios_model->verify_session();
			if($verifySession == true){

				$varSesion = array(
							'usuario' => $this->input->post('user')
							);
				$this->session->set_userdata($varSesion);
				redirect(base_url().'home');

			}else{

				$data = array('mensaje' => 'El usuario y/o la contraseña son incorrectos');
				$this->load->view('login_view', $data);
			}

		}else{
			redirect(base_url().'login');
		}
	}
}
?>