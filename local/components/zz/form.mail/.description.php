<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "FormSend",
	"DESCRIPTION" => '',
	"ICON" => "",
	"COMPLEX" => "Y",
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "form.mail",
			"NAME" => "form.mail",
		),
	),
);
?>