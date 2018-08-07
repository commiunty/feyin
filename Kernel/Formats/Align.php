<?php
/**
 * Created by PhpStorm.
 * User: jianghe
 * Date: 18/6/21
 * Time: 14:41
 * @see https://www.showdoc.cc/web/#/feyin?page_id=137570592155865
 */
namespace App\Services\ThirdPlatform\Feyin\Formats;

use App\Services\ThirdPlatform\Feyin\Kernel\Contracts\FormatAbstract;

class Align extends FormatAbstract
{
    public function left(string $text)
    {
        return '<left>' . $text;
    }
    
    public function center(string $text)
    {
        return '<center>' . $text;
    }
    
    public function right(string $text)
    {
        return '<right>' . $text;
    }
}