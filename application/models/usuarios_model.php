<?php 
class Usuarios_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function verify_user($user)
	{
		$query = $this->db->get_where('usuarios', array('usuario'=>$user));
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
			'estado'=>'0'
		));
	}
}
?>