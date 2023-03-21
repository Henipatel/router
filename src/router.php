<?php
namespace Heni\PhpRouter;

class Router
{
    public static function handle($method = 'GET', $path = "/", $filename = '')
    {


        $currentmethod = $_SERVER['REQUEST_METHOD'];
        $currenturl = $_SERVER['REQUEST_URI'];
        if ($currentmethod != $method) {
            return false;
        }


        $root = '';
        $pattern = '#^'.$root.$path.'$#siD';

        if (preg_match($pattern, $currenturl)) {
            //if($filename instanceof Closure) {
            if(is_callable($filename)) {
                $filename();

            }else{
                require_once $filename;
                exit();
            }

        }

        return false;

    }


    public static function get( $path = "/", $filename = '')
    {

        return self::handle('GET', $path, $filename);
    }

    public static function post( $path = "/", $filename = '')
    {

        return self::handle('POST', $path, $filename);
    }
    public static function put( $path = "/", $filename = '')
    {

        return self::handle('PUT', $path, $filename);
    }
    public static function delete( $path = "/", $filename = '')
    {

        return self::handle('DELETE', $path, $filename);
    }
    public static function patch( $path = "/", $filename = '')
    {

        return self::handle('PATCH', $path, $filename);
    }

}

?>