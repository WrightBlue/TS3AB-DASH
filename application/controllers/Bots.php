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

	class Bots extends CI_Controller
	{

		public function index()
		{
			if (!$this->session->userdata('logged')) {
				redirect(base_url('home'));
			}
			$this->load->view('header');
			$this->load->view('bots');
			$this->load->view('footer');
		}
	}
