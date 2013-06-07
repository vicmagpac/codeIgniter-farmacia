<?php

class Funcionario_model extends CI_Model
{

	public function do_insert($dados = array())
	{
		$this->db->query(
			"
				INSERT INTO far_funcionario 
							(
								nome,
								cpf,
								telefone,
								sexo,
								id_cargo
							)
							VALUES
							(
								'" . $dados['nome'] . "',
								'" . $dados['cpf'] . "',
								'" . $dados['telefone']. "',
								'" . $dados['sexo']."',
								'" . $dados['cargo'] . "'
							)

			"
		);

		return $this->db->insert_id();
	}

	/**
	* Metodo que retorna todos os funcionario
	* @return Object
	*/
	public function do_select_funcionarios()
	{
		return $this->db->query("
			SELECT 
				ff.id as id_user, 
				ff.nome AS nome_user, 
				ff.telefone, 
				ff.sexo, 
				fc.nome AS nome_cidade, 
				festados.nome AS nome_estado
			FROM 
				far_funcionario ff 
			INNER JOIN
				far_endereco fe
			ON
				ff.id = fe.id_funcionario
			INNER JOIN
				far_cidades fc
			ON
				fe.id_cidade = fc.id
			INNER JOIN
				far_estados festados
			ON
				fc.estado = festados.id
			ORDER BY
				ff.nome
			"
		);
	}

	public function get_byid($id)
	{
		return $this->db->query("
			SELECT 
				ff.id as id_user, 
				ff.nome AS nome_user, 
				ff.cpf,
				ff.id_cargo,
				ff.telefone, 
				ff.sexo,
				fe.rua,
				fe.numero,
				fe.bairro,
				fe.complemento,
				fe.id_cidade
			FROM 
				far_funcionario ff 
			INNER JOIN
				far_endereco fe
			ON
				ff.id = fe.id_funcionario
			INNER JOIN
				far_cidades fc
			ON
				fe.id_cidade = fc.id
			INNER JOIN
				far_estados festados
			ON
				fc.estado = festados.id
			WHERE 
				ff.id = {$id}
			"
		);
	}


	public function do_update($dados = array())
	{
		return $this->db->query(
			"
				UPDATE far_funcionario
				SET
					nome = '" . $dados['nome'] . "',
					cpf = '" .  $dados['cpf']. "',
					telefone = '" .  $dados['telefone']. "',
					sexo = '" .  $dados['sexo']. "',
					id_cargo = '" .  $dados['cargo']. "'
				WHERE
					id = '" . $dados['id'] . "'
			"
		);
	}

	/**
	* Metodo que deleta um usuario passando o id
	* @return Object
	*/
	public function do_delete($id)
	{
		return $this->db->query("DELETE FROM far_funcionario WHERE id = {$id}");
	}
}