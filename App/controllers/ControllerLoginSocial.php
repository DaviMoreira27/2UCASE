<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../config/stylesConfig.php";



use League\OAuth2\Client\Provider\Google;

session_start();

if (!empty($_SESSION['USER-ID'])){
    //Usuário já esta logado
    header("Location: ../view/login.php?error-code=FR37");
    exit();
}


if(empty($_SESSION['userLogin'])){
    $provider = new Google(GOOGLE);
    $authUrl = $provider->getAuthorizationUrl();


    //Entrando no pedido de CADASTRO
    header("Location: $authUrl");
    exit();

}
