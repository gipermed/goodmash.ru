<?
use \Bitrix\Main\Localization\Loc;

CAllcorp3::getFieldImageData($arResult, array('DETAIL_PICTURE'));

// sef folder to include files
$sefFolder = rtrim($arParams["SEF_FOLDER"] ?? dirname($_SERVER['REAL_FILE_PATH']), '/');

// dops tab
if($arParams['SHOW_DOPS'] === 'Y'){
	$this->SetViewTarget('PRODUCT_DOPS_INFO');
	$APPLICATION->IncludeFile($sefFolder."/index_dops.php", array(), array("MODE" => "html", "NAME" => GetMessage('T_DOPS')));
	$this->EndViewTarget();
}

$arResult['CHARACTERISTICS'] = $arResult['VIDEO'] = $arResult['VIDEO_IFRAME'] = [];

/* docs property code */
$docsProp = $arParams['DETAIL_DOCS_PROP'] ? $arParams['DETAIL_DOCS_PROP'] : 'DOCUMENTS';

if(
	array_key_exists($docsProp, $arResult["DISPLAY_PROPERTIES"]) &&
	is_array($arResult["DISPLAY_PROPERTIES"][$docsProp]) &&
	$arResult["DISPLAY_PROPERTIES"][$docsProp]["VALUE"]
){
	foreach($arResult['DISPLAY_PROPERTIES'][$docsProp]['VALUE'] as $key => $value){
		if(!intval($value)){
			unset($arResult['DISPLAY_PROPERTIES'][$docsProp]['VALUE'][$key]);
		}
	}

	if($arResult['DISPLAY_PROPERTIES'][$docsProp]['VALUE']){
		$arResult['DOCUMENTS'] = array_values($arResult['DISPLAY_PROPERTIES'][$docsProp]['VALUE']);
	}
}

$arParams['DEFAULT_PRICE_KEY'] = 'DEFAULT';

if($arResult['DISPLAY_PROPERTIES']){
	// price currency
	$arResult['CURRENCY'] = isset($arResult['PROPERTIES']['PRICE_CURRENCY']) ? $arResult['PROPERTIES']['PRICE_CURRENCY']['VALUE'] : '';

	// min period price (one month)
	if(
		isset($arResult['PROPERTIES']['TARIF_PRICE_1']) &&
		strlen($arResult['PROPERTIES']['TARIF_PRICE_1']['VALUE'])
	){
		$priceOldOne = str_replace('#CURRENCY#', $arResult['CURRENCY'], $arResult['PROPERTIES']['TARIF_PRICE_1']['VALUE']);
	}
	else{
		$priceOldOne = false;
	}

	$maxCntPeriod = 12;

	$arResult['FORMAT_PROPS'] = $arResult['MIDDLE_PROPS'] = $arResult['PRICES'] = array();
	foreach($arResult['DISPLAY_PROPERTIES'] as $key2 => &$arProp){
		if(
			$arProp['VALUE'] ||
			strlen($arProp['VALUE'])
		){
			if(($key2 === 'MULTI_PROP' || $key2 === 'MULTI_PROP_BOTTOM_PROPS')){
				$arResult['MIDDLE_PROPS'][$key2] = $arProp;
				unset($arResult['DISPLAY_PROPERTIES'][$key2]);
			}
			elseif(strpos($key2, 'TARIF_PRICE') !== false){
				if(
					strpos($key2, '_DISC') === false &&
					strpos($key2, '_ECONOMY') === false &&
					strpos($key2, '_ONE') === false
				){
					$arPropCode = explode('_', $key2);
					$propKey = $arProp['KEY'] = $arPropCode[count($arPropCode) - 1];

					// price title
					$priceTitle = str_replace(Loc::getMessage('REPLACE_PRICE_NAME'), '', $arProp['NAME']);
					$priceTitle = str_replace(
						array(
							Loc::getMessage('REPLACE_MONTH6'),
							Loc::getMessage('REPLACE_MONTH2'),
							Loc::getMessage('REPLACE_MONTH1'),
						),
						Loc::getMessage('REPLACE_MONTH_SHORT'),
						$priceTitle
					);
					$priceTitle = str_replace(Loc::getMessage('REPLACE_ONE_YEAR'), Loc::getMessage('REPLACE_YEAR'), $priceTitle);

					// period count
					$cntPeriods =  $propKey == 1 ? 1 : ($propKey == 2 ? 3 : ($propKey == 3 ? 6 : $maxCntPeriod));

					// filter price
					$priceFilter = isset($arResult['PROPERTIES']['FILTER_PRICE_'.$propKey]) ? $arResult['PROPERTIES']['FILTER_PRICE_'.$propKey]['VALUE'] : false;

					// has discount
					$bDiscount = isset($arResult['PROPERTIES']['TARIF_PRICE_'.$propKey.'_DISC']);

					// old price without discount
					$priceOld = $bDiscount ? str_replace('#CURRENCY#', $arResult['CURRENCY'], $arProp['VALUE']) : false;

					// full price with discount
					if(
						$bDiscount &&
						strlen($arResult['PROPERTIES']['TARIF_PRICE_'.$propKey.'_DISC']['VALUE'])
					){
						$price = $arResult['PROPERTIES']['TARIF_PRICE_'.$propKey.'_DISC']['VALUE'];
					}
					else{
						$price = $arProp['VALUE'];
						$priceOld = false;
					}
					$price = str_replace('#CURRENCY#', $arResult['CURRENCY'], $price);

					// economy
					if(
						isset($arResult['PROPERTIES']['TARIF_PRICE_'.$propKey.'_ECONOMY']) &&
						strlen($arResult['PROPERTIES']['TARIF_PRICE_'.$propKey.'_ECONOMY']['VALUE'])
					){
						$economy = str_replace('#CURRENCY#', $arResult['CURRENCY'], $arResult['PROPERTIES']['TARIF_PRICE_'.$propKey.'_ECONOMY']['VALUE']);
					}
					else{
						$economy = false;
					}

					// price to one period
					if(
						isset($arResult['PROPERTIES']['TARIF_PRICE_'.$propKey.'_ONE']) &&
						strlen($arResult['PROPERTIES']['TARIF_PRICE_'.$propKey.'_ONE']['VALUE'])
					){
						$priceOne = str_replace('#CURRENCY#', $arResult['CURRENCY'], $arResult['PROPERTIES']['TARIF_PRICE_'.$propKey.'_ONE']['VALUE']);
					}
					else{
						$priceOne = false;
					}

					$arPrice = array(
						'TITLE' => $priceTitle,
						'CNT_PERIODS' => $cntPeriods,
						'FILTER_PRICE' => $priceFilter,
						'PRICE' => $price,
						'OLDPRICE' => $priceOld,
						'ECONOMY' => $economy,
						'PRICE_ONE' => $priceOne,
						'OLDPRICE_ONE' => ($cntPeriods > 1 && strlen($economy)) ? $priceOldOne : false,
						'DEFAULT' => $propKey === $arParams['DEFAULT_PRICE_KEY'],
					);

					$arResult['PRICES'][$cntPeriods] = $arPrice;

					// default price
					if($propKey === $arParams['DEFAULT_PRICE_KEY']){
						$arResult['DEFAULT_PRICE'] = $arPrice;
					}
				}

				unset($arResult['DISPLAY_PROPERTIES'][$key2]);
			}
			elseif($arProp['USER_TYPE'] === 'video') {
				if(count($arProp['PROPERTY_VALUE_ID']) >= 1) {
					foreach($arProp['VALUE'] as $val){
						if($val['path']){
							$arResult['VIDEO'][] = $val;
						}
					}
				}
				elseif($arProp['VALUE']['path']){
					$arResult['VIDEO'][] = $arProp['VALUE'];
				}
			}
			elseif($arProp['CODE'] === 'VIDEO_IFRAME'){
				$arResult['VIDEO'] = $arResult['VIDEO'] + (array)$arProp["~VALUE"];
			}
			elseif($arProp['CODE'] === 'POPUP_VIDEO'){
				$arResult['POPUP_VIDEO'] = $arProp["VALUE"];
			}
		}
	}
	unset($arProp);

	$arResult['CHARACTERISTICS'] = CAllcorp3::PrepareItemProps($arResult['DISPLAY_PROPERTIES']);

	if($arResult['PRICES']){
		// sort prices by count of periods
		ksort($arResult['PRICES']);

		if($arParams['TABS'] === 'TOP'){
			if($arResult['DEFAULT_PRICE']){
				$arResult['PRICES'] = array($arResult['DEFAULT_PRICE']['CNT_PERIODS'] => $arResult['DEFAULT_PRICE']);
			}
		}
		else{
			// no default price
			if(!$arResult['DEFAULT_PRICE']){
				$arResult['PRICES'][max(array_keys($arResult['PRICES']))]['DEFAULT'] = true;
				$arResult['DEFAULT_PRICE'] = $arResult['PRICES'][max(array_keys($arResult['PRICES']))];
			}
		}
	}
}

$arResult['CATEGORY_ITEM'] = '';

if ($arResult['SECTION'] && $arResult['SECTION']['PATH']) {
	$arTmpPath = array();
	foreach ($arResult['SECTION']['PATH'] as $arSection) {
		$arTmpPath[] = $arSection['NAME'];
	}
	if ($arTmpPath) {
		$arResult['CATEGORY_ITEM'] = implode('/', $arTmpPath);
	}
}
elseif($arResult['IBLOCK_SECTION_ID']) {
	$arSectionsIDs = [];
	$dbRes = CIBlockElement::GetElementGroups($arResult['ID'], true, array('ID'));
	while ($arSection = $dbRes->Fetch()) {
		$arSectionsIDs[$arSection['ID']] = $arSection['ID'];
	}

	if($arSectionsIDs){
		$arSections = CAllcorp3Cache::CIBLockSection_GetList(
			array(
				'SORT' => 'ASC',
				'NAME' => 'ASC',
				'CACHE' => array(
					'TAG' => CAllcorp3Cache::GetIBlockCacheTag($arParams['IBLOCK_ID']),
					'GROUP' => array('ID'),
					'MULTI' => 'N',
					'RESULT' => array('NAME')
				)
			),
			array('ID' => $arSectionsIDs),
			false,
			array(
				'ID',
				'NAME'
			)
		);
		if ($arSections) {
			$arResult['CATEGORY_ITEM'] = implode('/', array_values($arSections));
		}
	}
}
?>