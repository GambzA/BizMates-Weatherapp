<?php
// ==================================================================
//  Author: Roi Mark Gamba
//	Name: 	HDD CACHE CLASS
// 	Desc: 	Class to connect to api services
// ==================================================================

use function GuzzleHttp\json_decode;

class apiconnector
{
    public function coordinatesByLocationName($city)
    {
        $response =  $this->guzzle->request('GET', "https://api.openweathermap.org/geo/1.0/direct?q=" . $city . "&limit=1&appid=" . OPENWEATHER_API_KEY, [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        if ($response->getBody()) :
            return $response->getBody();
        endif;

        return false;
    }

    public function placeSearch($long, $lat)
    {
        $response = $this->guzzle->request('GET', 'https://api.foursquare.com/v3/places/search?limit=5&ll=' . $lat . '%2C' . $long, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => FOURSQUARE_API_KEY,
            ]
        ]);

        if ($response->getBody()) :
            return $response->getBody();
        endif;

        return false;
    }

    public function getCurrentWeather($long, $lat)
    {
        $response = $this->guzzle->request('GET', 'api.openweathermap.org/data/2.5/forecast?cnt=55&units=metric&lat=' . $lat . '&lon=' . $long . '&appid=' . OPENWEATHER_API_KEY, [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        if ($response->getBody()) :
            return $response->getBody();
        endif;

        return false;
    }

    public function filterAndCompleteCityData($cityData)
    {
        $returnData = array();
        if (!empty($cityData)) :
            foreach ($cityData['results'] as $cityDataVal) :
                $returnData[$cityDataVal['fsq_id']]['name']       = $cityDataVal['name'];
                $returnData[$cityDataVal['fsq_id']]['type']       = $cityDataVal['categories'][0]['name']; // JUST GET THE MAIN PLACE TYPE TO NOT MAKE IT COMPLICATED
                $returnData[$cityDataVal['fsq_id']]['location']   = $cityDataVal['location']['formatted_address'];

                // GETS IMAGE DATA. WE JUST NEED THIS FOR INITIAL JSON LOADING AND REFRESHING
                $response = $this->guzzle->request('GET', 'https://api.foursquare.com/v3/places/' . $cityDataVal['fsq_id'] . '/photos', [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Authorization' => FOURSQUARE_API_KEY,
                    ],
                ]);

                if ($response->getBody()) :
                    $fsqImages = json_decode($response->getBody());
                    foreach($fsqImages as $image):
                        $returnData[$cityDataVal['fsq_id']]['images'][] = $image->prefix . 'original' . $image->suffix;
                    endforeach;
                endif;
            endforeach;
        else :
            return false;
        endif;

        return $returnData;
    }

    public function filterWeatherData($weatherData){
        $returnData = array();
        if (!empty($weatherData)) :
            foreach ($weatherData['list'] as $weatherDataVal) :
                $returnData[$weatherDataVal['dt_txt']]['temp']        = $weatherDataVal['main']['temp'];
                $returnData[$weatherDataVal['dt_txt']]['temp_min']    = $weatherDataVal['main']['temp_min'];
                $returnData[$weatherDataVal['dt_txt']]['temp_max']    = $weatherDataVal['main']['temp_max'];
                $returnData[$weatherDataVal['dt_txt']]['icon']        = $weatherDataVal['weather'][0]['icon'];
                $returnData[$weatherDataVal['dt_txt']]['id']          = $weatherDataVal['weather'][0]['id'];
                $returnData[$weatherDataVal['dt_txt']]['weather']     = $weatherDataVal['weather'][0]['main'];
                $returnData[$weatherDataVal['dt_txt']]['description'] = $weatherDataVal['weather'][0]['description'];
            endforeach;
        else :
            return false;
        endif;

        return $returnData;
    }
}
