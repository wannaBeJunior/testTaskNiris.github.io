<?php

class View
{
	public function generate($viewName, $templateView = null, $data)
	{
		if($templateView != null)
		{
			require_once "view/{$templateView}.php";
		}
		require_once "view/{$viewName}.php";
	}
}