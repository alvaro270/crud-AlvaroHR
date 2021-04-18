<?php
    define('_HOST_NAME','localhost');
    define('_DATABASE_NAME','semana5');
    define('_DATABASE_USER_NAME','root');
    define('_DATABASE_PASSWORD','');
/*$MySQLiconn: objeto que sirve para la conexion a la bd*/
/*semana 5: db creada en phpMyAdmin*/
/*$ es para generar una variable en php*/
    $MySQLiconn = new MySQLi(_HOST_NAME,
    _DATABASE_USER_NAME,_DATABASE_PASSWORD,
    _DATABASE_NAME);

    if($MySQLiconn->connect_errno)
    {
        die("ERROR : -> ".$MySQLiconn->connect_error);
    }