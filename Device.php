<?php
/**
 * Created by PhpStorm.
 * User: jianghe
 * Date: 18/6/21
 * Time: 14:41
 */
namespace App\Services\ThirdPlatform\Feyin;

use App\Services\ThirdPlatform\Feyin\Kernel\Contracts\FeyinAbstract;

class Device extends FeyinAbstract
{
    /**
     * @param string $deviceNo
     *
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137507667653274
     * @return mixed
     */
    public function bind(string $deviceNo)
    {
        return $this->httpResponse($this->httpRequest('post', '/device/' . $deviceNo . '/bind'));
    }
    
    /**
     * @param string $deviceNo
     *
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137509753588484
     * @return mixed
     */
    public function unbind(string $deviceNo)
    {
        return $this->httpResponse($this->httpRequest('post', '/device/' . $deviceNo . '/unbind'));
    }
    
    /**
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137482508752804
     * @return mixed
     */
    public function devices()
    {
        return $this->httpResponse($this->httpRequest('get', '/devices'));
    }
    
    /**
     * @param string $deviceNo
     *
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137482508752804
     * @return mixed
     */
    public function device(string $deviceNo)
    {
        return $this->httpResponse($this->httpRequest('get', '/device/' . $deviceNo . '/status'));
    }
    
    /**
     * @param string $deviceNo
     *
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137485737154827
     * @return mixed
     */
    public function clearMessage(string $deviceNo)
    {
        return $this->httpResponse($this->httpRequest('post', '/device/' . $deviceNo . '/msg/clear'));
    }
    
}