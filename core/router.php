<?php

class Router
{
	static public function route()
	{
		$route = explode("/",$_SERVER['REQUEST_URI']);
		
		if($route[1] != null)
		{
			$controllerClassName = $route[1];
		}else
		{
			$controllerClassName = "Main";
		}

		if($route[2] != null) 
		{
			$actionName = $route[2];
		}else
		{
			$actionName = "Index";
		}

		if($route[3] != null)
		{
			$parameters = $router[3];
		}else
		{
			$parameters = null;
		}

		$controllerName = strtolower("controller_{$controllerClassName}");
		$modelName = strtolower("model_{$controllerClassName}");

		$controllerPath = "controller/{$controllerName}.php";
		$modelPath = "model/{$modelName}.php";

		try
		{
			if(file_exists($controllerPath))
			{
				require_once $controllerPath;
			}else
			{
				throw new Exception("{$controllerPath} dont exists", 1);
			}
		}catch(Exception $e)
		{
			echo $e->getMessage();
			die();
		}

		try
		{
			if(file_exists($modelPath))
			{
				require_once $modelPath;
			}else
			{
				throw new Exception("{$modelPath} dont exists", 1);
			}
		}catch(Exception $e)
		{
			echo $e->getMessage();
			die();
		}

		$controller = new $controllerName();
		
		try 
		{
			if(method_exists($controller, $actionName))
			{
				$controller->$actionName();
			}else
			{
				throw new Exception("Method not exists", 1);
			}
		}catch(Exception $e) {
			echo $e->getMessage();
			die();
		}
	}
}