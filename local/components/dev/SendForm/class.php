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

        \Bitrix\Main\Mail\Event::sendImmediate(array( // or send
            "EVENT_NAME" => "FORM_NEW",
            "LID" => "s1",
            "C_FIELDS" => array(
                "EMAIL" => $email,
                "EMAIL_TO" =>'arman9796@yandex.ru',
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
