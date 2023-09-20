<?php

class Session
{

	public static function init()
	{
		if (version_compare(phpversion(), '5.4.0', '<')) {
			if (session_id() == "") {
				session_start();
			}
		} else {
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
		}
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		} else {
			return false;
		}
	}

	public static function sessionCheck()
	{
		if (self::get("login") == false) {
			//self::destroy();
			header("Location: index.php");
		}
	}

	public static function sessionLoginCheck()
	{
		if (self::get("login") == true) {
			header("Location: dashboard.php");
		}
	}

	public static function destroy()
	{
		session_destroy();
		session_unset();
		header("Location: index.php");
	}

	public static function unset()
	{
		$_SESSION['user_start'] = time();

		// Then when they get to submitting the payment, just check whether they're within the 5 minute window
		if (time() - $_SESSION['user_start'] < 10) { // 300 seconds = 5 minutes
			// they're within the 5 minutes so save the details to the database
		} else {
			// sorry, you're out of time
			unset($_SESSION['user_start']); // and unset any other session vars for this task
		}
		$min = 1;
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > ($min * 60))) {
			session_unset();     // unset $_SESSION   
			session_destroy();   // destroy session data  
		}
		$_SESSION['LAST_ACTIVITY'] = time();
	}
}
