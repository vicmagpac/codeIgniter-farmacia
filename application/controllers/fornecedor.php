<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fornecedor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('fornecedor_model');

		$this->load->helper(array('form', 'url'));

		
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function index()
	{
		$dados['fornecedores'] = $this->fornecedor_model->do_select_fornecedores()->result();

		$this->load->view('fornecedor/index', $dados);
	}

	public function delete()
	{
		$id_user = $this->uri->segment(3);
		$this->fornecedor_model->do_delete($id_user);

		$this->session->set_flashdata('sucess', 'fornecedor excluído.');
		redirect('index.php/fornecedor');
	}

	
}
