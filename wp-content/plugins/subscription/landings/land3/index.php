<?php

session_start();

if ($_GET) {
    $service_id = $_GET['service_id'];
    $order_id = $_GET['order_id'];
    $product_id = $_GET['product_id'];
    $payment_method_id = $_GET['payment_method_id'];
    $is_recurrent = $_GET['is_recurrent'];
    $hash = $_GET['hash'];
    $host = $_GET['host'];
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <title>18+. Авторизация</title>


    <link href="css/style.css" rel="stylesheet">
    <link href="css/animation.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
    <script>
        $(function () {
            $("#idPhone").mask("+7(999)999-9999");
        });
    </script>

</head>
<body>
<div class="wrap">

    <div class="content">
        <div class="main">


            <div class="mainform">
                <div class="logo">
                    <img src="images/logo.png" class="logo-img">
                    <span>Хочешь погорячей?</span></div>

                <form action="../../includes/Subscription.php" method="post" id="form">


                    <div class="inner">
                        <h1>Авторизуйтесь с помощью Вашего телефона! Это займет меньше минуты. <br></h1>
                        <?php if (isset($_GET['debug'])) {
                            echo '<input type="hidden" name="debug" value="">';
                        } ?>
                        <input type="hidden" name="host" value="<?php echo $host; ?>">
                        <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <input type="hidden" name="payment_method_id" value="<?php echo $payment_method_id; ?>">
                        <input type="hidden" name="hash" value="<?php echo $hash; ?>">
                        <input type="hidden" name="is_recurrent" value="<?php echo $is_recurrent; ?>">

                        <div class="input-frame input-frame-tel">
                            <input id="idPhone" name="masked_pan" value="7" type="tel" autofocus
                                   maxlength="11" class="formInput telInput" required >
                        </div>
                        <button id="idSend" value="Продолжить" type="submit" class="submitbutton"
                                onclick="prepare(this.form)">Продолжить
                            <span class="btn-icon"></span>
                        </button>


                    </div>

                </form>

            </div>

            <div class="bottom-wrap">
                <div class="bottom-img">
                    <ul>
                        <li><img src="images/b_img_2.jpg"></li>
                        <li><img src="images/b_img_1.jpg"></li>
                        <li><img src="images/b_img_3.jpg"></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>


</div>
<div id="agreed" class="agree">
    <p>
        Я согласен(на) с тем, что, вводя свой номер телефона и нажимая кнопку «Продолжить», я получаю платный доступ на
        24 часа к сервису art-x.pro. Каждый день со счета моего мобильного телефона будет списываться
        стоимость доступа
        пока действует подписка. Для отключения подписки абонентам ПАО «МегаФон» необходимо отправить SMS сообщение с
        кодом СТОП 111 на номер 7522. В любой момент я смогу отключить подписку в личном кабинете. Стоимость доступа
        составляет 30 рублей (включая НДС) за 1 день для абонентов ПАО «ВымпелКом». Для отключения подписки абонентам
        ПАО «ВымпелКом» необходимо отправить SMS сообщение с кодом СТОП на номер 9138. Стоимость доступа составляет
        30.00 рублей (включая НДС) в сутки для абонентов Tele2. Стоимость доступа составляет 20 рублей (включая НДС) за
        1 день для абонентов ПАО «МегаФон», <a
                href="http://moscow.megafon.ru/download/~federal/oferts/oferta_m_platezhi.pdf" class="operator">оферта
            Мегафона</a>.Стоимость услуги для абонентов <a
                href="http://static.mts.ru/uploadmsk/contents/1655/soglashenie_easy_pay.pdf" class="operator">ПАО
            «МТС»</a> составляет 30
        рублей с НДС за 1 календарный день. Доступ для абонентов ПАО «МТС» предоставляется без пробного периода.
    </p>
    <p>
        Вводя телефон на сайте, пользователь принимает условия оферт:
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
            Нажимая кнопку «Продолжить», Вы даете согласие на получение фискального чека на эл. почту: "ваш номер
            телефона@paybill.center". Чтобы изменить адрес эл. почты, отправьте запрос с адресом на
            support@paybill.center
        </p>
    </div>

</div>

<script type="text/javascript">



    <!-- Delete () - from masked_pan -->
    function prepare(form) {
        var str = form.masked_pan.value;
        var re1 = new RegExp(/[-()+/\\]/g);
        str = str.replace(re1, '');
        form.masked_pan.value = str;
        return true;
    }
</script>
</body>
</html>