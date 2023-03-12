<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$request = \Bitrix\Main\Context::getCurrent()->getRequest();

$arData = $request->toArray();
?>

<body>
<h1>Заголовок заявки - <?=$arData['titleRequest']?></h1>
<hr>

<p>Категория - <?=$arData['categoryRadio']?></p>


<p>Вид заявки - <?=$arData['type_requestRadio']?></p>


<p>Склад - <?=$arData['stockSelect']?></p>

<h2>Состав заявки</h2>
<table class="table">
    <thead>
    <tr>
        <th>Бренд</th>
        <th>Заголовок</th>
        <th>Количество</th>
        <th>Фасовна</th>
        <th>Клиент</th>
    </tr>
    </thead>
    <tbody>


        <?foreach ($arData['request'] as $value) {?>
            <tr>
                <td><?=$value->brand?></td>
                <td><?=$value->title?></td>
                <td><?=$value->count?></td>
                <td><?=$value->packagings?></td>
                <td><?=$value->client?></td>
            </tr>
       <? }?>

    </tbody>
</table>
<p>
        <?=$arData['comment']?>
</p>
</body>
