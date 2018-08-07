<?php
namespace App\Services\ThirdPlatform\Feyin;

use Illuminate\Support\Str;

class FeyinDispatcher
{
    /**
     * @param       $name
     * @param array $config
     *
     * @return mixed
     */
    public static function make($name, array $config=[])
    {
        $namespace = Str::studly($name);
        $application = __NAMESPACE__ . "\\{$namespace}";
    
        return new $application($config);
    }
    
    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}