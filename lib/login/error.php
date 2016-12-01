<?php

/**
*  errorメッセージ管理クラス
*/
class Error
{
	protected $errors = array();


	public function get()
	{

		return $errors;
}
	public function set($error)
	{
		$errors[] = $error;
	}

	public function clear()
	{
		$errors = array();
	}
}