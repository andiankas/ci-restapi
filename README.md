


# CodeIgniter RestAPI

A RESTAPI implementation for CodeIgniter.

## Installation

Download Or clone this repository. 

```bash
git clone https://github.com/andiankas/ci-restapi.git
```

## Usage
Change config base url on 
```bash
application/config/config.php


$config['base_url'] = 'http://localhost/xlearn/ci-restapi/';
```

And
Change database config on 
```bash
application/config/database.php

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'db_test_cirest_01', // your database name
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```

## Contributing

CodeIgniter RestServer
Check the recent version at https://github.com/chriskacerguis/codeigniter-restserver

My alternate version https://github.com/ardisaurus/old-rest-ci
ci-restapi

## License
[chriskacerguis](https://github.com/chriskacerguis/) | [ardisaurus](https://github.com/ardisaurus/)
