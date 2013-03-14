<?php
class Constants {

	//VERSION
	public static $_VERSION = "1.0 r1 2012-11-15 0830";
		
	//DEBUG
	public static $_DEBUG = true;
	
	//DOMAIN
	public static $_DOMAIN = "http://localhost/ticafe";
	
	//DATABASE PARAMETERS
	
		//DATABASE HOST
		public static $_HOST = "localhost"; //LOCAL
		//public static $_HOST = "dbmy0101.whservidor.com"; //deploy
		
		//DATABASE INFO
	//	public static $_USER = "sillabus_4";
	//	public static $_PASS = "sillabus4cafeh"; //sillabus4cafeh
	//	public static $_BASE = "sillabus_4"; 
	
		public static $_USER = "ti_cafe";
		public static $_PASS = "ti_cafe"; 
		public static $_BASE = "ti_cafe";
	
		//ATIVO
		public static $_ATIVO = 'S';
		public static $_INATIVO = 'N';
		
		//Sim, Nao
		public static $_SIM = 'S';
		public static $_NAO = 'N';
		
		//QUANTIDADE INICIAL DE CREDITOS
		public static $_CREDITOS_INICIAL = 0;
		
		//TIPO DE OPERAวรO
		public static $_CREDITO = 'CREDITO';
		public static $_DEBITO = 'DEBITO';
		
		//DESCRIวรO DA OPERAวรO
		public static $_ESCOLHA_CURSO = 'ESCOLHA DE CURSO';
		public static $_DESISTENCIA = 'DESISTENCIA DE TURMA';
		public static $_COMPRA = 'COMPRA DE CREDITOS';
		public static $_CANCELAMENTO = 'CURSO OU TURMA CANCELADO';
	
		//NAMESPACES
		//public static $_NAMESPACE = "EEPE_TST_";//FREEMYSQL TESTE
		public static $_NAMESPACE = "";
		
		//BODY MESSAGE
		public static $_MSG_SUCESSO = 1;
		public static $_MSG_ERRO = 0;
	
	//FILESYSTEM PARAMETERS
	
		//DEVELOP
		public static $_FOTODIR = "C:/wamp/www/ticafe/files/pics/";
		public static $_FILEDIR = "C:/wamp/www/ticafe/files/";
		
		//DEPLOY
		//public static $_FILEDIR = "../ticafe/";
		
	//SYSTEM PROPERTIES (DO NOT CHANGE ON DEPLOY)
	public static $_DEFAULT_PAGE = "HomePage";
		
	public static $_SYSNAME = "ticafe";
	public static $_SYSMAIL = "cesarfranca@gmail.com";
	public static $_SYSLABEL = "Ti Cafe";
	public static $_SITENAME = "Ti Cafe";
	
	//BODY MESSAGE
	public static $_MSG_SUCCESS = "alert-success";
	public static $_MSG_WARNING = "alert-error";
	public static $_MSG_ERROR = "alert-error";
	
	//Yes, No
	public static $_YES = 'Y';
	public static $_NO = 'N';

}
?>