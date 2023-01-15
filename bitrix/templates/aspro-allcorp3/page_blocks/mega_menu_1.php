<?php
global $arTheme, $arRegion;
if($arRegion)
	$bPhone = ($arRegion['PHONES'] ? true : false);
else
	$bPhone = ((int)$arTheme['HEADER_PHONES'] ? true : false);

$bOrder = ($arTheme['ORDER_VIEW']['VALUE'] == 'Y' && $arTheme['ORDER_VIEW']['DEPENDENT_PARAMS']['ORDER_BASKET_VIEW']['VALUE']=='HEADER' ? true : false);
$bCabinet = ($arTheme["CABINET"]["VALUE"]=='Y' ? true : false);

$bCallback = $arTheme["SHOW_CALLBACK"]["VALUE"] == "Y";
$bCompare = $arTheme["CATALOG_COMPARE"]["VALUE"] == "Y";

$currentHeaderOptions = $arTheme['HEADER_TYPE']['LIST'][ $arTheme['HEADER_TYPE']['VALUE'] ];
$bRightMegaMenu = $currentHeaderOptions['TOGGLE_OPTIONS']['OPTIONS']['HEADER_TOGGLE_MEGA_MENU']['ADDITIONAL_OPTIONS']['HEADER_TOGGLE_MEGA_MENU_POSITION']['VALUE'] == 'Y';

$arBannersIblock = CAllcorp3Cache::$arIBlocks[SITE_ID]["aspro_allcorp3_adv"]["aspro_allcorp3_advtbig"][0];
$arBannersFilter = array("PROPERTY_TYPE_BANNERS.CODE" => 'MEGA_MENU', 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y', 'IBLOCK_ID' => $arBannersIblock);
$arBannersSelect = array('DETAIL_PICTURE', 'PREVIEW_PICTURE', 'PROPERTY_MAIN_COLOR');
$arBanners = CAllcorp3Cache::CIblockElement_GetList(array("CACHE" => array("TAG" => CAllcorp3Cache::GetIBlockCacheTag($arBannersIblock))), $arBannersFilter, false, false, $arBannersSelect);

$siteSelectorName = $arTheme['SITE_SELECTOR_NAME']['VALUE'];
$arLogoOptions = [];

if($arBanners) {
	$arBanner = reset($arBanners);
	if($arBanner['DETAIL_PICTURE']) {
		$arBanner['PICTURE'] = CFile::GetPath($arBanner['DETAIL_PICTURE']);
	} else if($arBanner['PREVIEW_PICTURE']) {
		$arBanner['PICTURE'] = CFile::GetPath($arBanner['PREVIEW_PICTURE']);
	} else {
		$arBanner['PICTURE'] = false;
	}

	$arEnumColor = CIBlockPropertyEnum::GetByID($arBanner["PROPERTY_MAIN_COLOR_ENUM_ID"]);

	if($arEnumColor["XML_ID"] === "light"){
		$arLogoOptions["IS_WHITE"] = true;
	}
}
?>

<div class="mega-fixed-menu <?=$arBanner['PICTURE'] ? 'header--color_dark mega-fixed-menu--dark' : ''?>" data-src="" <?=$arBanner['PICTURE'] ? 'style="background: url('.$arBanner['PICTURE'].') no-repeat center;"' : ''?>>
	<div class="mega-fixed-menu__row ">
		<div class="line-block line-block--100 line-block--32-1400">
			<?//show logo?>
			<div class="line-block__item">
				<div class="logo no-shrinked <?=$logoClass?>">
					<?=CAllcorp3::ShowLogo($arLogoOptions);?>
				</div>
			</div>

			<?//check slogan text?>
			<?
			$blockOptions = array(
				'PARAM_NAME' => 'HEADER_TOGGLE_SLOGAN',
				'BLOCK_TYPE' => 'SLOGAN',
				'IS_AJAX' => false,
				'AJAX_BLOCK' => '',
				'VISIBLE' => true,
				'WRAPPER' => 'line-block__item hide-1100',
			);
			?>
			<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
		</div>

		<div class="line-block line-block--48">
			<?//show phone and callback?>
			<?
			$blockOptions = array(
				'PARAM_NAME' => 'HEADER_TOGGLE_PHONE',
				'BLOCK_TYPE' => 'PHONE',
				'IS_AJAX' => false,
				'AJAX_BLOCK' => $ajaxBlock,
				'VISIBLE' => $bPhone,
				'WRAPPER' => 'line-block__item no-shrinked',
				'CALLBACK' => $bCallback,
				'MESSAGE' => GetMessage("S_CALLBACK"),
			);
			?>
			<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

			<?
			$blockOptions = array(
				'PARAM_NAME' => 'HEADER_TOGGLE_BUTTON',
				'BLOCK_TYPE' => 'BUTTON',
				'IS_AJAX' => false,
				'AJAX_BLOCK' => '',
				'VISIBLE' => true,
				'WRAPPER' => 'line-block__item',
				'MESSAGE' => GetMessage("S_CALLBACK"),
			);
			?>
			<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
		</div>
	</div>

	<div class="mega-fixed-menu__row mega-fixed-menu__row--overflow mega-fixed-menu__main-part">
		<?if(CAllcorp3::nlo('menu-megafixed', 'class="loadings" style="height:125px;width:50px;margin:0 auto;"')):?>
		<!-- noindex -->
		<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
			array(
				"COMPONENT_TEMPLATE" => ".default",
				"PATH" => SITE_DIR."include/header/mega_menu.php",
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "",
				"AREA_FILE_RECURSIVE" => "Y",
				"EDIT_TEMPLATE" => "include_area.php",
				'DARK' => boolval($arBanner['PICTURE']),
			),
			false, array("HIDE_ICONS" => "Y")
		);?>
		<!-- /noindex -->
		<?endif;?>
		<?CAllcorp3::nlo('menu-megafixed');?>
	</div>

	<div class="mega-fixed-menu__row ">
		<div class="line-block line-block--48">
			<?if($arRegion):?>
				<?//regions?>
				<div class="line-block__item icon-block--with_icon">
					<?
					$arRegionsParams = array();
					CAllcorp3::ShowListRegions($arRegionsParams);?>
				</div>
			<?endif;?>

			<?//show social?>
			<?
			$blockOptions = array(
				'PARAM_NAME' => 'HEADER_TOGGLE_SOCIAL',
				'BLOCK_TYPE' => 'SOCIAL',
				'IS_AJAX' => false,
				'AJAX_BLOCK' => '',
				'VISIBLE' => true,
				'WRAPPER' => 'line-block__item',
				'HIDE_MORE' => false,
			);
			?>
			<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
		</div>

		<div class="line-block line-block--48">
			<?//show site list?>
			<?
			$arShowSites = \Aspro\Functions\CAsproAllcorp3::getShowSites();
			$countSites = count($arShowSites);
			$blockOptions = array(
				'PARAM_NAME' => 'HEADER_TOGGLE_LANG',
				'BLOCK_TYPE' => 'LANG',
				'IS_AJAX' => false,
				'AJAX_BLOCK' => '',
				'VISIBLE' => $countSites > 1,
				'WRAPPER' => 'line-block__item',
				'DROPDOWN_TOP' => true,
				'SITE_SELECTOR_NAME' => $siteSelectorName,
				'TEMPLATE' => 'main',
				'SITE_LIST' => $arShowSites,
			);
			?>
			<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

			<?
			$blockOptions = array(
				'PARAM_NAME' => 'HEADER_TOGGLE_SEARCH',
				'BLOCK_TYPE' => 'SEARCH',
				'IS_AJAX' => false,
				'AJAX_BLOCK' => '',
				'VISIBLE' => true,
				'WRAPPER' => 'line-block__item',
			);
			?>
			<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

			<?$blockOptions = array(
				'PARAM_NAME' => 'HEADER_TOGGLE_CABINET',
				'BLOCK_TYPE' => 'CABINET',
				'IS_AJAX' => false,
				'AJAX_BLOCK' => '',
				'VISIBLE' => $bCabinet,
				'WRAPPER' => 'line-block__item',
				'CABINET_PARAMS' => array(
					'TEXT_LOGIN' => '',
					'TEXT_NO_LOGIN' => '',
					'DROPDOWN_TOP' => true,
				),
			);?>
			<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

			<?$blockOptions = array(
				'PARAM_NAME' => 'HEADER_TOGGLE_COMPARE',
				'BLOCK_TYPE' => 'COMPARE',
				'IS_AJAX' => $bAjax,
				'AJAX_BLOCK' => $ajaxBlock,
				'VISIBLE' => $bCompare,
				'WRAPPER' => 'line-block__item',
				'MESSAGE' => '',
				'CLASS_LINK' => 'light-opacity-hover',
				'CLASS_ICON' => 'menu-light-icon-fill ',
			);?>
			<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
			
			<?$blockOptions = array(
				'PARAM_NAME' => 'HEADER_TOGGLE_BASKET',
				'BLOCK_TYPE' => 'BASKET',
				'IS_AJAX' => false,
				'AJAX_BLOCK' => '',
				'VISIBLE' => $bOrder,
				'WRAPPER' => 'line-block__item',
				'MESSAGE' => '',
			);?>
			<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
		</div>
	</div>
	
	<?=CAllcorp3::showIconSvg(' mega-fixed-menu__close stroke-theme-hover '.($bRightMegaMenu ? 'mega-fixed-menu__close--right' : ''), SITE_TEMPLATE_PATH.'/images/svg/mega-fixed-menu-close.svg');?>
</div>