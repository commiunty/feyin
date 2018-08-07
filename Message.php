<?php
/**
 * Created by PhpStorm.
 * User: jianghe
 * Date: 18/6/21
 * Time: 14:41
 */
namespace App\Services\ThirdPlatform\Feyin;

use App\Services\ThirdPlatform\Feyin\Kernel\Contracts\FeyinAbstract;

class Message extends FeyinAbstract
{
    /**
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137480480291039
     *
     * @param string $content
     * @param string $deviceNo
     *
     * @return mixed
     */
    public function send(string $deviceNo, string $content)
    {
        return $this->httpResponse($this->httpRequest('post', '/msg', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'msg_content' => $content,
                'device_no' => $deviceNo,
            ]
        ]));
    }
    
    /**
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137483230836456
     *
     * @param string $msgNo
     *
     * @return mixed
     */
    public function status(string $msgNo)
    {
        return $this->httpResponse($this->httpRequest('post', '/device/' . $msgNo . '/status'));
    }
    
    /**
     * @see https://www.showdoc.cc/web/#/feyin?page_id=137484328207980
     *
     * @param string $msgNo
     *
     * @return mixed
     */
    public function cancel(string $msgNo)
    {
        return $this->httpResponse($this->httpRequest('post', '/msg/' . $msgNo . '/cancel'));
    }
}