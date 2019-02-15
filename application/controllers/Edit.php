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

	class Edit extends CI_Controller
	{

		public function index()
		{
			if (!$this->session->userdata('logged')) {
				redirect(base_url('home'));
			}
			$template = htmlspecialchars($this->uri->segment(2), ENT_QUOTES, "UTF-8");
			$data['bot'] = $this->db->query("SELECT * FROM `bots` WHERE `id`='$template'")->row_array();
			if (empty($data['bot'])) {
				redirect(base_url('bots'));
			}
			if (!is_numeric($this->uri->segment(3))) {
				redirect(base_url('bots'));
			}
			$this->load->view('header');
			$this->load->view('edit', $data);
			$this->load->view('footer');
		}
	}
