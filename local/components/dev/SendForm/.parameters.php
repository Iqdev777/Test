<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$arComponentParameters["PARAMETERS"]['EMAIL_TO'] = Array(
    "PARENT" => "BASE",
    "NAME" => "Почта",
    "TYPE" => "STRING",
    "DEFAULT" => !empty($arCurrentValues['EMAIL_TO']) ? $arCurrentValues['EMAIL_TO'] : "iqdev777@gmail.com",
);
