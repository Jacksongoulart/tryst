<?php

	
	//namespace Tryst\Controller;
	require_once('../DAO/UsuarioDAO.php');

	class ControleUsuario {

		private $usuario;

		private function criarObjetoCad($nome, $email, $nomeUsuario, $senha, $dataNascimento, $sexo) {
			$this->usuario = new Usuario();
			$this->usuario->setNome($nome);
			$this->usuario->setEmail($email);
			$this->usuario->setNomeUsuario($nomeUsuario);
			$this->usuario->setSenha($senha);
			$this->usuario->setDataNascimento($dataNascimento);
			$this->usuario->setSexo($sexo);
			return $this->usuario;
		}

		private function criarObjeto($usuario, $senha) {
			$this->usuario = new Usuario();
			$this->usuario->setNomeUsuario($usuario);
			$this->usuario->setSenha($senha);
			return $this->usuario;
		}


		public function cadastrar($nome, $email, $nomeUsuario, $senha, $dataNascimento, $sexo) {
			
			if($user = UsuarioDAO::cadastrar($this->criarObjetoCad($nome, $email, $nomeUsuario, $senha, $dataNascimento, $sexo)))
				return True;
			return False;
		}

		public function logar($usuario, $senha) {
			if($user = UsuarioDAO::logar($this->criarObjeto($usuario, $senha))){
				self::geraSessao($user);
				return True;
			}
			return False;
		}

		public static function geraSessao($usuario){
			$_SESSION['nome'] = $usuario->getNome();
			$_SESSION['email'] = $usuario->getEmail();
			$_SESSION['username'] = $usuario->getNomeUsuario();
			$_SESSION['dataNascimento'] = $usuario->getDataNascimento();
			$_SESSION['sexo'] = $usuario->getSexo();
		}
		public static function deslogar() {
			$this->usuario->deslogar();
		}


	}

?>