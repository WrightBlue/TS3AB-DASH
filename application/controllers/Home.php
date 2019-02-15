<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
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

	class Home extends CI_Controller
	{

		public function index()
		{
			if (version_compare(PHP_VERSION, '7.2', '<')) {
				header('HTTP/1.1 503 Service Unavailable.', true, 503);
				echo 'PHP version is old!'.PHP_EOL;
				echo 'Current PHP version: '.phpversion().PHP_EOL;
				echo 'Requires PHP version: >= 7.2'.PHP_EOL;
				exit(1);
			}
			foreach (array('pdo_mysql', 'curl') as $extension) {
				if (!extension_loaded($extension)) {
					header('HTTP/1.1 503 Service Unavailable.', true, 503);
					echo 'Extension not found!'.PHP_EOL;
					$phpversion = explode('.', phpversion());
					echo 'Please install or enable: php'.$phpversion[0].'.'.$phpversion[1].'-'.$extension;
					exit(1);
				}
			}
			if (!file_exists($this->config->item('ts3ab')['path'].'TS3AudioBot.exe')) {
				header('HTTP/1.1 503 Service Unavailable.', true, 503);
				echo 'File "'.$this->config->item('ts3ab')['path'].'TS3AudioBot.exe" not found!'.PHP_EOL;
				exit(1);
			}
			if ($this->session->userdata('logged')) {
				redirect(base_url('bots'));
			}
			$this->load->view('home');
		}
	}
