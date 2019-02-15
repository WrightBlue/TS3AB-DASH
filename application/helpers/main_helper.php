<?php defined('BASEPATH') OR exit('No direct script access allowed');
	/*
	 *
	 * Created by 'Wright.' for tsforum.pl.
	 *
	 * Contact:
	 *   > Teamspeak: ts3.black
	 *   > Mail: wright@ogarnij.se
	 *   > Github: WrightProjects
	 *
	 * Copyright (C) 2019 WrightProjects
	 *
	 */

	function printJson($success, $message)
	{
		return json_encode(array('success' => $success, 'message' => $message));
	}

	function checkApi($host, $port)
	{
//		$connection = @fsockopen($host, $port);
//		if (is_resource($connection)) {
//			fclose($connection);
//			return true;
//		}
		return true;
	}

	function generateId()
	{
		$data = random_bytes(16);
		assert(strlen($data) == 16);
		$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
		$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
		return strtoupper(vsprintf('%s-%s-%s', str_split(bin2hex($data), 4)));
	}