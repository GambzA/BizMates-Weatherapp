<?php
//THIS IS BAD.
// DAY 1
$weatherData1 = $cacheProcessor->fetchWeather($jsonCachedData, $data, date('Y-m-d'));
$weatherIcon1 = $cacheProcessor->getWeatherIcon($weatherData1['id']);

// DAY 2
$weatherData2 = $cacheProcessor->fetchWeather($jsonCachedData, $data, date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')));
$weatherIcon2 = $cacheProcessor->getWeatherIcon($weatherData2['id']);
// DAY 3
$weatherData3 = $cacheProcessor->fetchWeather($jsonCachedData, $data, date('Y-m-d', strtotime(date('Y-m-d') . ' +2 day')));
$weatherIcon3 = $cacheProcessor->getWeatherIcon($weatherData3['id']);
// DAY 4
$weatherData4 = $cacheProcessor->fetchWeather($jsonCachedData, $data, date('Y-m-d', strtotime(date('Y-m-d') . ' +3 day')));
$weatherIcon4 = $cacheProcessor->getWeatherIcon($weatherData4['id']);
// DAY 5
$weatherData5 = $cacheProcessor->fetchWeather($jsonCachedData, $data, date('Y-m-d', strtotime(date('Y-m-d') . ' +4 day')));
$weatherIcon5 = $cacheProcessor->getWeatherIcon($weatherData5['id']);
// WHAT TO DO
$cityDetails = $cacheProcessor->getCityDetails($jsonCachedData, $data);
?>
<!-- Full Page Image Header with Vertically Centered Content -->
<header class="sub-page-masthead" style="background-image: url('<?= IMG_DIR; ?>home-banner.jpg');">
    <div class="overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <div class="d-inline">
                        <h1 class="text-white subpage-header"><img src="<?= IMG_DIR; ?>japanwhite.png" class="img-fluid subpage-header-img" alt=""><?= $PLACES[$data]['city_name'] ?></h1>
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
                <?= $PLACES[$data]['description'] ?>
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
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-5">
                <div class="city-thumbnail" style="background-image: url('<?= IMG_DIR . $PLACES[$data]['img']; ?>')"></div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 offset-0 offset-md-1 offset-lg-1 mb-5">
                <h1 class="lightgrey-text fw-bold text-center mb-5"><img src="<?= IMG_DIR; ?>weather-icons/<?= $weatherIcon1['colorIcon']; ?>" class="weather-icons img-fluid me-3" alt=""> <?= $weatherData1['description']; ?></h1>
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="d-inline">
                            <img src="<?= IMG_DIR; ?>weather-icons/<?= $weatherIcon1['colorIcon']; ?>" class="weather-icons-sub img-fluid me-2 w-25 float-start" alt="">
                            <label class="lightgrey-text fw-bold">TODAY - <?= $weatherData1['weather']; ?></label><br />
                            <h4 class="lightgrey-text fw-bold"><?= $weatherData1['description']; ?></h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex h-100 align-items-center justify-content-end">
                            <h2 class="lightgrey-text fw-bold"><?= $weatherData1['temp_min']; ?>°C / <?= $weatherData1['temp_max']; ?>°C</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="d-inline">
                            <img src="<?= IMG_DIR; ?>weather-icons/<?= $weatherIcon2['colorIcon']; ?>" class="weather-icons-sub img-fluid me-2 w-25 float-start" alt="">
                            <label class="lightgrey-text fw-bold">TOMORROW - <?= $weatherData2['weather']; ?></label><br />
                            <h4 class="lightgrey-text fw-bold"><?= $weatherData2['description']; ?></h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex h-100 align-items-center justify-content-end">
                            <h2 class="lightgrey-text fw-bold"><?= $weatherData2['temp_min']; ?>°C / <?= $weatherData2['temp_max']; ?>°C</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="d-inline">
                            <img src="<?= IMG_DIR; ?>weather-icons/<?= $weatherIcon3['colorIcon']; ?>" class="weather-icons-sub img-fluid me-2 w-25 float-start" alt="">
                            <label class="lightgrey-text fw-bold"><?= date("l", strtotime(date('Y-m-d') . ' +2 day')); ?> - <?= $weatherData3['weather']; ?></label><br />
                            <h4 class="lightgrey-text fw-bold"><?= $weatherData3['description']; ?></h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex h-100 align-items-center justify-content-end">
                            <h2 class="lightgrey-text fw-bold"><?= $weatherData3['temp_min']; ?>°C / <?= $weatherData3['temp_max']; ?>°C</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="d-inline">
                            <img src="<?= IMG_DIR; ?>weather-icons/<?= $weatherIcon4['colorIcon']; ?>" class="weather-icons-sub img-fluid me-2 w-25 float-start" alt="">
                            <label class="lightgrey-text fw-bold"><?= date("l", strtotime(date('Y-m-d') . ' +3 day')); ?> - <?= $weatherData4['weather']; ?></label><br />
                            <h4 class="lightgrey-text fw-bold"><?= $weatherData4['description']; ?></h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex h-100 align-items-center justify-content-end">
                            <h2 class="lightgrey-text fw-bold"><?= $weatherData4['temp_min']; ?>°C / <?= $weatherData4['temp_max']; ?>°C</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="d-inline">
                            <img src="<?= IMG_DIR; ?>weather-icons/<?= $weatherIcon5['colorIcon']; ?>" class="weather-icons-sub img-fluid me-2 w-25 float-start" alt="">
                            <label class="lightgrey-text fw-bold"><?= date("l", strtotime(date('Y-m-d') . ' +4 day')); ?> - <?= $weatherData5['weather']; ?></label><br />
                            <h4 class="lightgrey-text fw-bold"><?= $weatherData5['description']; ?></h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex h-100 align-items-center justify-content-end">
                            <h2 class="lightgrey-text fw-bold"><?= $weatherData5['temp_min']; ?>°C / <?= $weatherData5['temp_max']; ?>°C</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <h1 class="text-center fs-1 lightgrey-text famous-destinations-title">
                THINGS TO DO IN <?= strtoupper($PLACES[$data]['city_name']) ?>
            </h1>
        </div>
        <?php
        foreach ($cityDetails as $todoKey => $todoValue) :
        ?>
            <div class="row mb-4">
                <div class="col-12 mb-2">
                    <h1><?= $todoValue['name']; ?></h1>
                    <?php if (!empty($todoValue['location'])) : ?>
                        <p>Located at <?= $todoValue['location']; ?> </p>
                    <?php endif; ?>
                </div>
                <div class="col-12 mb-5">
                    <div class="grid text-center">
                        <?php
                        if (!empty($todoValue['images'])) :
                            $imgqty = 1;
                            foreach ($todoValue['images'] as $todoImages) :
                        ?>
                                <div class="grid-item">
                                    <a href="<?= $todoImages; ?>" data-lightbox="image-<?= $imgqty; ?>">
                                        <img class="img-fluid" src="<?= $todoImages; ?>">
                                    </a>
                                </div>
                        <?php
                                $imgqty++;
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>