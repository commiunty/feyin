<?php
/**
 * Created by PhpStorm.
 * User: jianghe
 * Date: 18/6/21
 * Time: 14:41
 */
namespace App\Services\ThirdPlatform\Feyin\Kernel\Contracts;

use GuzzleHttp\Client;
use Cache;
use GuzzleHttp\Psr7\Response;
use App\Services\ThirdPlatform\Feyin\Kernel\Exceptions\BaseException;

abstract class FeyinAbstract
{
    /**
     * @var Client
     */
    protected $httpClient;
    
    /**
     * @var
     */
    protected $accessToken;
    
    /**
     * FeyinAbstract constructor.
     *
     * @param array $config
     */
    public function __construct(array $config=[])
    {
        if (empty($config)) {
            $this->httpClient = new Client([
                'base_uri' => config('feyin.base_url'),
                'timeout'  => 3.0,
            ]);
            $this->setAccessToken(config('feyin.code'), config('feyin.secret'));
        } else {
            $this->httpClient = new Client([
                'base_uri' => $config['base_url'],
                'timeout'  => 2.0,
            ]);
            $this->setAccessToken($config['code'], $config['secret']);
        }
    }
    
    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
    
    /**
     * @param string $code
     * @param string $secret
     */
    public function setAccessToken(string $code, string $secret)
    {
        $params = [
            'code'   => $code,
            'secret' => $secret,
        ];
        $redisKey = md5(\GuzzleHttp\json_encode($params));
        if($redisValue = Cache::get($redisKey)){
            $this->accessToken = $redisValue;
        }else{
            $res = $this->httpResponse($this->httpClient->request('GET', '/token?' . http_build_query($params)));
            $this->accessToken = $res['access_token'];
            Cache::put($redisKey, $this->accessToken, 100);
        }
    }
    
    /**
     * 统一请求
     * TODO 后期优化成类
     * @param string $method
     * @param string $uri
     * @param array  $params
     *
     * @return mixed
     */
    public function httpRequest(string $method, string $uri, array $params=[])
    {
        $method = strtoupper($method);
        // if (!empty($params)) {
        //     $clientHandler = $this->httpClient->getConfig('handler');
        //     $tapMiddleware = Middleware::tap(function ($request) {
        //         dd( $request->getBody()->getContents());
        //     });
        //     $params = array_merge($params, [
        //         'handler' => $tapMiddleware($clientHandler)
        //     ]);
        // }
        return $this->httpClient->request($method, $uri . '?access_token=' . $this->accessToken, $params);
    }
    
    /**
     * 统一返回
     * TODO 后期优化成类
     * @param Response $res
     *
     * @return mixed
     */
    public function httpResponse(Response $res)
    {
        throw_if($res->getStatusCode() !== 200, BaseException::class, '获取基础数据失败,请重试');
        $content = \GuzzleHttp\json_decode($res->getBody()->getContents(), true);
        throw_if(isset($content['errcode']) && $content['errcode']!==0, BaseException::class, $content['errmsg']??'');
        return $content;
    }
}