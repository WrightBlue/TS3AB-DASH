<?php
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

	class TS3AudioBot
	{
		protected $CI;
		protected $host;
		protected $port;
		protected $auth;
		protected $instance = 0;

		public function __construct()
		{
			$this->CI   =& get_instance();
			$this->host = $this->CI->config->item('ts3ab')['host'];
			$this->port = $this->CI->config->item('ts3ab')['port'];
			$this->auth = "Authorization: Basic ".base64_encode($this->CI->config->item('ts3ab')['useruid'].':'.$this->CI->config->item('ts3ab')['apitoken']);
		}

		private function requestInstance($path)
		{
			$CURL = curl_init();
			curl_setopt($CURL, CURLOPT_URL, 'http://'.$this->host.':'.$this->port.'/api/bot/use/'.$this->instance.'/(/'.$path);
			curl_setopt($CURL, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($CURL, CURLOPT_HTTPHEADER, array($this->auth));
			$OUTPUT = curl_exec($CURL);
			curl_close($CURL);
			return $OUTPUT;
		}

		private function request($path)
		{
			$CURL = curl_init();
			curl_setopt($CURL, CURLOPT_URL, 'http://'.$this->host.':'.$this->port.'/api/'.$path);
			curl_setopt($CURL, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($CURL, CURLOPT_HTTPHEADER, array($this->auth));
			$OUTPUT = curl_exec($CURL);
			curl_close($CURL);
			return $OUTPUT;
		}

		public function useInstance($id)
		{
			$this->instance = $id;
		}

		public function botList()
		{
			return $this->request('bot/list');
		}

		public function create($host, $name)
		{
			return $this->requestInstance('bot/connect/to/'.rawurlencode($host).'/'.rawurlencode($name));
		}

		public function save($template)
		{
			return $this->requestInstance('bot/save/'.rawurlencode($template));
		}

		public function connect($template)
		{
			return $this->request('bot/connect/template/'.rawurlencode($template));
		}

		public function disconnect()
		{
			return $this->requestInstance('bot/disconnect');
		}

		public function setName($name)
		{
			return $this->requestInstance('bot/name/'.rawurlencode($name));
		}

		public function move($channel)
		{
			return $this->requestInstance('bot/move/'.rawurlencode($channel));
		}

		public function rightsReload()
		{
			return $this->requestInstance('rights/reload');
		}

		public function settingsBotSet($template, $path, $value)
		{
			return $this->request('settings/bot/set/'.$template.'/'.rawurlencode($path).'/'.rawurlencode($value));
		}

		public function settingsGlobalSet($path, $value)
		{
			return $this->request('settings/global/set/'.rawurlencode($path).'/'.rawurlencode($value));
		}

		public function settingsDelete($template)
		{
			return $this->request('settings/delete/'.rawurlencode($template));
		}

		public function getInstance()
		{
			$bots = json_decode($this->request('bot/list'), true);
			if (!isset($bots['ErrorMessage'])) {
				return array('Id' => $bots[0]['Id']);
			}
			return null;
		}

		public function getSuccess($data)
		{
			if (empty($data)) {
				return $this->CI->lang->line('main')[1];
			}
			else if (isset($data['ErrorMessage'])) {
				return $data['ErrorMessage'];
			}
			else {
				return true;
			}
		}
	}
