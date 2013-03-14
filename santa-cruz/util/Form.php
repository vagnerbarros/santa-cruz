<?php
class Form {
	
	private $hash;
	
	public function Form(){
		$this->hash = array();
	}
	
	public function set($key, $val){
		$this->hash[$key] = $val;
	}
	
	public function get($key){
		return $this->hash[Proxy::encrypt($key)];
	}

}