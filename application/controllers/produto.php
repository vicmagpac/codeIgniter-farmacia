<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('produto_model');
		$this->load->model('fornecedor_model');

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function index()
	{
		$dados['produtos'] = $this->produto_model->do_select_produtos()->result();

		$this->load->view('produto/index', $dados);
	}

	public function cadastro()
	{
		$this->form_validation->set_rules('nome', 'NOME', 'required');

		if($this->form_validation->run() == true){

			$post = $this->input->post();
			$post['valor'] = str_replace(',', '.', $post['valor']);
			$this->produto_model->do_insert($post);

			$this->session->set_flashdata('sucess', 'Cadastro efetuado.');
			redirect('index.php/produto/cadastro');

		}

		$data['fornecedores'] = $this->fornecedor_model->do_select_fornecedores()->result();		
		$this->load->view('produto/cadastro', $data);
	}

	public function delete()
	{
		$id_user = $this->uri->segment(3);
		$this->produto_model->do_delete($id_user);

		$this->session->set_flashdata('sucess', 'Produto Excluído.');
		redirect('index.php/produto/');
	}

	public function update()
	{
		$this->form_validation->set_rules('nome', 'NOME', 'required');

		if($this->form_validation->run() == true){
			$this->produto_model->do_update($this->input->post());

			$this->session->set_flashdata('sucess', 'Editado editado.');
			redirect('index.php/produto/');

		}

		$data['fornecedores'] = $this->fornecedor_model->do_select_fornecedores()->result();	
		$this->load->view('produto/update', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */