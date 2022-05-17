<?php

namespace App\Http;

class Utils
{
	public static function generateRandomString($length = 10)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public static function response($status, $msg, $data = null)
	{
		return [
			'action' => true,
			'status' => $status,
			'msg' => $msg,
			'data' => $data
		];
	}
}
