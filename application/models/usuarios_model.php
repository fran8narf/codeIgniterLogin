<?php 
class Usuarios_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function verify($variable, $campo)
	{
		$query = $this->db->get_where('usuarios', array($campo=>$variable));
		if($query->num_rows() == 1)
		{
			return true;
		}else
		{
			return false;
		}
	}

	public function add_user()
	{
		$this->db->insert('usuarios',array(
			'nombre'=>$this->input->post('nombre', TRUE),
			'email'=>$this->input->post('email', TRUE),
			'usuario'=>$this->input->post('user', TRUE),
			'pass'=>$this->input->post('pass', TRUE),
			'codigo'=>'123456',
			'estado'=>'0',
			'creado'=>date("Y-m-d H:i:s")
		));
	}

	public function verify_session()
	{
		$query = $this->db->get_where('usuarios', array(
													'usuario'=>$this->input->post('user', TRUE),
													'pass'=>$this->input->post('pass', TRUE))
												);
		if($query->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>