<?php
set_include_path(get_include_path()
	.PATH_SEPARATOR.'Components/Models'
	.PATH_SEPARATOR.'Components/Views'
	.PATH_SEPARATOR.'Components/Controllers'
	);
function __autoload($class)
{
	require_once($class.'.php');
}
MainController::Route();