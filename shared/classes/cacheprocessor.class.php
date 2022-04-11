<?php
    // ==================================================================
	//  Author: Roi Mark Gamba
	//	Name: 	CACHE PROCESS
	// 	Desc:   This class will process the cache so if there is a specific data that we want to request we don't have to manually code it.
	// ==================================================================


    class cacheprocessor
    {
        //GETS THE DATE AND TIME PRIOR TO THE JSON DATA
        private function dateTimeToGet($date)
        {
            $currentTime = time();

            // IF DATE IS GREATER THAN TODAY GET PEAK HOUR TIME
            if(strtotime(date("Y-m-d") > strtotime($date))):
                $currentTime = strtotime('00:00:00');
            endif;
            
            $weatherTimeTables = array('00:00:00','03:00:00','06:00:00','09:00:00','12:00:00','15:00:00','18:00:00','21:00:00','24:00:00');

            $time = $weatherTimeTables[0];

            $length = count($weatherTimeTables);
            for($i = 0; $i < $length - 1; ++$i) :
                if($currentTime >= strtotime($weatherTimeTables[$i]) && $currentTime < strtotime($weatherTimeTables[$i+1])):
                    $time = $weatherTimeTables[$i] ?? $weatherTimeTables[$i+1];
                endif;
            endfor;

            return $date." ".$time;
        }
        public function fetchWeather($jsonData, $city, $date)
        {
            $dateToFetch = $this->dateTimeToGet($date);
            $jsonData = json_decode($jsonData, true);

            $weatherDetails = $jsonData[ucfirst($city)]['cityWeatherArray'][$dateToFetch];

            if(!empty($weatherDetails)):
                return $weatherDetails;
            endif;

            return false;
        }

        public function getWeatherIcon($weatherId)
        {
            $weatherIcons = array();
            $colorIcon    = "";
            $plainIcon    = "";
            if($weatherId >= 200 && $weatherId <= 232): //THUNDERSTORM
                $colorIcon .= "icons8-cloud-lightning-100.png";
                $plainIcon .= "01d.png";
            elseif($weatherId >= 300 && $weatherId <= 321): //Drizzle
                $colorIcon .= "icons8-umbrella-100.png";
                $plainIcon .= "09d.png";
            elseif($weatherId >= 500 && $weatherId <= 531): //RAIN
                $colorIcon .= "icons8-rainwater-catchment-100.png";
                $plainIcon .= "09d.png";
            elseif($weatherId >= 600 && $weatherId <= 622): //SNOW
                $colorIcon .= "icons8-snow-100.png";
                $plainIcon .= "13d.png";
            elseif($weatherId >= 701 && $weatherId <= 781): //Atmosphere
                $colorIcon .= "icons8-wind-100.png";
                $plainIcon .= "13d.png";
            elseif($weatherId >= 800 && $weatherId <= 800): //Clear
                $colorIcon .= "icons8-sun-100.png";
                $plainIcon .= "01d.png";
            elseif($weatherId >= 801 && $weatherId <= 804): //Clouds
                $colorIcon .= "icons8-cloud-100.png";
                $plainIcon .= "03d.png";
            endif;

            $weatherIcons['colorIcon'] = $colorIcon;
            $weatherIcons['plainIcon'] = $plainIcon;

            return $weatherIcons;
        }

        public function getCityDetails($jsonData, $city)
        {
            
            $jsonData = json_decode($jsonData, true);
            $cityDetails = $jsonData[ucfirst($city)]['cityDetailedArray'];
            if(!empty($cityDetails)):
                return $cityDetails;
            endif;

            return false;
        }

    }
    