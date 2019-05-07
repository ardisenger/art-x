<?php

if($_GET['transaction_id']){
    $_COOKIE['s_id'] = $_GET['transaction_id'];
    header('location: https://art-x.pro');
}
