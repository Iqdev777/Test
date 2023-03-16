<?php

namespace Dev;

use Bitrix\Main\Engine\ActionFilter\Authentication;
use Bitrix\Main\Engine\Contract\Controllerable;

use COption;

class DevSendForm extends \CBitrixComponent implements Controllerable
{
    public function sendFormAction()
    {
        $arFiles = $this->request->getFileList();
        if (isset($arFiles)) {
            $arfileIds = $this->uploadFiles($arFiles);
        }

        $this->sendMail($arfileIds);
    }

    private function getTableData($data){
        $table = '<table class="table">
                   <thead>
                    <tr>
                        <th>Бренд</th>
                        <th>Заголовок</th>
                        <th>Количество</th>
                        <th>Фасовна</th>
                        <th>Клиент</th>
                    </tr>
                    </thead>
                    <tbody>';

        foreach ($data['request'] as $value) {
            $table .="<tr>
                <td>$value->brand</td>
                <td>$value->title</td>
                <td>$value->count</td>
                <td>$value->packagings</td>
                <td>$value->client</td>
            </tr>";
       }

        $table .='</tbody> </table>';

        return $table;
    }

    private function uploadFiles($arFiles)
    {
        if (isset($arFiles)) {
            foreach ($arFiles as $file) {
                $fileIds[] = \CFile::SaveFile($file,"mailform");
            }
        }
        return $fileIds;
    }

    private function sendMail($fileIds)
    {
        $email = COption::GetOptionString("main", "email_from");

        $this->request->set('request', json_decode($this->request->toArray()['request']));

        $arData = $this->request->toArray();

        \Bitrix\Main\Mail\Event::send(array(
            "EVENT_NAME" => "FORM_NEW",
            "LID" => "s1",
            "C_FIELDS" => array(
                "EMAIL" => $email,
                "EMAIL_TO" =>'arman9796@yandex.ru',
                'TITLE' => $arData['titleRequest'],
                'CATEGORY' => $arData['categoryRadio'],
                'TYPE_REQUEST' => $arData['type_requestRadio'],
                'STOCK' => $arData['stockSelect'],
                'TABLE_DATA' => $this->getTableData($arData),
                'COMMENT' => $arData['comment']
            ),
            "FILE" => $fileIds)
        );
    }

    public function configureActions()
    {
        return [
            'sendForm' => [
                '-prefilters' => [
                    Authentication::class
                ],
            ],
        ];
    }

    public function executeComponent()
    {
        $this->includeComponentTemplate();
    }
}
