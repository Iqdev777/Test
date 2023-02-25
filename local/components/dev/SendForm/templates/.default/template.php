<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CJSCore::Init(array("fx"));
?>
<section class="content">
    <div class="container-fluid">
        <div class="col-6 row">
            <div class="col-4 mb-3 required">
                <label class="form-label" for="title-request">Заголовок заявки </label>
                <input type="text" name="title-request" class="form-control" required>
            </div>

            <label class="form-label">Категория</label>
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="category" id="category1"
                       value="Масло,автохимия,фильтры. Автоаксессуары,обогреватели,запчасти,сопутствующие товары" checked>
                <label class="form-check-label" for="category1">
                    Масло,автохимия,фильтры. Автоаксессуары,обогреватели,запчасти,сопутствующие товары.
                </label>
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="category" value="Шины,диски" id="category2" >
                <label class="form-check-label"  for="category2">
                    Шины,диски.
                </label>
            </div>
        </div>

        <label class="form-label">Вид заявки</label>
        <div class="mb-3">
            <input class="form-check-input" id="typeRequest-1" type="radio" name="type_request"
                   value="Запрос цены и сроков поставки" checked>
            <label class="form-check-label" for="typeRequest-1">
                Запрос цены и сроков поставки
            </label>
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="type_request" id="typeRequest-2" value="Пополнение складов">
            <label class="form-check-label" for="typeRequest-2">
               Пополнение складов
            </label>
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="type_request" id="typeRequest-3" value="Спецзаказ">
            <label class="form-check-label" for="typeRequest-3">
                Спецзаказ
            </label>
        </div>
        <label class="form-label">Склад поставки</label>

        <div class="mb-3">
            <select class="form-select" name="stock" style="width: unset" aria-label="Склад поставки">
                <option selected disabled>Выберите склад</option>
                <option value="1">Склад 1</option>
                <option value="2">Склад 2</option>
                <option value="3">Склад 3</option>
            </select>
        </div>

        <label class="form-label">Состав заявки</label>
        <div class="mb-3 multiple" id="multiple-fields">
            <div style="display: flex" class="multiple-field">
                <select class="form-select m-2" name="brand[]" style="width: unset" aria-label="Бренд">
                    <option selected>Выберите бренд</option>
                    <option value="Eufab">Eufab</option>
                    <option value="BMW">BMW</option>
                    <option value="3Lorain">Lorain</option>
                </select>
                <input type="text" name="title[]" class="form-control m-2 " placeholder="Заголовок">
                <input type="text" name="count[]" class="form-control m-2" placeholder="Количество">
                <input type="text" name="packaging[]" class="form-control m-2" placeholder="Фасовка">
                <input type="text" name="client[]" class="form-control m-2" placeholder="Клиент">
                <button type="button"  class="btn btn-primary btn-xs form-button m-2 add">+</button>
                <button type="button"  class="btn btn-danger btn-xs form-button m-2 delete">-</button>
            </div>
        </div>
        <div class="mb-3 col-3">
            <input class="form-control" type="file" multiple name="files[]">
        </div>

        <label class="form-label">Комментарий</label>
        <div class="mb-3">
            <textarea name="comment" cols="60" rows="10"></textarea>
        </div>

        <div class="mb-3">
            <button type="button" class="btn btn-success form-button m-2 send">Отправить</button>
        </div>
    </div>
    </div>
</section>
