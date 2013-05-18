<?php
	
	//namespace Tryst\DAO;
	
	interface IUsuario{

	/**
*Insere um objeto no banco de dados
*@param
*@throws
*/
		public static function inserir($usuario);

	/**
*Insere um objeto no banco de dados
*@param
*@throws
*/
		public static function buscar($usuario);

	/**
*Insere um objeto no banco de dados
*@param
*@throws
*/
		public static function atualizar($usuario);
	/**
*Insere um objeto no banco de dados
*@param
*@throws
*/
		public static function cadastrar($usuario);
	/**
*Insere um objeto no banco de dados
*@param
*@throws
*/
		public static function logar($usuario);
		

	}


?>