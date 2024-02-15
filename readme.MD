# Restfull API with codeignaiter 3

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

## How to use ?

1. clone github

   ```bash
   git clone https://github.com/NaufalHafizh/CI3-RestAPI.git
   ```

2. create a new database and import the existing sql database in the project
3. customize the configuration in **application/config/database.php**

   ```PHP
	$db['default'] = array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'yourdatabasename', //change to your database name
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

4. install required dependencies/vendors

   ```bash
   composer install
   ```

5. start a PHP local development server

   ```bash
   php -S localhost:8000
   ```

6. Test API With Postman or Thunder client
7. Base URL **http://localhost:8000/Api/**

## Acknowledgement

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
