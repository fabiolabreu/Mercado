<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {
	
	public function index()
	{
	//$this->output->enable_profiler(TRUE);
		
	$this->load->model("produtos_model");
        $produtos = $this->produtos_model->buscaTodos();

        $dados = array("produtos" => $produtos);
        $this->load->helper(array("currency", "form"));
        $this->load->view("produtos/index.php", $dados);
	}
	
	public function formulario(){
		$this->load->view("produtos/formulario");
	}
	
	public function novo(){
		if ($this->validaCampos()) {
			$usuarioLogado = $this->session->userdata("usuario_logado");
			$produto = array(
				"nome" => $this->input->post("nome"),
				"preco" => $this->input->post("preco"),
				"descricao" => $this->input->post("descricao"),
				"usuario_id" => $usuarioLogado["id"]
			);
		
			$this->load->model("produtos_model");
			$this->produtos_model->salva($produto);
			$this->session->set_flashdata("success", "Produto salvo com sucesso");
			redirect("/");	
		} else {
			$this->load->view("produtos/formulario");
		}
		
	}
	
    public function nao_tenha_a_palavra_melhor($nome) {
        $posicao = strpos($nome, "melhor");
        if($posicao !== FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message("nao_tenha_a_palavra_melhor", "O campo '%s' não pode conter a palavra 'melhor'");
            return FALSE;
        }

    }
    
	public function validaCampos(){
		$this->form_validation->set_rules("nome", "nome", "required|min_length[5]|max_length[100]|callback_nao_tenha_a_palavra_melhor");
		$this->form_validation->set_rules("descricao", "Descrição", "trim|required|min_length[10]");
		$this->form_validation->set_rules("preco", "preco", "required");
		$this->form_validation->set_error_delimiters("<p class='text-danger', </p>");
		return $this->form_validation->run();
	}
	
	
	public function mostra($id){
		$this->load->helper("typography");
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->busca($id);
		$dados = array("produto" => $produto);
		$this->load->view("produtos/mostra",$dados);
	}
	
}
