<?php
	/**
	* SSLCOMMERZ PAYMENT GATEWAY FOR CodeIgniter
	*
	* Module: Pay Via API (CodeIgniter 3.1.6)
	* Developed By: Prabal Mallick
	* Email: prabal.mallick@sslwireless.com
	* Author: Software Shop Limited (SSLWireless)
	*
	**/

	// defined('BASEPATH') OR exit('No direct script access allowed');

	// define("SSLCZ_STORE_ID", "govti60c4e8a35370a");
	// define("SSLCZ_STORE_PASSWD", "govti60c4e8a35370a@ssl");

	// # SESSION & VALIDATION API
	// define("SSLCZ_SESSION_API", ".sslcommerz.com/gwprocess/v4/api.php");
	// define("SSLCZ_VALIDATION_API", ".sslcommerz.com/validator/api/validationserverAPI.php");

	// # IF SANDBOX TRUE, THEN IT WILL CONNECT WITH SSLCOMMERZ SANDBOX (TEST) SYSTEM
	// define("SSLCZ_IS_SANDBOX", true);

	defined('BASEPATH') OR exit('No direct script access allowed');

	define("SSLCZ_STORE_ID", "govtictofficersorglive");
	define("SSLCZ_STORE_PASSWD", "60F538CEA016531075");

	# SESSION & VALIDATION API
	define("SSLCZ_SESSION_API", ".sslcommerz.com/gwprocess/v4/api.php");
	define("SSLCZ_VALIDATION_API", ".sslcommerz.com/validator/api/validationserverAPI.php");

	# IF SANDBOX TRUE, THEN IT WILL CONNECT WITH SSLCOMMERZ SANDBOX (TEST) SYSTEM
	define("SSLCZ_IS_SANDBOX", true);
