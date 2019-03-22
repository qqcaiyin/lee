<?php

namespace App\Exceptions;

use Exception;
use Throwable;


class ApiException extends \Exception
{
    //public function __construct($msg = "" ,$code)
	//{
	//	parent::__construct($msg);
	//}

	public function __construct($message = "", $code = 404)
	{
		parent::__construct($message, $code);
	}

	//


}
