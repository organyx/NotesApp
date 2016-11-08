<?php

$config = parse_ini_file('config.ini');
$host = $config['user_host'];
$database = $config['user_dbname'];
$username = $config['user_username'];
$password = $config['user_password'];

$NotesApp = new mysqli($host, $username, $password, $database);

if($NotesApp->connect_error)
{
	trigger_error('Database connection failed: '  . $NotesApp->connect_error, E_USER_ERROR);
}