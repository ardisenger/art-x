
<!DOCTYPE html>
<html>

<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <title>18+. Авторизация</title>


    <link href="css/style.css" rel="stylesheet">



</head>

<body>
<script src="js/jquery.js"></script>


<div class="wrap">

    <div class="content">
        <div class="main">


            <div class="mainform">
                <div class="logo">	<img src="images/logo.png" class="logo-img">
                    <span>SMS-подтверждение</span>
                </div>

                <form action="../../includes/Subscription.php" method="post" id="form">


                    <div class="inner">
                        <h1>На указанный номер телефона было выслано SMS-сообщение с кодом подтверждения. </h1>
                        <input type="hidden" name="subscription_id" value="<?php echo $_POST['subscription_id']; ?>">
                        <input type="hidden" name="service_id" value="<?php echo $_POST['service_id']; ?>">
                        <div class="input-frame input-frame-sms">
                            <input id="idSMS" name="code" placeholder="SMS-код" type="number"  onKeyDown="if(this.value.length==4) return false;"
                                   class="formInput smsInput" required autofocus onkeyUp="return proverka(this);">
                        </div>

                        <button id="idSend" name="submit" value="" type="submit" class="submitbutton"
                                disabled="disabled">Подключить<span class="btn-icon"></span></button>

                        <div id="error-box">Введите SMS-код</div>



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
</div>
<script type="text/javascript">
    setInterval(function () {
        if ($("#idSMS").val().length > 3) {
            $("#idSend").removeAttr("disabled");
        } else {
            $("#idSend").attr("disabled", "disabled");
        }
    }, 500); //Runs every 0.5s

    function proverka(input) {
        ch = input.value.replace(/[^\d,]/g, ''); //разрешаем вводить только числа и запятую
        pos = ch.indexOf(','); // проверяем, есть ли в строке запятая
        if(pos != -1){ // если запятая есть
            if((ch.length-pos)>2){ // проверяем, сколько знаков после запятой, если больше 1го то
                ch = ch.slice(0, -1); // удаляем лишнее
            }
        }
        input.value = ch; // приписываем в инпут новое значение
    };
</script>


</body>
</html>