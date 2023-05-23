<?php

class View
{
	function __construct()
	{
		//echo "<br>we are in page View";
		$this->result = "OK";
	}

	function Render($name, $data = null)
	{
		$name=ucfirst($name);
		if($name!='Login/index')
		{
		require("Views/Header.php");
		require("Views/".$name.".php");
		require("Views/Footer.php");
	}
	else {
		require("Views/".$name.".php");
	}
	}

}
