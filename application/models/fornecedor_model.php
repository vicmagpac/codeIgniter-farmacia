<?php

class Fornecedor_model extends CI_Model
{

	public function do_select_fornecedores()
	{
		return $this->db->query(
				"
					SELECT id, nome, cnpj, telefone
					FROM far_fornecedor
				"
		);
	}

	public function do_delete($id)
	{
		return $this->db->query("DELETE FROM far_fornecedor WHERE id = {$id}");
	}
}