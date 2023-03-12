<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!doctype html>
<html lang="ru">
<head>
    <?
    use  \Bitrix\Main\Page\Asset;
    $APPLICATION->ShowHead();
    $CMain = new CMain();
    $CMain->SetTitle('Отправка формы');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH .'/css/bootstrap.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH .'/css/style.css');
    Asset::getInstance()->addJs( SITE_TEMPLATE_PATH .'/js/bootstrap.min.js');
    ?>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$CMain->GetTitle()?></title>

    <?$APPLICATION->ShowPanel();?>
</head>
<body>

<div class="wrapper">
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-0" style="border-bottom: none">Новая заявка</h1>
                </div>
            </div>
        </div>
    </div>



