<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('funcionario_model');
		$this->load->model('cidade_model');
		$this->load->model('endereco_model');

		$this->load->helper(array('form', 'url'));

		
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function index()
	{
		$dados['funcionarios'] = $this->funcionario_model->do_select_funcionarios()->result();

		$this->load->view('funcionario/index', $dados);
	}

	public function cadastro()
	{
		$this->form_validation->set_rules('nome', 'NOME', 'required');

		if($this->form_validation->run() == true){
			$returnIdFunc = $this->funcionario_model->do_insert($this->input->post());

			$end = $this->input->post();
			$end['funcionario'] = $returnIdFunc;

			$this->endereco_model->do_insert($end);

			$this->session->set_flashdata('sucess', 'Cadastro efetuado com sucesso.');
			redirect('index.php/funcionario/cadastro');

		}


		$dados['cidades'] = $this->cidade_model->do_select_cidades()->result();
		$this->load->view('funcionario/cadastro', $dados);
	}

	public function delete()
	{
		$id_user = $this->uri->segment(3);
		$this->cidade_model->do_delete($id_user);
		$this->funcionario_model->do_delete($id_user);

		$this->session->set_flashdata('sucess', 'Funcionario excluído.');
		redirect('index.php/');
	}

	public function update()
	{
		$this->form_validation->set_rules('nome', 'NOME', 'required');

		if($this->form_validation->run() == true){
			$this->funcionario_model->do_update($this->input->post());
			$this->endereco_model->do_update($this->input->post());

			$this->session->set_flashdata('sucess', 'Editado editado.');
			redirect('index.php/funcionario/');

		}

		$dados['cidades'] = $this->cidade_model->do_select_cidades()->result();
		$this->load->view('funcionario/update', $dados);
	}
}
