<?php 
class Messages {
	
	public static $PT_br = "PT_br";
	public static $EN_us = "EN_us"; 
	
	/*Artigos*/
	public static $STR_OU = "STR_OU";
	public static $STR_E = "STR_E";
	public static $STR_O = "STR_O";
	public static $STR_A = "STR_A";
	public static $STR_UM = "STR_UM";
	public static $STR_UMA = "STR_UMA";
	
	public static $STR_NOME = "STR_NOME";
	public static $STR_CPF = "STR_CPF";
	public static $STR_SENHA = "STR_SENHA";
	public static $STR_SENHA_CONFIRMACAO = "STR_SENHA_CONFIRMACAO";
	public static $STR_EMAIL = "STR_EMAIL";
	public static $STR_EMAIL_CONFIRMACAO = "STR_EMAIL_CONFIRMACAO";
	public static $STR_ENVIAR = "STR_ENVIAR";
	public static $STR_CANCELAR = "STR_CANCELAR";
	
	public static $STR_REGISTRESE_GRATIS = "STR_REGISTRESE_GRATIS";
	public static $STR_LEIA_MAIS = "STR_LEIA_MAIS";
	
	public static $STR_SLOGAN = "STR_SLOGAN";
	public static $STR_TEXTO_APRESENTACAO = "STR_TEXTO_APRESENTACAO";

	/*Mensagens de sucesso*/
	public static $MSG_USUARIO_LOGADO = "MSG_USUARIO_LOGADO";
	public static $MSG_USUARIO_DESLOGADO = "MSG_USUARIO_DESLOGADO";
	
	/*Mensagens de erro*/
	public static $ERR_DESCONHECIDO = "ERR_DESCONHECIDO";
	public static $ERR_USUARIO_NAO_CADASTRADO = "ERR_USUARIO_NAO_CADASTRADO";
	public static $ERR_SENHA_INCORRETA = "ERR_SENHA_INCORRETA";
	
	 
	/**
	 * Atributo que armazena o array de mensagens em tempo de execução
	 * @var array
	 */
	private static $messages = null;
	
	/**
	 * Método para pegar o string em uma determinada linguagem;   
	 * 
	 * @param String $lang Linguagem.
	 * @param String $msg Identificador da String.
	 * @return String Conteúdo da mensagem na linguagem determinada.
	 */
	public static function get($lang, $msg){
		if(Messages::$messages == null){
			Messages::init($lang);
		}
		return Messages::$messages[$lang][$msg];
	}
	
	
	/**
	 * Método para imprimir o string em uma determinada linguagem;   
	 * 
	 * @param String $lang Linguagem.
	 * @param String $msg Identificador da String.
	 * @return String Conteúdo da mensagem na linguagem determinada.
	 */
	public static function printStr($lang, $msg){
		if(Messages::$messages == null){
			Messages::init($lang);
		}
		echo Messages::$messages[$lang][$msg];
	}
	
	/**
	 * Método que serve como proxy para inicializar os arrays de strings
	 * @param String $lang Linguagem a ser inicializada
	 */
	private static function init($lang){
		if($lang=Messages::$PT_br){
			Messages::initPt_br();
		}	
	}
	
	/**
	 * Método que inicializa o array de string em PT_br 
	 */
	private static function initPT_br(){
		$lang = Messages::$PT_br;

		/*Artigos*/
		Messages::$messages[$lang][Messages::$STR_OU] 					= "ou";
		Messages::$messages[$lang][Messages::$STR_E] 					= "e";
		Messages::$messages[$lang][Messages::$STR_O] 					= "o";
		Messages::$messages[$lang][Messages::$STR_A] 					= "a";
		Messages::$messages[$lang][Messages::$STR_UM] 					= "um";
		Messages::$messages[$lang][Messages::$STR_UMA] 					= "uma";
		
		/*Rótulos de Formulários*/
		Messages::$messages[$lang][Messages::$STR_NOME] 				= "Nome";
		Messages::$messages[$lang][Messages::$STR_CPF] 					= "CPF";
		Messages::$messages[$lang][Messages::$STR_SENHA] 				= "Senha";
		Messages::$messages[$lang][Messages::$STR_SENHA_CONFIRMACAO] 	= "Confirme sua senha";
		Messages::$messages[$lang][Messages::$STR_EMAIL] 				= "E-Mail";
		Messages::$messages[$lang][Messages::$STR_EMAIL_CONFIRMACAO] 	= "Confirme seu e-mail";
		Messages::$messages[$lang][Messages::$STR_ENVIAR] 				= "Enviar";
		Messages::$messages[$lang][Messages::$STR_CANCELAR] 			= "Cancelar";
		Messages::$messages[$lang][Messages::$STR_REGISTRESE_GRATIS]	= "Cadastre-se, é grátis!";
		Messages::$messages[$lang][Messages::$STR_LEIA_MAIS]			= "Leia mais";
		
		/*Textos */
		Messages::$messages[$lang][Messages::$STR_SLOGAN]				= "Aprendizado descomplicado!";
		Messages::$messages[$lang][Messages::$STR_TEXTO_APRESENTACAO]	= "A Ti Cafe &eacute; uma empresa <strong>inovadora</strong> e <strong>criativa</strong> que oferece <strong>consultoria</strong> e <strong>treinamento</strong> para profissionais e empresas de <strong>desenvolvimento de sistemas</strong>.";

		/*Mensagens de Sucesso*/
		Messages::$messages[$lang][Messages::$MSG_USUARIO_LOGADO]		= "Ol&aacute; :usr, seja bem vindo!";
		Messages::$messages[$lang][Messages::$MSG_USUARIO_DESLOGADO]	= "Obrigado :usr, volte sempre!";
		
		
		/*Mensagens de Erro*/
		Messages::$messages[$lang][Messages::$ERR_DESCONHECIDO]	= "Oops, ocorreu um erro desconhecido! Tente novamente em alguns instantes...";
		Messages::$messages[$lang][Messages::$ERR_USUARIO_NAO_CADASTRADO]	= "Usu&aacute;rio n&atilde;o existente! Voc&ecirc; &eacute; novo por aqui? Que tal se cadastrar?";
		Messages::$messages[$lang][Messages::$ERR_SENHA_INCORRETA]	= "Senha incorreta!";
		
	}
	
}
?>