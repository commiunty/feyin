<?php
/**
 * Created by PhpStorm.
 * User: jianghe
 * Date: 18/6/21
 * Time: 14:41
 */
namespace App\Services\ThirdPlatform\Feyin;

use App\Services\ThirdPlatform\Feyin\Kernel\Contracts\FeyinAbstract;

class Member extends FeyinAbstract
{
    /**
     * @param string $uid
     *
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137512508334693
     *
     * @return mixed
     */
    public function member(string $uid)
    {
        return $this->httpResponse($this->httpRequest('post', '/member/' . $uid));
    }
    
    /**
     * @param string $appId
     *
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137513175133582
     *
     * @return mixed
     */
    public function members(string $appId)
    {
        return $this->httpResponse($this->httpRequest('get', '/app/' . $appId . '/members'));
    }
    
}