<?php
/**
 * Created by PhpStorm.
 * User: jianghe
 * Date: 18/6/21
 * Time: 14:41
 * @see https://www.showdoc.cc/web/#/feyin?page_id=217826926294848
 */
namespace App\Services\ThirdPlatform\Feyin\Formats;

use App\Services\ThirdPlatform\Feyin\Kernel\Contracts\FormatAbstract;

class Qrcode extends FormatAbstract
{
    public function text(string $text, int $size=1)
    {
        return '<QRcode# Size=' . $size . '>' . $text .'</QRcode#>';
    }
}