<?php 


namespace ShaBax\Amadeus;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Flight extends Model
{
    /*
    The Flight Low-fare Search REST/JSON API is a traditional flight search API that enables you to find the best flight offers that match your search (one-way and round-trip) from a wide choice of airlines.
    The result contains the flight details and will allow the user to select their preferred option based on either price or convenience. A wide range of search criteria can be applied to narrow the search results.
    */
    public static function flightLowFareSearch($params){
        
        return MyClient::get('v1/shopping/flight-offers',$params);
    }

    /*
    The Flight Inspiration Search REST/JSON API enables you get a list of destinations from a given origin (city or airport) and the cheapest price for each one. 
    The API can tell you the price of flying from a given origin to some destination, for a trip of a given duration, that falls within a given date range.
    */
    public static function flightInspirationSearch($params){
        
        return MyClient::get('v1/shopping/flight-destinations',$params);
    }

    /*
    The Flight Cheapest Date Search REST/JSON API is an open search API that enables you to find the cheapest dates to a given city or airport.
    The API returns a list of flight-date options containing the flight dates and the flight price. Links to the Flight Low-fare Search API are also provided to allow you to confirm the price and availability of the fare.
    */
    public static function flightCheapestDateSearch($params){
        
        return MyClient::get('v1/shopping/flight-dates',$params);
    }

    /*
    The Flight Offers Search API allows to get cheapest flight recommendations and prices on a given journey. It provides a list of flight recommendations and fares from a given origin (city or airport), 
    for a given date (or date range) and for a given list of passengers. Additional information such as bag allowance, first ancillary bag prices or fare details are also provided.
    */
    public static function flightOffersSearch($params){
        
        return MyClient::get('v2/shopping/flight-offers',$params);
    }

    /*
    The Seatmap Display REST/JSON API is an open API that allows you to retrieve the seat map of one or several flights.
    */
    public static function flightSeatMap($params){
        
        return MyClient::get('v1/shopping/seatmaps',$params);
    }
}