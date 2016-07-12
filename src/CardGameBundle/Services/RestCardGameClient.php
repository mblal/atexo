<?php
namespace CardGameBundle\Services;

use AMF\WebServicesClientBundle\Rest\Endpoint;
use AMF\WebServicesClientBundle\Rest\Exception\RestException;
use AMF\WebServicesClientBundle\AMFWebServicesClientEvents;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Le point d'entrée au service REST
 *
 * Class RestCardGameClient
 * @package CardGameBundle\Services
 */
class RestCardGameClient extends Endpoint
{
    /**
     * @param $resource
     * @param array $params
     * @return \AMF\WebServicesClientBundle\Rest\RestResponse
     * @throws RestException
     * @throws \Exception
     */
    public function get($resource, array $params = array())
    {
        try {
            return $this->call(AMFWebServicesClientEvents::REST_GET_REQUEST, $resource, $params, array());
        }catch (RestException $e){
           throw $e;
        }catch(\Exception $e){
            throw $e;
        }
    }

    /**
     * @param $resource
     * @param $content
     * @return Array $response
     * @throws RestException
     */
    public function post($resource, $content)
    {
        $url = $this->url->getScheme().'://'.$this->url->getHostname().'/'.$resource;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response = new JsonResponse();
        $response->setStatusCode($status);
        if ( $status != 200) {
            return array('statusCode' => $status, 'message' => json_decode($json_response,true));
        }else{
            return array('statusCode' => $status, 'message' => 'Solution correcte');
        }
        curl_close($curl);
        return $response;
    }

    public function amfPost($resource, array $data=array()){
        $requestData = array('params' => $data);
        $response = $this->call(AMFWebServicesClientEvents::REST_POST_REQUEST, $resource, array(), $requestData);
    }
}