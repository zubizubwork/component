<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
$this->setFrameMode(false);?>

<?$arrCeventRes = [];

		$arrCeventTypes = Array(
			Array(
				'LID' => SITE_ID,
				'EVENT_NAME' => 'ORDER_CLIENT_INFO',
				'NAME' => 'Отправка данных клиента',
				'DESCRIPTION' => '',
			)
		);

		$arrCeventTemplates = Array(
			'ORDER_CLIENT_INFO' => Array(
				'ACTIVE'=> 'Y',
				'EVENT_NAME' => 'ORDER_CLIENT_INFO',
				'LID' => SITE_ID,
				'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
				'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
				'SUBJECT' => 'Новая заявка с сайта',
				'BODY_TYPE' => 'html',
				'MESSAGE' => '
		<!doctype html>
		<html lang="ru">
		<head>
		  <meta charset="utf-8">
		  <title>Поступил новый заказ с сайта</title>
		</head>
		<body>
		<h2>Добрый день!</h2>

		<p>Поступил новый заказ с сайта.</p>

		#INFO#
		<p>Письмо сформировано автоматически.</p>

		</body>
		</html>
				',
				
			)
		);

		$et = new CEventType;
		foreach($arrCeventTypes as $arrCeventType){
			$res = $et->Add($arrCeventType);
			
			if(!$res){
				echo $et->LAST_ERROR;
			}
			else{
				$arrCeventRes[$res] = $arrCeventType['EVENT_NAME'];
			}	
		}

		if(is_array($arrCeventRes)){
			$em = new CEventMessage;
			foreach($arrCeventRes as $cEventTypeName){
				$res_em = $em->Add($arrCeventTemplates[$cEventTypeName]);
				
				if(!$res_em){
					echo $em->LAST_ERROR;
				}
				else{
					echo ' '.$res_em.'<br />';
				}	
				
			}
		}


		if(!is_null($_POST)) {

		$arrInfo = '';

		$arrInfo .= sprintf("Заголовок заявки: %s <br/>",$_POST['header']);
		$arrInfo .= sprintf("Категория: %s <br/>",$_POST['category']);
		$arrInfo .= sprintf("Вид заявки: %s <br/>",$_POST['bidType']);
		$arrInfo .= sprintf("Склад: %s <br/>",$_POST['store']);
		
		$arrInfo .= sprintf("<br><h3>Состав заказа: %s </h3><br/>",$_POST['store']);

		$rowData=[];

		foreach($_POST['multi1'] as $k => $row){

			foreach($row as $value){
			$rowData[$k]['VALUES'][] = $value;
	}
}
/*print_r(' rowData ');
						print_r($rowData);*/

$inputDataKey = 0;
		foreach($_POST['multi1'] as $k => $row){	
			foreach($row as $k2 => $inputData){
				#array_walk_recursive($inputData, function (&$value, $key) {});



					if($inputDataKey == 0){
						$arrInfo .= sprintf("Бренд: %s <br/>",$inputData[$key]);
					}
					elseif ($inputDataKey == 1){

						$arrInfo .= sprintf("Наименование: %s <br/>",$inputData[$key]);

					}
					elseif ($inputDataKey == 2){
						$arrInfo .= sprintf("Количество: %s <br/>",$inputData[$key]);
						
					}
					
					elseif ($inputDataKey == 3){
						$arrInfo .= sprintf("Фасовка: %s <br/>",$inputData[$key]);
						
					}
					
					elseif ($inputDataKey == 4){
						$arrInfo .= sprintf("Клиент: %s <br/>",$inputData[$key]);
						
					}
							
			
					$inputDataKey++;
				}
				$arrInfo .= "<br>-------<br>"	;

				$inputDataKey = 0;
			}	

				$arrInfo .= sprintf("Комментарий: %s <br/>", $_POST['comment']);

			print_r($arrInfo);
		}


		

			$fileSave = CFile::SaveFile(
			    $_FILES['fileToUpload'],
			    'orders',
			    false,
			    false
			);

			CEvent::Send(
			    'ORDER_CLIENT_INFO',
			    's1',
			    array('INFO' => $arrInfo),
			    'N',
			    '',
			    array($fileSave),
			    'ru'
			);

			#print_r($fileSave);
        
    
		?>

<pre>
<? #print_r($_POST);?>
<? #print_r($_FILES);?>
</pre>


<?$this->IncludeComponentTemplate();
?>