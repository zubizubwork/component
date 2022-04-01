<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости компании");
?><p>
	 <?$APPLICATION->IncludeComponent(
	"zz:form.mail",
	"",
Array()
);?>
</p>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>