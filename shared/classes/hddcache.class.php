<?php
// ==================================================================
//  Author: Roi Mark Gamba
//	Name: 	HDD CACHE CLASS
// 	Desc: 	Class that will handle caching for data fetched from API calls to json files. 
//          This will help prevent multiple calls from the API that will lead to a more optimized performance.
// ==================================================================


class hddcache extends apiconnector
{
    protected $guzzle;
    protected $dateTimeToday;

    function __construct(\GuzzleHttp\Client $guzzleService)
    {
        $this->guzzle        = $guzzleService;
        $this->dateTimeToday = date('Y-m-d H:i:s');
    }

    private function writeJsonFile($path, $filename, $jsonData)
    {
        $fp = fopen($path . $filename, 'w');
        fwrite($fp, json_encode($jsonData));
        fclose($fp);
    }

    private function refreshCache($jsonFileName = "", $cityData = array())
    {
        $jsonString = array();

        /* REPOPULATE FILE WITH PROPER DATA */
        if (!empty($cityData)) :
            // GET CITY LATITUDE AND LONGITUDE
            foreach ($cityData as $cities) :

                // GET CITY LATITUDE AND LONGITUDE
                $cityName             = $cities['city_name'];
                $cityCoordinates      = $this->coordinatesByLocationName($cityName);
                $cityCoordinatesArray = json_decode($cityCoordinates, true);
                $cityLongitude        = $cityCoordinatesArray[0]['lon'];
                $cityLatitude         = $cityCoordinatesArray[0]['lat'];

                // GET CITY DATA VIA FOURSQUARE API
                $cityDetails          = $this->placeSearch($cityLongitude, $cityLatitude);
                $cityDetailsArray     = json_decode($cityDetails, true);

                // FILTER CITY DATA
                $cityDetailsFiltered  = $this->filterAndCompleteCityData($cityDetailsArray);

                // GET WEATHER DATA VIA OPEN WEATHER API
                $cityWeather          = $this->getCurrentWeather($cityLongitude, $cityLatitude);
                $cityWeatherArray     = json_decode($cityWeather, true);

                // FILTER WEATHER DATA
                $cityWeatherDetailsFiltered  = $this->filterWeatherData($cityWeatherArray);

                // PREPARE JSON STRING FOR CACHE
                $jsonString[$cityName]['cityDetailedArray'] = $cityDetailsFiltered;
                $jsonString[$cityName]['cityWeatherArray']  = $cityWeatherDetailsFiltered;

            endforeach;
        else :
            return false;
        endif;


        if (!empty($jsonString)) :
            // WRITE JSON STRING TO FILE
            $this->writeJsonFile(CACHE_DIR, $jsonFileName, $jsonString);
        endif;
    }

    // CHECKS WETHER CACHE DATA IS PRESENT OR NOT
    public function validateCache($jsonFileName = "", $cityData = array())
    {
        
        clearstatcache();
        if (filesize(CACHE_DIR . $jsonFileName) > 0) :
            // CHECK IF DATA NEEDS REFRESHING
            
            //GET FILE LAST UPDATE
            $cacheFileStat         = stat(CACHE_DIR . $jsonFileName);
            $cacheFileLastModified = $cacheFileStat["mtime"];

            if(round(($cacheFileLastModified - strtotime($this->dateTimeToday)) / 60,2) > REFRESH_INTERVAL):
                $this->refreshCache($jsonFileName, $cityData);
            endif;
        else :
            $this->refreshCache($jsonFileName, $cityData);
        endif;

        

        return true;
    }
}
