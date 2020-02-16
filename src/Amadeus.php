<?php
namespace ShaBax\Amadeus;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\ServiceProvider;
use ShaBax\Amadeus\Auth; //
use ShaBax\Amadeus\Flight;

class Amadeus extends Controller
{

	public static $client_id;
	public static $client_secret;
	public static $grant_type;
	public static $sandbox;
	public static $test_link;
	public static $live_link;
	public static $timeout;
	public static $RETURNTRANSFER;

	public static $access_token = null;
	public static $base_url = null;

	public function __construct()
	{

		self::$client_id      	= config('amadeus.client_id');
		self::$client_secret    = config('amadeus.client_secret');
		self::$grant_type    	= config('amadeus.grant_type');
	 	self::$sandbox 			= config('amadeus.sandbox');
	 	self::$test_link    	= config('amadeus.test_link');
	 	self::$live_link     	= config('amadeus.live_link');
	 	self::$timeout     		= config('amadeus.timeout');
		self::$RETURNTRANSFER   = config('amadeus.RETURNTRANSFER');
		
		self::$base_url=self::$live_link;
		if(self::$sandbox==true){
			self::$base_url=self::$test_link;
		}
		Auth::getAccessToken(); 
	 }
	 
	 public static function flightLowFareSearch($params)
	 {
		return Flight::flightLowFareSearch($params);
	 }
	 public static function flightInspirationSearch($params)
	 {
		return Flight::flightInspirationSearch($params);
	 }
	 public static function flightCheapestDateSearch($params)
	 {
		return Flight::flightCheapestDateSearch($params);
	 }
	 public static function flightOffersSearch($params)
	 {
		return Flight::flightOffersSearch($params);
	 }
	 public static function flightSeatMap($params)
	 {
		return Flight::flightSeatMap($params);
	 }

}