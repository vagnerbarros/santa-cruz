<?php
abstract class Action {
	
	private $allows;
	private $forward;
	private $bodyMsg;
	private $hasMsg;
	private $tpMsg;
	
	private $popup;
	private $hasPopup;

	public function __construct(){
		$this->allows = array();
		$this->permissions();
	}
	
	public function allow($acl){
		if(is_array($acl )){
			foreach ($acl as $a) {
				$this->allows[] = $a;
			}			
		} else {
			$this->allows[] = $acl;
		}
	}
	
	public function getPermissions(){
		return $this->allows;
	}
	
	public function setForward($forward, $popup=null){
		$this->forward = $forward;
		$this->popup = $popup;
		$this->hasPopup = ($popup != null);
	}
	
	public function getForward(){
		return $this->forward;
	}
	
	public function getPopup(){
		return $this->popup;
	}
	
	public function setMessage($msg, $tpMsg){
		if($msg != null && $msg != ''){
			$this->bodyMsg = $msg;
			$this->hasMsg = true;
			$this->tpMsg = $tpMsg;
		}
	}
	
	public function load($int){
		echo "<script language='javascript'><!-- 
				load('$int'); 
				--></script>";	
	}
	
	public function hasMessage(){
		return $this->hasMsg;
	}
	
	public function hasPopup(){
		return $this->hasPopup;
	}
	
	public function getMessage(){
		return $this->bodyMsg;
	}
	
	public function getMessageType(){
		return $this->tpMsg;
	}
	
	public abstract function label();
	
	public abstract function run($form);
	
	public abstract function permissions();

}