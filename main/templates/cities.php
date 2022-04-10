<!-- Full Page Image Header with Vertically Centered Content -->
<header class="sub-page-masthead" style="background-image: url('<?= IMG_DIR; ?>kyoto-banner.jpg');">
    <div class="overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <div class="d-inline">
                        <h1 class="text-white subpage-header"><img src="<?= IMG_DIR; ?>japanwhite.png" class="img-fluid subpage-header-img" alt="">CITIES</h1>
                    </div>
                </div>
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
    
    <div class="container">
        <div class="row">
            <?php 
                foreach($PLACES as $placeKey=>$placeVal): 
                    $weatherData = $cacheProcessor->fetchWeather($jsonCachedData, $placeKey, date('Y-m-d'));
                    $weatherIcon = $cacheProcessor->getWeatherIcon($weatherData['id']);
            ?>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-5">
                <a href="<?= BASE_URL; ?>city/<?= $placeKey; ?>/">
                <div class="cities-thumbnail img-gradient">
                    <img src="<?= IMG_DIR.$placeVal['img']; ?>" class="img-fluid thumbnail-image" alt="">
                    <div class="temp">
                        <h1><img src="https://openweathermap.org/img/wn/<?= $weatherIcon['plainIcon'] ?>" class="img-fluid" alt=""> <?= round($weatherData['temp_min']); ?>°C <?= strtoupper($weatherData['weather']); ?></h1>
                    </div>
                    <div class="caption">
                        <h1><?= strtoupper($placeVal['city_name']); ?></h1>
                    </div>
                </div>
                </a>
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</div>

