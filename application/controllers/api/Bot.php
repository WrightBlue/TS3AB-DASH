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

	class Bot extends CI_Controller
	{

		public function create()
		{
			$this->output->set_content_type('application/json')->set_status_header(200);
			if (!$this->session->userdata('logged')) {
				return $this->output->set_output(printJson(false, $this->lang->line('main')[2]));
			}
			$name       = htmlspecialchars($this->input->post('name'), ENT_QUOTES, "UTF-8");
			$server     = htmlspecialchars($this->input->post('server'), ENT_QUOTES, "UTF-8");
			$channel_id = htmlspecialchars($this->input->post('channel_id'), ENT_QUOTES, "UTF-8");
			$group_id   = htmlspecialchars($this->input->post('group_id'), ENT_QUOTES, "UTF-8");
			if (empty($name) || empty($server) || empty($channel_id) || empty($group_id)) {
				return $this->output->set_output(printJson(false, str_replace('%param', 'name, server, channel_id, group_id', $this->lang->line('main')[3])));
			}
			$TS3AudioBot = new TS3AudioBot();
			$instance    = $TS3AudioBot->getInstance();
			if ($instance['Id'] == null) {
				return $this->output->set_output(printJson(false, $this->lang->line('main')[1]));
			}
			$id = generateId();
			$TS3AudioBot->useInstance($instance['Id']);
			$template = json_decode($TS3AudioBot->create($server, $name), true);
			if (!$TS3AudioBot->getSuccess($template)) {
				return $this->output->set_output(printJson(false, $TS3AudioBot->getSuccess($template)));
			}
			$TS3AudioBot->useInstance($template['Id']);
			$TS3AudioBot->save($id);
			$TS3AudioBot->settingsBotSet($id, 'connect.channel', "/$channel_id");
			$TomlEditor = new TomlEditor();
			$TomlEditor->createTabele($id, $group_id, $this->config->item('ts3ab')['group_rights']);
			$this->db->query("INSERT INTO `bots`(`id`, `name`, `server`, `channel_id`, `group_id`) VALUES ('$id', '$name', '$server', '$channel_id', '$group_id')");
			$TS3AudioBot->rightsReload();
			$TS3AudioBot->move($channel_id);
			return $this->output->set_output(printJson(true, $this->lang->line('bot')[5]));
		}

		public function list()
		{
			$this->output->set_content_type('application/json')->set_status_header(200);
			if (!$this->session->userdata('logged')) {
				return $this->output->set_output(printJson(false, $this->lang->line('main')[2]));
			}
			$TS3AudioBot = new TS3AudioBot();
			$botList     = json_decode($TS3AudioBot->botList(), true);
			if (empty($botList)) {
				return $this->output->set_output(printJson(false, $TS3AudioBot->getSuccess($botList)));
			}
			$bots = array();
			foreach ($this->db->query("SELECT * FROM `bots` ORDER BY name DESC")->result_array() as $index => $item) {
				$bots[] = array('Config' => $item['id'], 'Name' => $item['name'], 'channel_id' => $item['channel_id'], 'group_id' => $item['group_id'], 'status' => false);
				foreach ($botList as $value) {
					if ($value['Name'] == $item['id'] && $value['Status'] == 2) {
						$bots[$index]['status'] = true;
						$bots[$index]['Id']     = $value['Id'];
						break;
					}
				}
			}
			return $this->output->set_output(json_encode($bots, JSON_UNESCAPED_UNICODE));
		}

		public function disconnect()
		{
			$this->output->set_content_type('application/json')->set_status_header(200);
			if (!$this->session->userdata('logged')) {
				return $this->output->set_output(printJson(false, $this->lang->line('main')[2]));
			}
			$TS3AudioBot = new TS3AudioBot();
			$TS3AudioBot->useInstance($this->input->post('id'));
			$TS3AudioBot->disconnect();
			return $this->output->set_output(printJson(true, $this->lang->line('bot')[6]));
		}

		public function connect()
		{
			$this->output->set_content_type('application/json')->set_status_header(200);
			if (!$this->session->userdata('logged')) {
				return $this->output->set_output(printJson(false, $this->lang->line('main')[2]));
			}
			$TS3AudioBot = new TS3AudioBot();
			$TS3AudioBot->connect($this->input->post('id'));
			return $this->output->set_output(printJson(true, $this->lang->line('bot')[7]));
		}

		public function delete()
		{
			$this->output->set_content_type('application/json')->set_status_header(200);
			if (!$this->session->userdata('logged')) {
				return $this->output->set_output(printJson(false, $this->lang->line('main')[2]));
			}
			$template = htmlspecialchars($this->input->post('id'), ENT_QUOTES, "UTF-8");
			if ($template == 'default') {
				return $this->output->set_output(printJson(false, 'nope.'));
			}
			$TS3AudioBot = new TS3AudioBot();
			$botList     = json_decode($TS3AudioBot->botList(), true);
			if (!$TS3AudioBot->getSuccess($botList)) {
				return $this->output->set_output(printJson(false, $TS3AudioBot->getSuccess($botList)));
			}
			foreach ($botList as $value) {
				if ($value['Name'] == $template && $value['Status'] == 2) {
					$TS3AudioBot->useInstance($value['Id']);
					$TS3AudioBot->disconnect();
					break;
				}
			}
			$this->db->query("DELETE FROM `bots` WHERE `id`='$template'");
			$TS3AudioBot->settingsDelete($template);
			return $this->output->set_output(printJson(true, $this->lang->line('bot')[8]));
		}

		public function edit()
		{
			$this->output->set_content_type('application/json')->set_status_header(200);
			if (!$this->session->userdata('logged')) {
				return $this->output->set_output(printJson(false, $this->lang->line('main')[2]));
			}
			$name       = htmlspecialchars($this->input->post('name'), ENT_QUOTES, "UTF-8");
			$server     = htmlspecialchars($this->input->post('server'), ENT_QUOTES, "UTF-8");
			$channel_id = htmlspecialchars($this->input->post('channel_id'), ENT_QUOTES, "UTF-8");
			$group_id   = htmlspecialchars($this->input->post('group_id'), ENT_QUOTES, "UTF-8");
			$template   = htmlspecialchars($this->input->post('template'), ENT_QUOTES, "UTF-8");
			$id         = htmlspecialchars($this->input->post('id'), ENT_QUOTES, "UTF-8");
			if (empty($name) || empty($server) || empty($channel_id) || empty($group_id) || empty($template)) {
				return $this->output->set_output(printJson(false, str_replace('%param', 'name, server, channel_id, group_id', $this->lang->line('main')[3])));
			}
			$bot         = $this->db->query("SELECT * FROM `bots` WHERE `id`='$template'")->row_array();
			$TS3AudioBot = new TS3AudioBot();
			$TS3AudioBot->useInstance($id);
			if ($name !== $bot['name']) {
				$this->db->query("UPDATE `bots` SET `name`='$name'");
				$TS3AudioBot->setName($name);
			}
			if ($server !== $bot['server']) {
				$this->db->query("UPDATE `bots` SET `server`='$server'");
				$TS3AudioBot->settingsBotSet($template, 'connect.address', $server);
				$TS3AudioBot->disconnect();
				$TS3AudioBot->connect($template);
			}
			if ($channel_id !== $bot['channel_id']) {
				$this->db->query("UPDATE `bots` SET `channel_id`='$channel_id'");
				$TS3AudioBot->settingsBotSet($template, 'connect.channel', "/$channel_id");
				$TS3AudioBot->move($channel_id);
			}
			if ($group_id !== $bot['group_id']) {
				$this->db->query("UPDATE `bots` SET `group_id`='$group_id'");
				$TomlEditor = new TomlEditor();
				$TomlEditor->editTabele($template, $group_id);
			}
			return $this->output->set_output(printJson(true, $this->lang->line('bot')[10]));
		}
	}
