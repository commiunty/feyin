<?php
/**
 * Created by PhpStorm.
 * User: jianghe
 * Date: 18/6/21
 * Time: 14:41
 * @see https://www.showdoc.cc/web/#/feyin?page_id=217828703759570
 */
namespace App\Services\ThirdPlatform\Feyin\Formats;

use App\Services\ThirdPlatform\Feyin\Kernel\Contracts\FormatAbstract;

class Font extends FormatAbstract
{
    public function text(string $text, int $bold=0, int $width=1, int $height=1)
    {
        return '<Font# Bold=' . $bold . ' Width=' . $width . ' Height=' . $height .'>' . $text . '</Font#>';
    }
}