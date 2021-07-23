<?php

class Model
{

	protected $pdo;

	function __construct()//Создам подключение к БД в базовом классе для того чтобы не дублировать его в каждом классе
	{
		require_once 'config/config.php';//Подключим файл с конфигурацией
		$dsn = "{$config['PDO']['driver']}:host={$config['PDO']['host']};port={$config['PDO']['port']};dbname={$config['PDO']['dbName']};charset={$config['PDO']['charset']}";//Заполним строку dsn

		$opt = [
        	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        	PDO::ATTR_EMULATE_PREPARES => false
    	];//Зададим опции при подключении такие как выдачу ошибок только через исключения и зададим fetch_mode чтобы не писать его в каждом запросе 

    	
    	$this->pdo = new PDO($dsn, $config['PDO']['dbUser'], $config['PDO']['dbPassword'], $opt);//Подключаемся к БД
    	
	}

}