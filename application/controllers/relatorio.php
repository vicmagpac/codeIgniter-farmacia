<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function produtos()
	{
		$this->load->helper('mpdf');
		
		$this->load->model('produto_model');

		$produtos = $this->produto_model->do_select_produtos()->result();

		$html = '<html>';
		$html .= '<head></head>';
		$html .= '<body>';
		$html .= '<h1>Relatório de Produtos</h1>';
		$html .= '<h2> Data: ' . date('d-m-Y')  . '</h2>';
		$html .= '<h3>Logo abaixo é encontrado os principais detalhes de produtos, pela data Atual</h3><br />';
		$html .= '<table border="1" width="100%">';
		$html .= '<tr>
					<td width="5%" style="text-align:center;">ID</td>
					<td style="text-align:center;">Nome</td>
					<td width="20%" style="text-align:center;">Quantidade</td>
					<td width="25%" style="text-align:center;">Valor</td>
					<td width="25%" style="text-align:center;">Fornecedor</td>
				</tr>';
		$i = 1;
		foreach ($produtos as $prod){
			$html .= '<tr>
						<td style="text-align:center;">' . $prod->id . '</td>
						<td style="text-align:center;">' . $prod->nome . '</td>
						<td style="text-align:center;">' . $prod->quantidade . '</td>
						<td style="text-align:center;"> R$ ' . number_format($prod->valor, 2, ',', '.') . '</td>
						<td style="text-align:center;">' . $prod->fornecedor . '</td>
					</tr>';
		}
		$html .= '</table>';
		$html .= '</body></html>';
	
		pdf($html);
	}

	public function fornecedor()
	{
		$this->load->helper('mpdf');
		
		$this->load->model('fornecedor_model');

		$fornecedor = $this->fornecedor_model->do_select_fornecedores()->result();

		$html = '<html>';
		$html .= '<head></head>';
		$html .= '<body>';
		$html .= '<h1>Relatório de Fornecedores</h1>';
		$html .= '<h2> Data: ' . date('d-m-Y')  . '</h2>';
		$html .= '<h3>Logo abaixo é encontrado os principais detalhes de fornecedores, pela data Atual</h3><br />';
		$html .= '<table border="1" width="100%">';
		$html .= '<tr>
					<td width="5%" style="text-align:center;">ID</td>
					<td style="text-align:center;">Nome</td>
					<td width="20%" style="text-align:center;">CNPJ</td>
					<td width="25%" style="text-align:center;">Telefone</td>
				</tr>';
		$i = 1;
		foreach ($fornecedor as $for){
			$html .= '<tr>
						<td style="text-align:center;">' . $for->id . '</td>
						<td style="text-align:center;">' . $for->nome . '</td>
						<td style="text-align:center;">' . $for->cnpj . '</td>
						<td style="text-align:center;">' . $for->telefone . '</td>
					</tr>';
		}
		$html .= '</table>';
		$html .= '</body></html>';
	
		pdf($html);
	}
}