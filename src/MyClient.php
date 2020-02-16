<?php 


namespace ShaBax\Amadeus;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MyClient extends Model
{
    public static function get($endpoint,$params=[]){
        $url=Amadeus::$base_url.$endpoint."?".http_build_query($params);
        $Authorization="Bearer ".Amadeus::$access_token;
        $requestParams=[
            'headers' => ['Content-Type' => 'application/vnd.amadeus+json','Authorization' => $Authorization],
            'verify' => false,
        ];
        try{
            $client = new Client(); //GuzzleHttp\Client
            $result = $client->get($url,$requestParams);  
            if($result->getStatusCode()){
                $result = json_decode($result->getBody());
                return $result;

            }
            else{
                $result = json_decode($result->getBody());
                return $result;
            }

        }
        catch(GuzzleException $exception){
            $response = $exception->getResponse();
            return json_decode($response->getBody()->getContents());
        }
    }
}