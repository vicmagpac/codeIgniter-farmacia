<?php

class Endereco_model extends CI_Model
{

	public function do_insert($dados = array())
	{
		return $this->db->query(
			"
				INSERT INTO far_endereco 
				(
					rua,
					bairro,
					complemento,
					numero,
					id_cidade,
					id_funcionario
				)
				VALUES
				(
					'" . $dados['rua'] . "',
					'" . $dados['bairro'] . "',
					'" . $dados['complemento']. "',
					'" . $dados['numero']."',
					'" . $dados['cidade'] . "',
					'" . $dados['funcionario'] . "'
				)

			"
		);
	}

	public function do_update($dados = array())
	{
		return $this->db->query(
			"
				UPDATE far_endereco
				SET
					rua = '" . $dados['rua'] . "',
					bairro = '" .  $dados['bairro']. "',
					complemento = '" .  $dados['complemento']. "',
					numero = '" .  $dados['numero']. "',
					id_cidade = '" .  $dados['cidade']. "'
				WHERE
					id_funcionario = '" . $dados['id'] . "'
			"
		);
	}

}