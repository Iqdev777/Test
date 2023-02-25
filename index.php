<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?
$APPLICATION->IncludeComponent(
	"dev:SendForm",
	".default",
	[
		"COMPONENT_TEMPLATE" => ".default",
		"EMAIL_TO" => 'arman9796@yandex.ru'
	],
	false
);
?>
</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
