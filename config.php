<?php
    setlocale(LC_ALL,"PH");
    date_default_timezone_set('Asia/Manila');
    header('Content-Type: text/html; charset=utf-8');

    $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';


    // INITIAL CONFIG
    define("BRAND_NAME", "Bizmates Weather App");
    define("BASE_URL", "{$protocol}{$_SERVER['SERVER_NAME']}/BizMates-Weatherapp-1/");
    

    // RESOURSE DIRECTORY
    define("WEBSITE_DIR" , "main/");
    define("API_DIR"     , "api/");
    define("JS_DIR"      , BASE_URL.WEBSITE_DIR."js/");
    define("CSS_DIR"     , BASE_URL.WEBSITE_DIR."css/");
    define("IMG_DIR"     , BASE_URL.WEBSITE_DIR."img/");
    define("FONT_DIR"    , BASE_URL.WEBSITE_DIR."font/");
    define("TEMPLATE_DIR", BASE_URL.WEBSITE_DIR."template/");
    define("CACHE_DIR"   , "cache/");
   

    // FOURSQUARE API CONFIGURATIONS
    define("FOURSQUARE_API_KEY"            ,"fsq3uKRPBVMMYvpHySvDpQQcL133htPfXZoFYcsR3gss+Q8=");
    define("FOURSQUARE_OAUTH_CLIENT_ID"    ,"IDJ1JY5XY4KWWELTK2WHNNXRQWN3FYPU0QPSRKKSWIQFTKBN");
    define("FOURSQUARE_OAUTH_CLIENT_SECRET","HXAYAEBE1QCFEYWI3DLWGRVDAIWGD40HES5H5PMDC43TUBYH");

    // OPEN WEATHER API CONFIGURATIONS
    define("OPENWEATHER_API_KEY"           ,"b7c58a9ff44f95c28be08e143f2259dd");


    // CACHE CONFIGURATIONS
    define("REFRESH_INTERVAL"           ,"1440"); // SET INTERVAL FOR CACHE REFRESH / REFETCH DATA FROM API (IN MINUTES) / 1440 IS 1 DAY

    // SINCE THERE IS NO DATABASE TO BEGIN WITH LET'S JUST DECLARE ALL THE PLACES IN AN ARRAY.
    // WE ONLY NEED TO STORE THE CITY_NAME,COUNTRY_CODE SINCE WE WANT TO UTILIZE THE API FEATURES THAT WE HAVE
    $PLACES = array(
        "tokyo" => array(
            "city_name" => "Tokyo",
            "img" => "tokyo-min.png",
            "description" => "Tokyo is the capital of Japan and the center of the Greater Tokyo Area. It is the most populous metropolitan area in the world.",
        ),
        "yokohama" => array(
            "city_name" => "Yokohama",
            "img" => "yokohama-min.png",
            "description" => "Yokohama is a city in Kanagawa Prefecture, Japan. It is the second-largest city in Japan after Tokyo.",
        ),
        "kyoto" => array(
            "city_name" => "Kyoto",
            "img" => "kyoto-min.png",
            "description" => "Kyoto is the capital of the Prefecture of Kyoto. It is the oldest city in Japan, and the most populous city in Japan.",
        ),
        "osaka" => array(
            "city_name" => "Osaka",
            "img" => "osaka-min.png",
            "description" => "Osaka is the capital of Osaka Prefecture, Japan. It is the most populous city in Japan.",
        ),
        "sapporo" => array(
            "city_name" => "Sapporo",
            "img" => "sapporo-min.png",
            "description" => "Sapporo is the capital of Hokkaido Prefecture, Japan. It is the largest city in Japan.",
        ),
        "nagoya" => array(
            "city_name" => "Nagoya",
            "img" => "nagoya-min.png",
            "description" => "Nagoya is the capital of Aichi Prefecture, Japan. It is the largest city in Japan.",
        ),
    );