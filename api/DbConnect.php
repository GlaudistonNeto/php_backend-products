<?php
	# Database Connection
	class DbConnect {
		private $server = 'localhost';
		private $dbname = 'php_store';
		private $user = 'root';
		private $pass = '';

		public function connect() {
			try {
				$conx = new PDO('mysql:host='.$this->server.';dbname='.$this->dbname,
                        $this->user, $this->pass);
				$conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conx;
			} catch (\Exception $err) {
				echo "Database Error: " . $err->getMessage();
			}
		}
	}
?>
