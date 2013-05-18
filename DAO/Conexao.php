<?php
 	
 	//namespace Tryst\DAO;
	//use \PDO;


class Conexao{

	private static $DSN = 'mysql:host=localhost;dbname=treinamento';
	private static $USERNAME = 'dba';
	private static $PASSWORD = 'dba';
	private static $instance = null;
	private $con = null;

	private function __construct() {
        $this->con = new PDO(self::$DSN, self::$USERNAME, self::$PASSWORD);
    }


	public static function getInstancia(){

		if($instance==null){
				return new Conexao();
			}
		else
				return self::$instance;
	}


	public function getConexao(){
		return $this->con;

	}
}
?>