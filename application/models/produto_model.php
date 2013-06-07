<?php

class Produto_model extends CI_Model
{

	public function do_insert($dados = array())
	{
		$this->db->query(
			"
				INSERT INTO far_produto 
							(
								nome,
								tipo,
								valor,
								quantidade,
								id_fornecedor
							)
							VALUES
							(
								'" . $dados['nome'] . "',
								'" . $dados['tipo'] . "',
								'" . $dados['valor']. "',
								'" . $dados['quantidade']."',
								'" . $dados['fornecedor'] . "'
							)

			"
		);

		return $this->db->insert_id();
	}

	public function do_select_produtos()
	{
		return $this->db->query("
			SELECT fp.id, fp.nome, fp.tipo, fp.valor, fp.quantidade, ff.nome AS fornecedor
			FROM 
				far_produto fp 
			INNER JOIN
				far_fornecedor ff
			ON
				fp.id_fornecedor = ff.id
			ORDER BY
				fp.nome
			"
		);
	}

	public function get_byid($id)
	{
		return $this->db->query("
			SELECT fp.id, fp.nome, fp.tipo, fp.valor, fp.quantidade, ff.id AS id_fornecedor , ff.nome AS fornecedor
			FROM 
				far_produto fp 
			INNER JOIN
				far_fornecedor ff
			ON
				fp.id_fornecedor = ff.id
			WHERE 
				fp.id = {$id}
			"
		);
	}

	public function do_update($dados = array())
	{
		return $this->db->query(
			"
				UPDATE far_produto
				SET
					nome = '" . $dados['nome'] . "',
					tipo = '" .  $dados['tipo']. "',
					valor = '" .  $dados['valor']. "',
					quantidade = '" .  $dados['quantidade']. "',
					id_fornecedor = '" .  $dados['fornecedor']. "'
				WHERE
					id = '" . $dados['id'] . "'
			"
		);
	}

	/**
	* Metodo que deleta um produto passando o id
	* @return Object
	*/
	public function do_delete($id)
	{
		return $this->db->query("DELETE FROM far_produto WHERE id = {$id}");
	}
}