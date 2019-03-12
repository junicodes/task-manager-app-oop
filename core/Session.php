<?php

/**
 * Session Class
 */

namespace App\Core;

class Session
{

	public static $active_session = [];


	public static function start()
	{
		return session_start();
	}

	public static function destroy()
	{
		return session_destroy();
	}

	public static function bindSession($sess, $session= [])
	{
		static::$active_session[$sess] = $session;
		
	}

	public function activeSession($sess)
	{

		if (array_key_exists($sess, static::$active_session)) 
		{

			return static::$active_session;

		}

	}

}