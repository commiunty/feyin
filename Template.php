<?php
/**
 * Created by PhpStorm.
 * User: jianghe
 * Date: 18/6/21
 * Time: 14:41
 */
namespace App\Services\ThirdPlatform\Feyin;

use App\Services\ThirdPlatform\Feyin\Kernel\Contracts\FeyinAbstract;

class Template extends FeyinAbstract
{
    /**
     * @param array $params
     *
     * @see https://www.showdoc.cc/web/#/1
     * @return mixed
     */
    public function store(array $params)
    {
        return $this->httpResponse($this->httpRequest('post', '/template', $params));
    }
    
    /**
     * @param array $params
     *
     * @see https://www.showdoc.cc/web/#/2
     * @return mixed
     */
    public function update(array $params)
    {
        return $this->httpResponse($this->httpRequest('post', '/template', $params));
    }
    
    /**
     * @see https://www.showdoc.cc/web/#/3
     * @return mixed
     */
    public function templates()
    {
        return $this->httpResponse($this->httpRequest('get', '/templates'));
    }
    
    /**
     * @param string $templateId
     *
     * @see https://www.showdoc.cc/web/#/4
     * @return mixed
     */
    public function detail(string $templateId)
    {
        return $this->httpResponse($this->httpRequest('get', '/template/' . $templateId));
    }
    
}