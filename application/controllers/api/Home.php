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
			$this->output->set_content_type('application/json')->set_status_header(200);
			if ($this->session->userdata('logged')) {
				return $this->output->set_output(printJson(false, $this->lang->line('auth')[4]));
			}
			$login    = $this->input->post('login');
			$password = $this->input->post('password');
			if (empty($login) || empty($password)) {
				return $this->output->set_output(printJson(false, $this->lang->line('auth')[5]));
			}
			if ($login == $this->config->item('auth')['login'] && $password == $this->config->item('auth')['password']) {
				$this->session->set_userdata('logged', true);
				return $this->output->set_output(printJson(true, $this->lang->line('auth')[6]));
			}
			else {
				return $this->output->set_output(printJson(false, $this->lang->line('auth')[7]));
			}
		}
	}
