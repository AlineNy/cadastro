<?php


class Cliente extends Cadastro{

    private $nome;
	private $sexo;
	private $id;
	private $dtNascimento;

	public function getNome() {
		return $this->nome;
	}

	public function  setNome($nome) {
		$this->nome = $nome;
	}

	public function  getSexo() {
		return $this->sexo;
	}

	public function  setSexo($sexo) {
		$this->sexo = $sexo;
	}

	public function  getId() {
		return $this->id;
	}

	public function  setId($id) {
		$this->id = $id;
	}

	public function  getDtNascimento() {
		return $this->dtNascimento;
	}

	public function setDtNascimento($dtNascimento) {
		$this->dtNascimento = $dtNascimento;
	}






}
?>