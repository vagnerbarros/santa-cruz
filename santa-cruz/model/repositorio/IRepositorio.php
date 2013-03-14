<?php
interface IRepositorio {

	public function nextId();
	public function create($entidade);
	public function update($entidade);
	public function retrieve($entidade);
	public function delete($entidade);
	public function mount($resultset);	
}