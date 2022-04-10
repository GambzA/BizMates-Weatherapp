<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead" style="background-image: url('<?= IMG_DIR; ?>home-banner.jpg');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <img src="<?= IMG_DIR; ?>Header Icon.png" class="img-fluid">
            </div>
            <div class="col-12 text-center">
                <a id="exp-now-btn" data-scroll href="#top-cities"><span>EXPERIENCE NOW</span></a><br />
                <i class="fa fa-chevron-down mt-3 text-white" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</header>
<!-- SUMMARY ABOUT US -->
<div class="my-5 py-5">
    <div class="container-fluid">
        <div class="d-flex justify-content-center my-5">
            <p class="text-center fs-1 lightgrey-text text-break w-75">
                Japan is an island country in East Asia. It is situated in the northwest Pacific Ocean,
                and is bordered on the west by the Sea of Japan, while extending from the Sea of Okhotsk in
                the north toward the East China Sea and Taiwan in the south.
            </p>
        </div>
        <div class="d-flex justify-content-center">
            <img src="<?= IMG_DIR; ?>jpn-divider.png" class="img-fluid" id="jpn-divider">
        </div>
    </div>
</div>
<!-- TOP CITIES -->
<div class="my-5 py-5">
    <div class="container" id="top-cities">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 id="top-cities-title" class="text-uppercase lightgrey-text">Top Cities</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="grid-container">
                <?php 
                    $ctr=1; 
                    $limitedPlaces = array_slice($PLACES, 0, 5);
                    foreach($limitedPlaces as $placeKey=>$placeVal): 
                        $weatherData = $cacheProcessor->fetchWeather($jsonCachedData, $placeKey, date('Y-m-d'));
                        $weatherIcon = $cacheProcessor->getWeatherIcon($weatherData['id']);
                ?>
                    <a class="item<?= $ctr; ?> thumbnail img-gradient" href="<?= BASE_URL; ?>city/<?= $placeKey; ?>/">
                        <img src="<?= IMG_DIR.$placeVal['img']; ?>" class="img-fluid thumbnail-img" alt="">
                        <div class="temp">
                            <h1><img src="https://openweathermap.org/img/wn/<?= $weatherIcon['plainIcon'] ?>" class="img-fluid" alt=""> <?= round($weatherData['temp_min']); ?>°C <?= strtoupper($weatherData['weather']); ?></h1>
                        </div>
                        <div class="caption">
                            <h1><?= strtoupper($placeVal['city_name']); ?></h1>
                        </div>
                    </a>
                <?php $ctr++; endforeach; ?>
              
            </div>
        </div>
    </div>
</div>

