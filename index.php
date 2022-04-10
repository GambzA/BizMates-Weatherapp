<?php
    include('config.php');
    include('shared/libraries.php');

    // GET PAGE REQUEST
    $page = $_GET['page'] ?? 'home';
    $data = $_GET['data'] ?? false;

    if(!empty($page)):

        if(empty($data) && $page == 'city'):
            $page = '404';
        endif;

        // REFRESH CACHE DATA
        $cacheValidated = $cache->validateCache('city_details.json', $PLACES);

        if($cacheValidated):
            // LET'S LOAD THE JSON FILE FOR USE IN THE PAGE
            $jsonCachedData = file_get_contents(CACHE_DIR.'/city_details.json');
            // $cachedData     = json_decode($jsonCachedData, true);
            
            if(empty($jsonCachedData)): // THIS IS JUST A CATCHER SO THAT VISITOR CAN'T SEE THE CONTENTLESS PAGE
                $page = '404';
            endif;
        endif;
 

        // PROCEEDS TO WEBSITE
        include(WEBSITE_DIR."index.php");
   
    endif;
    