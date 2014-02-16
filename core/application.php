<?php

use fixate as f8;

class Application {
	public $config = null;
	public $page = null;

	static function instance() {
		static $instance = null;
		if ($instance == null) {
			$instance = new static();
		}

		return $instance;
	}

	static function init($config, $page) {
		self::instance()->config = $config;
		self::instance()->page = $page;
	}

	static function run() {
		$controller = Controller::dynamic_load(self::instance());
		if (!$controller) {
			self::set_http_status(404);
			return false;
		}

		$controller->before();

		$req = f8\HttpRequest::instance();

		if ($resp = $controller->call($req)) {
			echo $resp->body();
		}

		$controller->after($resp);

		return true;
	}

	private function __clone() {
		trigger_error("Clone disabled for singleton class.", E_ERROR);
	}
}