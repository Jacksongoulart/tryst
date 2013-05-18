<?php

 	//namespace Tryst\View;
	require_once("../Controller/ControleUsuario.php");

	class VisaoUsuario {
		private $control;
		
		public static function getNomeSessao(){
			return $_SESSION['nome'];
		}

		public static function getEmailSessao(){
			return $_SESSION['email'];
		}

		public static function getNomeUsuarioSessao(){
			return $_SESSION['username'];
		}

		public static function getDataNascimentoSessao(){
			return $_SESSION['dataNascimento'];
		}

		public static function getSexoSessao(){
			return $_SESSION['sexo'];
		}

		public function logar() {

			$this->control = new ControleUsuario();
	        if($this->control->logar($_POST['username'], $_POST['password']))
	        	header('Location: principal.php');
        	echo "Usu&aacute;rio ou senha incorreta.<br>";
	    }

	    public static function deslogar() {
	    	session_destroy();
	    	header('Location: index.php');	
	    }

	    public function cadastrar() {
	    	$this->control = new ControleUsuario();
	    	if($this->control->cadastrar($_POST['user_name'],$_POST['user_email'], $_POST['user_username'], $_POST['pwd'], $_POST['data_nascimento'], $_POST['gender']))
	    		echo "Usu&aacute;rio ".$_POST['user_name']." cadastrado com sucesso.";
	    	else
	    		echo "Nome de usu&aacute;rio ou e-mail j&aacute; cadastrados";
	    }
	}

?>