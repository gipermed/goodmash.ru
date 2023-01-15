<?
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/header/settings.php');

global $bodyDopClass;
$bodyDopClass .= ' header_padding-91';
$bodyDopClass .= ' header_padding-152-1200';

/* set classes for header parts */
$mainPartClasses = '';
$mainPartClasses .= ' header__main-part--height_91';
$mainPartClasses .= ' header__main-part--can-transparent';
//$mainPartClasses .= ' header__main-part--no-radius-bottom-1200';
$mainPartClasses .= ' header__main-part--menu-compact-1200';

$mainPartClasses .= ' hide-dotted';
if($bNarrowHeader) {
	if($bMarginHeader) {
	} else {
		$mainPartClasses .= ' header--color_'.$mainBlockColor;
		$mainPartClasses .= ' header__main-part--bordered';
	}
} else {
	$mainPartClasses .= ' header--color_'.$mainBlockColor;
	if($bMarginHeader) {
		$mainPartClasses .= ' header__main-part--shadow';
	} else {
		$mainPartClasses .= ' header__main-part--bordered';
	}
}

$innerClasses = '';
$innerClasses .= ' header__main-inner--height_91';
if($bNarrowHeader) {
	if($bMarginHeader) {
		$innerClasses .= ' header--color_'.$mainBlockColor;
		$innerClasses .= ' header__main-inner--bordered';
		$innerClasses .= ' header__main-inner--shadow';
		$innerClasses .= ' header__main-inner--no-shadow-1200';
	} else {
		$innerClasses .= ' header__main-inner--margin';
	}
}
if(!$bMarginHeader) {
	$mainPartClasses .= ' bg_none';
	$innerClasses .= ' bg_none';
}
?>

<header class="header_8 header <?=($bHeaderFon ? 'header--fon' : '')?> <?=($arRegion ? 'header--with_regions' : '')?> <?=$bNarrowHeader ? 'header--narrow' : ''?> <?=$bMarginHeader ? 'header--offset header--save-margin' : ''?> <?=($bMarginHeader && $whiteBreadcrumbs) ? 'header--white' : '' ;?> <?=CAllcorp3::ShowPageProps('HEADER_COLOR')?>">
	<div class="header__inner <?=$bMarginHeader ? 'header__inner--margins' : ''?> <?=$bNarrowHeader ? 'header__inner--margins-side-none' : ''?> ">

		<?if($ajaxBlock == "HEADER_MAIN_PART" && $bAjax) {
			$APPLICATION->restartBuffer();
		}?>

		<div class="header__main-part  <?=$mainPartClasses?> sliced"  data-ajax-load-block="HEADER_MAIN_PART">

			<?if($bNarrowHeader):?>
				<div class="maxwidth-theme <?=$bMarginHeader ? '' : 'pos-static'?>">
			<?endif;?>

			<div class="header__main-inner <?=$innerClasses?>">
				<div class="header__main-item">
					<div class="line-block">
						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_MEGA_MENU_LEFT',
							'BLOCK_TYPE' => 'MEGA_MENU',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowMegaMenu && !$bRightMegaMenu,
							'WRAPPER' => 'line-block__item',
						);
						?>
						<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
				
						<?//show logo?>
						<div class="line-block__item no-shrinked">
							<div class="logo <?=$logoClass?>">
								<?=CAllcorp3::ShowLogo();?>
							</div>
						</div>
					</div>
				</div>

				<?//show menu?>
				<div class="header__main-item header__main-item--shinked header-menu header-menu--height_61 header-menu--centered header-menu--32 <?='header-menu--color_'.$mainBlockColor?>">
					<nav class="mega-menu sliced">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
							array(
								"COMPONENT_TEMPLATE" => ".default",
								"PATH" => SITE_DIR."include/header/menu_new.php",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "",
								"AREA_FILE_RECURSIVE" => "Y",
								"EDIT_TEMPLATE" => "include_area.php"
							),
							false, array("HIDE_ICONS" => "Y")
						);?>
					</nav>
				</div>

				<div class="header__main-item">
					<div class="line-block hide-basket-message">
						<?if($arRegion):?>
							<?//regions?>
							<div class="line-block__item icon-block--only_icon-1400">
								<?
								$arRegionsParams = array();
								if($bAjax) {
									$arRegionsParams['POPUP'] = 'N';
								}
								CAllcorp3::ShowListRegions($arRegionsParams);?>
							</div>
						<?endif;?>

						<?//show phone and callback?>
						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_PHONE',
							'BLOCK_TYPE' => 'PHONE',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowPhone && $bPhone,
							'WRAPPER' => 'line-block__item no-shrinked icon-block--only_icon-1400',
							'NO_ICON' => true,
							'MESSAGE' => GetMessage("S_CALLBACK"),
						);
						?>
						<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

						<?//show site list?>
						<?
						$arShowSites = \Aspro\Functions\CAsproAllcorp3::getShowSites();
						$countSites = count($arShowSites);
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_LANG',
							'BLOCK_TYPE' => 'LANG',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowLang && $countSites > 1,
							'NO_ICON' => true,
							'WRAPPER' => 'line-block__item icon-block--only_icon-1400',
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
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowSearch,
							'WRAPPER' => 'line-block__item',
						);
						?>
						<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

						<?$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_CABINET',
							'BLOCK_TYPE' => 'CABINET',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bCabinet,
							'WRAPPER' => 'line-block__item',
							'CABINET_PARAMS' => array(
								'TEXT_LOGIN' => '',
								'TEXT_NO_LOGIN' => '',
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
							'CLASS_LINK' => 'light-opacity-hover fill-theme-hover banner-light-icon-fill',
							'CLASS_ICON' => 'menu-light-icon-fill ',
						);?>
						<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
						
						<?$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_BASKET',
							'BLOCK_TYPE' => 'BASKET',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bOrder && !CAllcorp3::IsBasketPage() && !CAllcorp3::IsOrderPage(),
							'WRAPPER' => 'line-block__item',
							'MESSAGE' => '',
						);?>
						<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_BUTTON',
							'BLOCK_TYPE' => 'BUTTON',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowButton,
							'WRAPPER' => 'line-block__item',
							'MESSAGE' => GetMessage("S_CALLBACK"),
						);
						?>
						<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_MEGA_MENU_RIGHT',
							'BLOCK_TYPE' => 'MEGA_MENU',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowMegaMenu && $bRightMegaMenu,
							'WRAPPER' => 'line-block__item',
						);
						?>
						<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
					</div>
				</div>

			</div>

			<?if($bNarrowHeader):?>
				</div>
			<?endif;?>	
		</div>

		<?if($ajaxBlock == "HEADER_MAIN_PART" && $bAjax) {
			die();
		}?>
	</div>
</header>