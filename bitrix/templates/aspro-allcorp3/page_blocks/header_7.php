<?
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/header/settings.php');

global $bodyDopClass;
$bodyDopClass .= ' header_padding-150';

/* set classes for header parts */
$mainPartClasses = '';
$mainPartClasses .= ' header--color_'.$mainBlockColor;
$mainPartClasses .= ' header__main-part--header_7';
$mainPartClasses .= ' header__main-part--bordered';
$mainPartClasses .= ' header__main-part--can-transparent';

$innerClasses = '';
$innerClasses .= ' header__main-inner--top-with-padding header__main-inner--header7-logo';
if($bNarrowHeader) {
	$innerClasses .= ' header__main-inner--margin';
}

$mainPartClasses .= ' bg_none';
$innerClasses .= ' bg_none';
?>

<header class="header7 header <?=($arRegion ? 'header--with_regions' : '')?> <?=$bNarrowHeader ? 'header--narrow' : ''?> <?=CAllcorp3::ShowPageProps('HEADER_COLOR')?>">
	<div class="header__inner">

		<?if($ajaxBlock == "HEADER_MAIN_PART" && $bAjax) {
			$APPLICATION->restartBuffer();
		}?>

		<div class="header__main-part  <?=$mainPartClasses?> sliced"  data-ajax-load-block="HEADER_MAIN_PART">

			<?if($bNarrowHeader):?>
				<div class="maxwidth-theme">
			<?endif;?>

			<div class="header__main-inner <?=$innerClasses?>">
				<div class="header__main-item header7_logo">
					<div class="line-block line-block--40">
						<div class="line-block line-block__item">
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
						
						<?//check slogan text?>
						<?
						$blockOptions = array(
							'PARAM_NAME' => 'HEADER_TOGGLE_SLOGAN',
							'BLOCK_TYPE' => 'SLOGAN',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowSlogan,
							'WRAPPER' => 'line-block__item hide-narrow hide-narrow-1500 hide-1700',
						);
						?>
						<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
					</div>
				</div>

				<?//show menu?>
				<div class="header__main-item header__main-item--shinked header-menu header-menu--column">
					<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
						array(
							"COMPONENT_TEMPLATE" => ".default",
							"PATH" => SITE_DIR."include/header/menu_new_2.php",
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "",
							"AREA_FILE_RECURSIVE" => "Y",
							"EDIT_TEMPLATE" => "include_area.php"
						),
						false, array("HIDE_ICONS" => "Y")
					);?>
				</div>

				<div class="header__main-item header__main-item--flex">
					<div class="line-block line-block--40 line-block--24-vertical line-block--wrap-end-1400">
						<div class="line-block line-block--40 line-block--24-narrow line-block__item hide-basket-message">
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
								'WRAPPER' => 'line-block__item no-shrinked  icon-block--only_icon-1400',
								'CALLBACK' => $bShowCallback && $bCallback,
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
								'WRAPPER' => 'line-block__item  icon-block--only_icon-1400',
								'SITE_SELECTOR_NAME' => $siteSelectorName,
								'TEMPLATE' => 'main',
								'SITE_LIST' => $arShowSites,
							);
							?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

							<?
							$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_EYED',
								'BLOCK_TYPE' => 'EYED',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bShowEyed,
								'WRAPPER' => 'line-block__item',
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
								'WRAPPER' => 'line-block__item hide-name-narrow',
								'MESSAGE' => \Bitrix\Main\Localization\Loc::getMessage('COMPARE_TEXT'),
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
						</div>

						<div class="line-block line-block--40 line-block--24-narrow line-block__item">
							<?
							$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_BUTTON',
								'BLOCK_TYPE' => 'BUTTON',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bShowButton,
								'WRAPPER' => 'line-block__item',
								'MESSAGE' => GetMessage("S_CALLBACK"),
								'CLASS' => 'btn-md',
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