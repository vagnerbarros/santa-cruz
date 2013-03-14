<?php

interface Entidade {
	
	public function __toString();
	
	public function compareTo($obj);
	
	public function toArray();
	
}
?>