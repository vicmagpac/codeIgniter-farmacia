<?php

class Cidade_model extends CI_Model
{

	//insert
	public function do_select_cidades()
	{
		return $this->db->query("
					SELECT id, nome 
					FROM far_cidades 
					WHERE estado = 6
				");
	}

	/**
	* Metodo que deleta um endereço de usuario passando o id
	* @return Object
	*/
	public function do_delete($id)
	{
		return $this->db->query("DELETE FROM far_endereco WHERE id_funcionario = {$id}");
	}
}