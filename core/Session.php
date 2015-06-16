<?php

class Session 
{
	/**
	 * Start SESSIONS Handler
	 */
	static public function start()
	{
		@session_start();
	}
	
	/**
	 * Set session variable ( Name => Value )
	 * @param String $sName
	 * @param Mixed $mValue 
	 */
	static public function set( $sName , $mValue )
	{
		$_SESSION[ $sName ] = $mValue;
	}
	
	/**
	 * Get a session variable by name
	 * @param String $sName
	 * @return Mixed|Boolean
	 */
	static public function get( $sName )
	{
		return (isset($_SESSION[ $sName ])) ? $_SESSION[ $sName ] : false;
	}
	
	/**
	 * Kill a SESSION
	 * @param String $sName
	 * @return Boolean
	 */
	static public function kill( $sName )
	{
		if( isset( $_SESSION[ $sName ] ) )
		{
			unset( $_SESSION[ $sName ] );
			return true;
		}
		
		return false;
	}
	
	/**
	 * Return de Session ID
	 * @return String
	 */
	static public function sessionId()
	{
		return @session_id();
	}
	
	/**
	 * Destruye las sessiones actualmente en uso
	 */
	static public function destroy()
	{
		@session_unset();
		@session_destroy();
	}
}