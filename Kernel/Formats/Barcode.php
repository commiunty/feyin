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

class Barcode extends FormatAbstract
{
    public function text(string $text, int $type, int $height)
    {
        return '<Barcode# Type='. $type .' Height='. $height .'>此处为目标条码的编码' . $text . '</Barcode#>';
    }
}