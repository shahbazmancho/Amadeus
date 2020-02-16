<?php 


namespace ShaBax\Amadeus;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Auth extends Model
{
    public static function createAccessToken(){
        $url=Amadeus::$base_url."v1/security/oauth2/token";
        try{
            $client = new Client(); //GuzzleHttp\Client
            $result = $client->post($url, [
                'form_params' => [
                    'client_id' => Amadeus::$client_id,
                    'client_secret' => Amadeus::$client_secret,
                    'grant_type' =>  Amadeus::$grant_type,
                ]
            ]);  
            
            if($result->getStatusCode()){
                $result = json_decode($result->getBody());

                if(isset($result->access_token)){
                    Amadeus::$access_token=$result->access_token;
                    return true;
                }

            }
            else{
                return false;
            }

        }
        catch(GuzzleException $exception){
            // $response = $exception->getResponse();
            // $result= json_decode($response->getBody()->getContents());

            return false;
        }

    }
    public static function getAccessToken(){
        if(Amadeus::$access_token==null){
            return Auth::createAccessToken();
        }
        else{
            $endPoint="v1/security/oauth2/token/".Amadeus::$access_token;
            $result=MyClient::get($endPoint);
            if($result->state=='expired'){
                return Auth::createAccessToken();
            }
            if(isset($result->access_token)){
                Amadeus::$access_token=$result->access_token;
                return true;
            }
            else{
                return Auth::createAccessToken();
            }
        }
    }
}