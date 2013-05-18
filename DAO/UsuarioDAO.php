<?php

//namespace Tryst\DAO;

require_once("Conexao.php");
require_once("../Model/Usuario.php");
require_once("IUsuario.php");

class UsuarioDAO implements IUsuario{

	const SQL_INSERT = 'INSERT INTO usuario VALUES(DEFAULT,:usuario_nome,:usuario_login,:usuario_senha,:usuario_dataNascimento,:usuario_sexo,:usuario_email);';
	const SQL_SELECT = 'SELECT * FROM usuario WHERE id_usuario AND= :usuario_id;';
	const SQL_SELECTALL = 'SELECT * FROM usuario;';
	const SQL_LOGIN = 'SELECT * FROM usuario WHERE senha = :usuario_senha AND ( email = :usuario_login OR nome_usuario = :usuario_login );';
	
	public static function inserir($usuario){
		$con = Conexao::getInstancia()->getConexao()->prepare(self::SQL_INSERT);
		$con->bindParam(':usuario_nome',$usuario->getNome());
		$con->bindParam(':usuario_login',$usuario->getNomeUsuario());
		$con->bindParam(':usuario_senha',$usuario->getSenha());
		$con->bindParam(':usuario_dataNascimento',$usuario->getDataNascimento());
		$con->bindParam(':usuario_sexo',$usuario->getSexo());
		$con->bindParam(':usuario_email',$usuario->getEmail());
		$con->execute();

	}

	public static function buscar($usuario){

			$con = Conexao::getInstancia()->getConexao()->prepare(self::SQL_LOGIN);
			$con->bindParam(':usuario_senha',$usuario->getSenha());
			$con->bindParam(':usuario_login',$usuario->getNomeUsuario());
			$con->execute();
			$result = $con->fetch(PDO::FETCH_ASSOC);
			if($result){
				return self::criarObjeto($result);}
			unset($con,$result);
			return False;
	}

	public static function logar($usuario){	
		if($user = self::buscar($usuario)){
			return $user;
		}
		return null;
	}


	public static function cadastrar($usuario){
		if((self::buscar($usuario))) {
			return False;}
		else {
			self::inserir($usuario);
			return True;
		}

	}

	public static function atualizar($usuario){

	}

	private function criarObjeto($row){
		$usuario = new Usuario();
		$usuario->setNome($row['nome_completo']);
		$usuario->setEmail($row['nome_usuario']);
		$usuario->setSenha($row['senha']);
		$usuario->setDataNascimento($row['data_nascimento']);
		$usuario->setSexo($row['sexo']);
		$usuario->setEmail($row['email']);
		return $usuario;
	}

	private function setObjeto($entrada) {
		$Array = array(
			':usuario_nome' => $entrada->getNome(),
			':usuario_login' => $entrada->getNomeUsuario(),
			':usuario_senha' => $entrada->getSenha(),
			':usuario_dataNascimento' => $entrada->getDataNascimento(),
			':usuario_sexo' => $entrada->getSexo(),
			':usuario_email' => $entrada->getEmail()
		);
		return $Array;
	}

}
?>
