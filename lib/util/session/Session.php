<?php
namespace util\session;
/**
 * 
 */
class Session
{
    public static function setValue($key, $value)
    {
        session_start();
        $_SESSION[$key] = $value;
    }

    public static function getValue($key)
    {
        session_start();
        return $_SESSION[$key];
    }

    public static function destroy()
    {
        session_start();
        session_destroy();
        unset( $_SESSION );
    }

    public static function clear($key)
    {
        unset($_SESSION[$key]);
    }
}
