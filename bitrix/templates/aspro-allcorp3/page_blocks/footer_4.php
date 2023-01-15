<?
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/footer/settings.php');
?>
<footer id="footer" class="footer-4 footer footer--color-<?=$footerColor?>">
	<?$visible = (($bShowPhone && $bPhone) || $bShowEmail || $bShowAddress || $bShowSocial || ($bShowSubscribe && \Bitrix\Main\ModuleManager::isModuleInstalled("subscribe")));?>
	<div class="maxwidth-theme">
		<div class="footer__info footer__info--row footer__info--row-paddings js-check-hide<?=(!$visible && !$bAjax ? ' hidden' : '');?>">
			<div class="line-block line-block--48 line-block--align-normal">																	
				<div class="footer__info--part-left flex-grow-1 line-block__item flex-50-1200">																	
					<div class="line-block line-block--48 line-block--align-normal">																	
						<?//show phone and callback?>
						<?$blockOptions = array(
							'PARAM_NAME' => 'FOOTER_TOGGLE_PHONE',
							'BLOCK_TYPE' => 'PHONE',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowPhone && $bPhone,
							'DROPDOWN_TOP' => true,
							'WRAPPER' => 'footer__phone footer__info-item line-block__item flex-100-767 check-visible',
							'CALLBACK' => $bShowCallback && $bCallback,
							'MESSAGE' => GetMessage("S_CALLBACK"),
							'PARAM_CHECK_VISIBLE' => 'FOOTER_TOGGLE_SUBSCRIBE,FOOTER_TOGGLE_PHONE,FOOTER_TOGGLE_EMAIL,FOOTER_TOGGLE_ADDRESS,FOOTER_TOGGLE_SOCIAL',
						);?>
						<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>

						<?//show email?>
						<?$blockOptions = array(
							'PARAM_NAME' => 'FOOTER_TOGGLE_EMAIL',
							'BLOCK_TYPE' => 'EMAIL',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowEmail,
							'WRAPPER' => 'footer--nowrap footer--mt-3 footer__info-item line-block__item flex-100-767 check-visible',
							'PARAM_CHECK_VISIBLE' => 'FOOTER_TOGGLE_SUBSCRIBE,FOOTER_TOGGLE_PHONE,FOOTER_TOGGLE_EMAIL,FOOTER_TOGGLE_ADDRESS,FOOTER_TOGGLE_SOCIAL',
						);?>
						<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>

						<?//show address?>
						<?$blockOptions = array(
							'PARAM_NAME' => 'FOOTER_TOGGLE_ADDRESS',
							'BLOCK_TYPE' => 'ADDRESS',
							'IS_AJAX' => $bAjax,
							'AJAX_BLOCK' => $ajaxBlock,
							'VISIBLE' => $bShowAddress,
							'WRAPPER' => 'footer__address footer--mt-3 footer__info-item line-block__item flex-100-767 check-visible',
							'PARAM_CHECK_VISIBLE' => 'FOOTER_TOGGLE_SUBSCRIBE,FOOTER_TOGGLE_PHONE,FOOTER_TOGGLE_EMAIL,FOOTER_TOGGLE_ADDRESS,FOOTER_TOGGLE_SOCIAL',
						);?>
						<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>
					</div>
				</div>
					
				<div class="footer__info--part-right line-block__item flex-100-1200">
					<?//show social?>
					<?$blockOptions = array(
						'PARAM_NAME' => 'FOOTER_TOGGLE_SOCIAL',
						'BLOCK_TYPE' => 'SOCIAL',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowSocial,
						'HIDE_MORE' => false,
						'WRAPPER' => 'footer__social footer--mw-290 footer__info-item  check-visible social-'.$footerColor,
						'PARAM_CHECK_VISIBLE' => 'FOOTER_TOGGLE_SUBSCRIBE,FOOTER_TOGGLE_PHONE,FOOTER_TOGGLE_EMAIL,FOOTER_TOGGLE_ADDRESS,FOOTER_TOGGLE_SOCIAL',
					);?>
					<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>
				</div>
			</div>
		</div>
	</div>

	<div class="footer__bottom-part">
			<div class="footer__bottom-part-inner footer__bottom-part-inner--big-padding js-check-padding<?=(!$visible && !$bAjax ? ' js-padding' : '');?>">
				<div class="maxwidth-theme">
				<div class="footer__bottom-part-items-wrapper">
					<div class="footer__part-item">
						<div class="footer__copy font_13 color_999">
							<?$APPLICATION->IncludeFile(SITE_DIR."include/footer/copy.php", Array(), Array(
									"MODE" => "php",
									"NAME" => "Copyright",
									"TEMPLATE" => "include_area.php",
								)
							);?>
						</div>
					</div>

					<div class="footer__part-item">
						<div class="footer__license font_13">
							<?$APPLICATION->IncludeFile(SITE_DIR."include/footer/confidentiality.php", Array(), Array(
									"MODE" => "php",
									"NAME" => "Confidentiality",
									"TEMPLATE" => "include_area.php",
								)
							);?>
						</div>
					</div>

					<?//show eyed block?>
					<?$blockOptions = array(
						'PARAM_NAME' => 'FOOTER_TOGGLE_EYED',
						'BLOCK_TYPE' => 'EYED',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowEyed,
						'WRAPPER' => 'footer__part-item fill-theme-parent-all color-theme-parent-all',
					);?>
					<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>

					<?//show sitemap block?>
					<?$blockOptions = array(
						'PARAM_NAME' => 'FOOTER_TOGGLE_SITEMAP',
						'BLOCK_TYPE' => 'SITEMAP',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowSitemap,
						'WRAPPER' => 'footer__part-item footer__part-item-sitemap fill-theme-parent-all color-theme-parent-all font_13',
					);?>
					<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>

					<?if($arTheme['PRINT_BUTTON'] == 'Y'):?>
						<div class="footer__part-item">
							<div class="footer__print font_13 color_999">
								<?=CAllcorp3::ShowPrintLink();?>
							</div>
						</div>
					<?endif;?>
					
					<?//check subscribe text?>
					<?$blockOptions = array(
						'PARAM_NAME' => 'FOOTER_TOGGLE_SUBSCRIBE',
						'BLOCK_TYPE' => 'SUBSCRIBE',
						'BTN_CLASS' => 'btn btn-transparent-border btn-lg btn--thin',
						'FONT_SIZE' => '14',
						'POSITION_ICON' => 'RIGHT',
						'COMPACT' => true,
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowSubscribe && \Bitrix\Main\ModuleManager::isModuleInstalled("subscribe"),
						'SUBSCRIBE_PARAMS' => array(),
						'WRAPPER' => 'footer__part-item footer__part-item--subscribe check-visible',
						'PARAM_CHECK_VISIBLE' => 'FOOTER_TOGGLE_SUBSCRIBE,FOOTER_TOGGLE_PHONE,FOOTER_TOGGLE_EMAIL,FOOTER_TOGGLE_ADDRESS,FOOTER_TOGGLE_SOCIAL',
					);?>
					<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>

					<?//show pay systems?>
					<?$blockOptions = array(
						'PARAM_NAME' => 'FOOTER_TOGGLE_PAY_SYSTEMS',
						'BLOCK_TYPE' => 'PAY_SYSTEMS',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowPaySystems,
						'WRAPPER' => 'footer__pays footer__part-item',
					);?>
					<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>

					<?//show lang?>
					<?
					$arShowSites = \Aspro\Functions\CAsproAllcorp3::getShowSites();
					$countSites = count($arShowSites);
					$blockOptions = array(
						'PARAM_NAME' => 'FOOTER_TOGGLE_LANG',
						'BLOCK_TYPE' => 'LANG',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowLang && $countSites > 1,
						'DROPDOWN_TOP' => true,
						'WRAPPER' => 'footer__lang footer__part-item',
						'SITE_SELECTOR_NAME' => $siteSelectorName,
						'TEMPLATE' => 'main',
						'SITE_LIST' => $arShowSites,
					);?>
					<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>

					<div id="bx-composite-banner" class="footer__part-item"></div>

					<?//show developer block?>
					<?$blockOptions = array(
						'PARAM_NAME' => 'FOOTER_TOGGLE_DEVELOPER',
						'BLOCK_TYPE' => 'DEVELOPER',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowDeveloper,
						'WRAPPER' => 'footer__developer footer__part-item font_12 color_999',
					);?>
					<?=\Aspro\Functions\CAsproAllcorp3::showFooterBlock($blockOptions);?>
				</div>
			</div>
		</div>
	</div>
</footer>