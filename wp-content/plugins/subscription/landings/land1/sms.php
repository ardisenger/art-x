<?php
$postHttpRequest = $_POST;


#Костыль тестового доступа! Все переписать!!! ВЕСЬ КОД
if ($postHttpRequest['msisdn'] == '79100888892') {
    $betaPhone = $postHttpRequest['msisdn'];
    beta($betaPhone);
    exit();
}

function beta($msisdn)
{
    if ($msisdn) {
        if ($msisdn == '79100888892') {
            header("Set-Cookie: s_id=beta;expires = Thu, 30-Aug-2100 13:00:04 GMT; path=/;\n");
            echo "<script>alert('Вам предоставлен тестовый доступ')</script>";
            echo "<script>location.replace(\"http://art-x.pro\");</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=1">
    <title>18+. Авторизация</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="fonts/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>
<body>


<!-- Modal -->
<div class="modal fade" id="signinPopup" tabindex="-1" role="dialog" aria-labelledby="signinPopupTitle"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">

        <div class="modal-content bg-darker">


            <div class="modal-body text-center text-white p-0">

                <div class="row">
                    <div class="col-md-6 col-12 mx-auto py-md-5 px-md-5 py-2 px-2">


                        <!-- Форма НАЧАЛО -->
                        <form action="../../includes/Subscription.php" method="post" >

                            <div class="age age-mid">18+</div>
                            <h2>Подтверждение</h2>
                            <hr class="hr-spacer">
                            <p>Введите код доступа, полученный Вами в смс-сообщении</p>


                            <div class="input-group mb-2">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fal fa-key"></i></span>
                                </div>
                                <input type="hidden" name="subscription_id" value="<?php echo $_POST['subscription_id']; ?>">
                                <input type="hidden" name="service_id" value="<?php echo $_POST['service_id']; ?>">
                                <input type="hidden" name="masked_pan" value="<?php echo $_POST['masked_pan']; ?>">
                                <input id="idSMS" name="code" placeholder="SMS-код" type="number" maxlength="4"
                                       class="form-control" required autofocus>


                            </div>

                            <button class="btn btn-lg btn-warning btn-block mb-4" id="idSend" name="submit" value=""
                                    type="submit">Продолжить
                            </button>
                        </form>

                        <!-- Форма КОНЕЦ -->


                    </div>

                    <div class="col-md-6 col-12 bg-image bg-image-modal mx-auto py-5 px-5 hidden-on-mobile">


                        <ul class="list-group list-group-flush text-left">
                            <li class="list-group-item bg-transparent"><span class="align-middle"><i
                                            class="fal fa-address-card pr-2"> </i><h5>Доступ только для совершеннолетних</h5></span>
                            </li>
                            <li class="list-group-item bg-transparent"><span class="align-middle"><i
                                            class="fal fa-female pr-2"> </i><h5>Только качественные и топопвые модели</h5></span>
                            </li>
                            <li class="list-group-item bg-transparent"><span class="align-middle"><i
                                            class="fal fa-camera pr-2"> </i><h5>Тысячи эксклюзивных фотогорафия</h5></span>
                            </li>
                            <li class="list-group-item bg-transparent"><span class="align-middle"><i
                                            class="fal fa-film pr-2"> </i><h5>Эротические видео</h5></span></li>

                            <li class="list-group-item bg-transparent"><span class="align-middle"><i
                                            class="fal fa-mobile pr-2"> </i><h5>Удобный просмотр на любых устройствах</h5></span>
                            </li>
                        </ul>
                    </div>

                </div>


            </div>


        </div>
    </div>
</div>


<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar text-center">
    <a class="navbar-brand ml-auto mr-auto" href="javascript:void(0);" data-toggle="modal"
       data-target="#signinPopup"><img src="images/logo-light.png"></a>
    <div class="age age-sm">18+</div>
</header>

<section class="bg-dark bg-image bg-image-1 py-5 text-left" data-toggle="modal" data-target="#signinPopup">

    <div class="container">
        <div class="row">


            <div class="main-video-box">
                <div class="row">
                    <div class="col-md-9 col-12 pr-md-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video class="embed-responsive-item" muted>
                                <source src="video/video.mp4" type="video/mp4">
                            </video>
                        </div>


                        <div class="row">

                            <ul class="list-group bg-darker list-group-horizontal bg-darker w-100">

                                <li class="list-group-item">
                                    <h3>Обнаженная Кристина на природе...</h3>
                                    <p>Модель <a href="javascript:void(0);" data-toggle="modal"
                                                 data-target="#signinPopup">Кристина Щербинина</a></p>
                                </li>


                                <li class="list-group-item">
                                    <h5 class="text-white">108714 </h5>
                                    <p>просмотров</p>
                                </li>

                                <li class="list-group-item text-center">
                                    <i class="fas fa-heart text-themecolor"></i>
                                    10936
                                </li>

                                <li class="list-group-item text-center">

                                    <i class="far fa-thumbs-down"></i>
                                    4315
                                </li>


                            </ul>

                        </div>

                    </div>

                    <div class="col-md-3 col-12 pl-0 hidden-on-mobile">
                        <div class="content-list-sidebar">
                            <div class="content-list-sidebar-scrollbox">
                                <div class="content-list-sidebar-inside">
                                    <div class="content-list">

                                        <ul>


                                            <li class="col-12">
                                                <div class="content-list-image">
                                                    <div class="video-time"><i class="far fa-film"></i> 3:55</div>
                                                    <a href="javascript:void(0);" class="content-list-image-link"
                                                       data-toggle="modal" data-target="#signinPopup">
                                                        <img src="images/thumbs/9.jpg">


                                                    </a>

                                                </div>


                                            </li>


                                            <li class="col-12">
                                                <div class="content-list-image">
                                                    <div class="video-time"><i class="far fa-film"></i> 4:32</div>
                                                    <a href="javascript:void(0);" class="content-list-image-link"
                                                       data-toggle="modal" data-target="#signinPopup">
                                                        <img src="images/thumbs/10.jpg">


                                                    </a>

                                                </div>


                                            </li>

                                            <li class="col-12">
                                                <div class="content-list-image">
                                                    <div class="video-time"><i class="far fa-film"></i> 6:07</div>
                                                    <a href="javascript:void(0);" class="content-list-image-link"
                                                       data-toggle="modal" data-target="#signinPopup">
                                                        <img src="images/thumbs/11.jpg">


                                                    </a>

                                                </div>


                                            </li>

                                            <li class="col-12">
                                                <div class="content-list-image">
                                                    <div class="video-time"><i class="far fa-film"></i> 11:07</div>
                                                    <a href="javascript:void(0);" class="content-list-image-link"
                                                       data-toggle="modal" data-target="#signinPopup">
                                                        <img src="images/thumbs/12.jpg">


                                                    </a>

                                                </div>


                                            </li>

                                            <li class="col-12">
                                                <div class="content-list-image">
                                                    <div class="video-time"><i class="far fa-film"></i> 9:18</div>
                                                    <a href="javascript:void(0);" class="content-list-image-link"
                                                       data-toggle="modal" data-target="#signinPopup">
                                                        <img src="images/thumbs/13.jpg">


                                                    </a>

                                                </div>


                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</section>

<section class="bg-darker py-5 text-left" data-toggle="modal" data-target="#signinPopup">
    <div class="container">
        <div class="row">
            <h4>Рекомендовано Для Вас</h4>

        </div>

        <div class="row">
            <div class="content-list">

                <ul>


                    <li class="col-md-3 col-6">
                        <div class="content-list-wrap">
                            <div class="content-list-image">
                                <div class="video-time"><i class="far fa-film"></i> 14:35</div>
                                <a href="javascript:void(0);" class="content-list-image-link" data-toggle="modal"
                                   data-target="#signinPopup">
                                    <img src="images/thumbs/1.jpg">


                                </a>

                            </div>

                            <div class="content-list-info">

                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup">Огни
                                    неона</a>
                                <p>Алиса</p>

                            </div>
                        </div>
                    </li>

                    <li class="col-md-3 col-6">
                        <div class="content-list-wrap">
                            <div class="content-list-image">
                                <div class="video-time"><i class="far fa-film"></i> 12:17</div>
                                <a href="javascript:void(0);" class="content-list-image-link" data-toggle="modal"
                                   data-target="#signinPopup">
                                    <img src="images/thumbs/2.jpg">


                                </a>

                            </div>

                            <div class="content-list-info">

                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup">Расслабление
                                    в душе</a>
                                <p>Жанна</p>

                            </div>
                        </div>
                    </li>


                    <li class="col-md-3 col-6">
                        <div class="content-list-wrap">
                            <div class="content-list-image">
                                <div class="video-time"><i class="far fa-film"></i> 5:05</div>
                                <a href="javascript:void(0);" class="content-list-image-link" data-toggle="modal"
                                   data-target="#signinPopup">
                                    <img src="images/thumbs/3.jpg">


                                </a>

                            </div>

                            <div class="content-list-info">

                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup">Итальянское
                                    утро</a>
                                <p>Кейт</p>

                            </div>
                        </div>
                    </li>

                    <li class="col-md-3 col-6">
                        <div class="content-list-wrap">
                            <div class="content-list-image">
                                <div class="video-time"><i class="far fa-film"></i> 9:47</div>
                                <a href="javascript:void(0);" class="content-list-image-link" data-toggle="modal"
                                   data-target="#signinPopup">
                                    <img src="images/thumbs/4.jpg">


                                </a>

                            </div>

                            <div class="content-list-info">

                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup">Соседка по
                                    общаге</a>
                                <p>Анна</p>

                            </div>
                        </div>
                    </li>


                    <li class="col-md-3 col-6">
                        <div class="content-list-wrap">
                            <div class="content-list-image">
                                <div class="video-time"><i class="far fa-film"></i> 8:25</div>
                                <a href="javascript:void(0);" class="content-list-image-link" data-toggle="modal"
                                   data-target="#signinPopup">
                                    <img src="images/thumbs/5.jpg">


                                </a>

                            </div>

                            <div class="content-list-info">

                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup">Венское
                                    утро</a>
                                <p>Ирина</p>

                            </div>
                        </div>
                    </li>

                    <li class="col-md-3 col-6">
                        <div class="content-list-wrap">
                            <div class="content-list-image">
                                <div class="video-time"><i class="far fa-film"></i> 6:12</div>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup"
                                   class="content-list-image-link">
                                    <img src="images/thumbs/6.jpg">


                                </a>

                            </div>

                            <div class="content-list-info">

                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup">Мягкость
                                    тела</a>
                                <p>Марина</p>

                            </div>
                        </div>
                    </li>


                    <li class="col-md-3 col-6">
                        <div class="content-list-wrap">
                            <div class="content-list-image">
                                <div class="video-time"><i class="far fa-film"></i> 7:45</div>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup"
                                   class="content-list-image-link">
                                    <img src="images/thumbs/7.jpg">


                                </a>

                            </div>

                            <div class="content-list-info">

                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup">Тайные
                                    желания</a>
                                <p>Настя</p>

                            </div>
                        </div>
                    </li>

                    <li class="col-md-3 col-6">
                        <div class="content-list-wrap">
                            <div class="content-list-image">
                                <div class="video-time"><i class="far fa-film"></i> 12:51</div>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup"
                                   class="content-list-image-link">
                                    <img src="images/thumbs/8.jpg">


                                </a>

                            </div>

                            <div class="content-list-info">

                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signinPopup">Утренний
                                    соблазн</a>
                                <p>Оля</p>

                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>


    </div>


</section>

<footer class="container-fluid bg-darker text-white-50" id="agreed">

    <p>

        Вводя код и нажимая кнопку «Подключить», вы получаете платный доступ на 24 часа к сервису art-x.pro.
        Каждый день
        со счета вашего мобильного телефона будет списываться стоимость доступа пока действует подписка. Для отключения
        подписки абонентам ПАО «МегаФон» необходимо отправить SMS сообщение с кодом СТОП 111 на номер 7522.
        Подписку можно отключить в личном кабинете. Стоимость доступа составляет 30 рублей (включая НДС) за 1 день для
        абонентов ПАО «ВымпелКом». Для отключения подписки абонентам ПАО «ВымпелКом» необходимо отправить SMS сообщение
        с кодом СТОП на номер 9138. Стоимость доступа составляет 30.00 рублей (включая НДС) в сутки для абонентов Tele2.
        Стоимость доступа составляет 20 рублей (включая НДС) за 1 день для абонентов ПАО «МегаФон»,
        <a href="http://moscow.megafon.ru/download/~federal/oferts/oferta_m_platezhi.pdf" class="operator">оферта
            Мегафона</a>.Стоимость услуги для абонентов
        <a href="http://static.mts.ru/uploadmsk/contents/1655/soglashenie_easy_pay.pdf" class="operator">ПАО «МТС»</a>
        составляет 30 рублей с НДС за 1 календарный день. Доступ для
        абонентов ПАО «МТС» предоставляется без пробного периода.
    </p>
    <p>
        Услугу «art-x.pro» (30 руб/сутки включая налоги) предоставляет ООО «Телекоминформ Плюс». Оплата
        осуществляется переводом с
        лицевого счета абонента Tele2 на условиях:
    </p>
    <div class="blockInformation">
        <div class="information">
            <a href="http://ribank.ru/dokumenty-dokumenty-platezhnyh-servisov/">
                <span>РНКО «РИБ»</span>
            </a>
            <a href="https://www.round.ru/individuals/mobile_payments/oferta22.10.2018.pdf">
                <span>ООО «банк Раунд»</span>
            </a>
            <a href="http://moscow.megafon.ru/download/~federal/oferts/oferta_m_platezhi.pdf">
                <span>МегаФон</span>
            </a>
            <a href="/beeline">
                <span>БиЛайн</span>
            </a>
            <a href="http://static.mts.ru/uploadmsk/contents/1655/soglashenie_easy_pay.pdf">
                <span>МТС</span>
            </a>
            <a href="https://market.tele2.ru/offer/">
                <span>Теле2</span>
            </a><br>
            <a href="/правила-предоставления-подписки-на-к">
                <span>Правила предоставления услуги</span>
            </a>
            <a href="/offer">
                <span>Договор — публичная оферта</span>
            </a>
            <a href="/soglasie">
                <span>СОГЛАСИЕ на обработку персональных данных</span>
            </a>
            <a href="/услуга-предоставляется">
                <span>Услуга предоставляется</span>
            </a>
        </div>
        <p>
            Нажимая кнопку «Подключить», Вы даете согласие на получение фискального чека на эл. почту: "ваш номер
            телефона@paybill.center". Чтобы изменить адрес эл. почты, отправьте запрос с адресом на
            support@paybill.center
        </p>
    </div>


</footer>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.maskedinput.js"></script>

<script type="text/javascript">


    $(function () {
        $("#idPhone").mask("+7(999)999-9999");
    });

    function prepare(form) {
        var str = form.phone.value
        var re1 = new RegExp(/[-()+/\\]/g)
        str = str.replace(re1, '')
        form.phone.value = str
        return true
    }


    function func() {
        $('#signinPopup').modal('show')

    }

    setTimeout(func, 0);

    $('#signinPopup').on('shown.bs.modal', function () {
        $(this).find('[autofocus]').focus();
    });

    $('form#form').submit(function (e) {
        $(this).children('input[type=submit]').attr('disabled', 'disabled');
        // this is just for demonstration
        e.preventDefault();
        return false;
    });


</script>


</body>
</html>