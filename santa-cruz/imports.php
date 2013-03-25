<?php
require_once("util/Constants.php");
require_once("util/Messages.php");
require_once("util/SessionManager.php");
require_once("util/ACL.php");
require_once("util/Page.php");
require_once("util/Form.php");
require_once("util/Entidade.php");
require_once("util/Action.php");
require_once("util/Forward.php");
require_once("util/Imports.php");
require_once("util/ConexaoBD.php");
require_once('util/Proxy.php');

Proxy::reset();

//DOMINIOS
include 'model/dominio/TipoPerfil.php';

//MODEL
require_once("model/fachada/Fachada.php");


//Registra as Pages
Imports::page("HomePage");
Imports::page("CadastroTestePage");	

//Registra as Actions
//Imports::action("AtualizarCursoAction");

?>
