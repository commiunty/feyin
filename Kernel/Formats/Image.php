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

class Image extends FormatAbstract
{
    
    public function text(string $url, int $threshold=0)
    {
        return '<IMG# src=' . $url . ' threshold=' . $threshold . '/>';
    }
}