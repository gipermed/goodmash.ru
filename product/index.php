<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Дизельные генераторы купить по лучшей цене ☛ Низкие цены ☛ Большой выбор ☛ Доставка по всей России ★★★★★ Интернет-магазин \"Хорошая техника\" ☎️ +7(995)155-83-20 (Пн–Пт: с 9:00 до 18:00)");
$APPLICATION->SetPageProperty("keywords", "Кайшан, kaishan, проходческие буровые установки, буровой пневмоударник, пневматические буровые установки, установка для погружного бурения, буровая установка для бурения скважин на воду, буровой инструмент");
$APPLICATION->SetPageProperty("title", "Дизельные генераторы купить в Москве по низкой цене | Дизель электростанции с доставкой");
$APPLICATION->SetPageProperty("MENU_SHOW_ELEMENTS", "Y");
$APPLICATION->SetTitle("Каталог");
?><?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"main", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PICT_PROP" => "PHOTOS",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ASK_FORM_ID" => "",
		"BASKET_URL" => "/personal/basket.php",
		"BIG_GALLERY_PROP_CODE" => "PHOTOS",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMMENTS_COUNT" => "5",
		"COMPARE_ELEMENT_SORT_FIELD" => "sort",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"COMPARE_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_PROPERTY_CODE" => array(
			0 => "STATUS",
			1 => "ARTICLE",
			2 => "BRAND",
			3 => "GRUZ",
			4 => "GRUZ_STRELI",
			5 => "DLINA",
		),
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "main",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BLOCKS_ALL_ORDER" => "sale,desc,char,reviews,big_gallery,video,sku,tariffs,services,projects,news,articles,docs,staff,faq,partners,vacancy,goods,buy,payment,delivery,dops,comments",
		"DETAIL_BLOCKS_ORDER" => "tabs,sku,sale,big_gallery,services,projects,news,articles,staff,partners,vacancy,goods,comments",
		"DETAIL_BLOCKS_TAB_ORDER" => "desc,char,tariffs,video,docs,faq,reviews,buy,payment,delivery,dops,complects",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_BLOG_TITLE" => "Комментарии",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => "",
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"DETAIL_FB_APP_ID" => "APP_ID",
		"DETAIL_FB_TITLE" => "Facebook",
		"DETAIL_FB_USE" => "Y",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => "",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "BLOG_POST_ID",
			1 => "POPUP_VIDEO",
			2 => "BLOG_COMMENTS_CNT",
			3 => "SHOW_ON_INDEX_PAGE",
			4 => "LINK_REGION",
			5 => "STATUS",
			6 => "LINK_SKU",
			7 => "ARTICLE",
			8 => "FORM_QUESTION",
			9 => "PRICE",
			10 => "FORM_ORDER",
			11 => "PRICE_CURRENCY",
			12 => "PRICEOLD",
			13 => "ECONOMY",
			14 => "FILTER_PRICE",
			15 => "BNR_TOP",
			16 => "DATE_COUNTER",
			17 => "INCLUDE_TEXT",
			18 => "VIDEO",
			19 => "HIT",
			20 => "VIDEO_IFRAME",
			21 => "BEST_ITEM",
			22 => "LINK_STUDY",
			23 => "LINK_PARTNERS",
			24 => "LINK_PROJECTS",
			25 => "LINK_STAFF",
			26 => "LINK_ARTICLES",
			27 => "BRAND",
			28 => "LINK_TARIF",
			29 => "LINK_TIZERS",
			30 => "LINK_VACANCY",
			31 => "LINK_REVIEWS",
			32 => "LINK_NEWS",
			33 => "LINK_SERVICES",
			34 => "LINK_FAQ",
			35 => "LINK_SALE",
			36 => "LINK_GOODS_FILTER",
			37 => "LINK_GOODS",
			38 => "SUPPLIED",
			39 => "AGE",
			40 => "KARTOPR",
			41 => "HEIGHT",
			42 => "DEPTH",
			43 => "DEEP",
			44 => "GRUZ_STRELI",
			45 => "GRUZ",
			46 => "DIAGONAL",
			47 => "DLINA_STRELI",
			48 => "DLINA",
			49 => "CATEGORY",
			50 => "CLASS",
			51 => "CLIMAT_CLASS",
			52 => "KOL_FORMULA",
			53 => "USERS",
			54 => "EXTENSION",
			55 => "MARK_STEEL",
			56 => "MASS",
			57 => "MODEL",
			58 => "POWER",
			59 => "UPDATES",
			60 => "VOLUME",
			61 => "SIZE",
			62 => "PLACE",
			63 => "RESOLUTION",
			64 => "LIGHTS_LOCATION",
			65 => "RECOMMEND",
			66 => "SERIES",
			67 => "SPEED",
			68 => "DURATION",
			69 => "PROIZVODSTVO",
			70 => "TEMPERATURE",
			71 => "TYPE",
			72 => "TYPE_TUR",
			73 => "THICKNESS",
			74 => "MARK",
			75 => "INCREASE",
			76 => "COLOR",
			77 => "FREQUENCY",
			78 => "FREQUENCE",
			79 => "WIDTH_PROHOD",
			80 => "WIDTH_PROEZD",
			81 => "WIDTH",
			82 => "LANGUAGES",
			83 => "CODE_TEXT",
			84 => "",
			85 => "EDITION_1C",
			86 => "LINK_COMPLECT",
			87 => "DEMO_URL",
			88 => "MORE_PHOTO",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SHOW_POPULAR" => "Y",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_SHOW_VIEWED" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DETAIL_VK_API_ID" => "API_ID",
		"DETAIL_VK_TITLE" => "ВКонтакте",
		"DETAIL_VK_USE" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DOCS_PROP_CODE" => "DOCUMENTS",
		"ELEMENTS_LIST_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENTS_PRICE_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENTS_TABLE_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENT_SORT_FIELD" => "name",
		"ELEMENT_SORT_FIELD2" => "name",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "asc",
		"ELEMENT_TYPE_VIEW" => "FROM_MODULE",
		"FILE_404" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_NAME" => "",
		"FILTER_PRICE_CODE" => "",
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_VIEW_MODE" => "VERTICAL",
		"IBLOCK_ID" => "42",
		"IBLOCK_TYPE" => "aspro_allcorp3_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"INSTANT_RELOAD" => "N",
		"LABEL_PROP" => "",
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"LANDING_IBLOCK_ID" => "43",
		"LANDING_SECTION_COUNT" => "20",
		"LANDING_SECTION_COUNT_VISIBLE" => "3",
		"LANDING_TIZER_IBLOCK_ID" => "1",
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LINKED_ELEMENT_TAB_SORT_FIELD" => "shows",
		"LINKED_ELEMENT_TAB_SORT_FIELD2" => "shows",
		"LINKED_ELEMENT_TAB_SORT_ORDER" => "asc",
		"LINKED_ELEMENT_TAB_SORT_ORDER2" => "asc",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"LIST_PROPERTY_CODE" => array(
			0 => "STATUS",
			1 => "LINK_SKU",
			2 => "ARTICLE",
			3 => "FORM_QUESTION",
			4 => "PRICE",
			5 => "FORM_ORDER",
			6 => "PRICE_CURRENCY",
			7 => "PRICEOLD",
			8 => "ECONOMY",
			9 => "FILTER_PRICE",
			10 => "DATE_COUNTER",
			11 => "HIT",
			12 => "BEST_ITEM",
			13 => "BRAND",
			14 => "DEPTH",
			15 => "GRUZ_STRELI",
			16 => "GRUZ",
			17 => "DLINA_STRELI",
			18 => "VOLUME",
			19 => "RECOMMEND",
			20 => "SPEED",
			21 => "WIDTH_PROHOD",
			22 => "WIDTH_PROEZD",
			23 => "",
		),
		"LIST_PROPERTY_CODE_MOBILE" => "",
		"LIST_SHOW_SLIDER" => "Y",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"LOAD_ON_SCROLL" => "N",
		"MAX_GALLERY_ITEMS" => "5",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"OPT_BUY" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "modern",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "12",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => "",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PROPERTIES_DISPLAY_TYPE" => "TABLE",
		"SALE_STIKER" => "-",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "N",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SEARCH_USE_SEARCH_RESULT_ORDER" => "N",
		"SECTIONS_LIST_PREVIEW_DESCRIPTION" => "Y",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_TYPE_VIEW" => "FROM_MODULE",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_DISPLAY_PROPERTY" => "UF_VIEWTYPE",
		"SECTION_ELEMENTS_TYPE_VIEW" => "FROM_MODULE",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_ITEM_LIST_IMG_CORNER" => "N",
		"SECTION_ITEM_LIST_OFFSET_CATALOG" => "Y",
		"SECTION_ITEM_LIST_TEXT_CENTER" => "N",
		"SECTION_LIST_DISPLAY_TYPE" => "3",
		"SECTION_LIST_PREVIEW_DESCRIPTION" => "Y",
		"SECTION_TOP_BLOCK_TITLE" => "Лучшие предложения",
		"SECTION_TOP_DEPTH" => "2",
		"SECTION_TYPE_VIEW" => "FROM_MODULE",
		"SEF_FOLDER" => "/product/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SHOW_ASK_BLOCK" => "Y",
		"SHOW_BIG_GALLERY" => "Y",
		"SHOW_BUY" => "N",
		"SHOW_CHILD_SECTIONS" => "Y",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DELIVERY" => "Y",
		"SHOW_DOPS" => "N",
		"SHOW_GALLERY" => "Y",
		"SHOW_HINTS" => "Y",
		"SHOW_LANDINGS" => "Y",
		"SHOW_LIST_TYPE_SECTION" => "Y",
		"SHOW_ONE_CLINK_BUY" => "Y",
		"SHOW_PAYMENT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SECTION_DESC" => "Y",
		"SHOW_SKU_DESCRIPTION" => "N",
		"SHOW_TOP_ELEMENTS" => "N",
		"SIDEBAR_DETAIL_POSITION" => "right",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_POSITION" => "right",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"SKU_IBLOCK_ID" => "42",
		"SKU_PROPERTY_CODE" => array(
		),
		"SKU_SORT_FIELD" => "shows",
		"SKU_SORT_FIELD2" => "shows",
		"SKU_SORT_ORDER" => "asc",
		"SKU_SORT_ORDER2" => "asc",
		"SKU_TREE_PROPS" => array(
		),
		"SORT_DIRECTION" => "asc",
		"SORT_PROP" => array(
			0 => "name",
		),
		"SORT_PROP_DEFAULT" => "name",
		"TEMPLATE_THEME" => "blue",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TYPE_BIG_GALLERY" => "BIG",
		"T_ARTICLES" => "",
		"T_BIG_GALLERY" => "",
		"T_BUY" => "",
		"T_CHAR" => "",
		"T_DELIVERY" => "",
		"T_DESC" => "",
		"T_DOCS" => "",
		"T_DOPS" => "",
		"T_FAQ" => "",
		"T_GOODS" => "Вам может понравиться",
		"T_NEWS" => "",
		"T_PARTNERS" => "",
		"T_PAYMENT" => "",
		"T_PROJECTS" => "",
		"T_REVIEWS" => "",
		"T_SALE" => "",
		"T_SERVICES" => "",
		"T_SKU" => "",
		"T_STAFF" => "",
		"T_TARIFFS" => "",
		"T_VACANCY" => "",
		"T_VIDEO" => "",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_COMPARE" => "Y",
		"USE_DETAIL_TABS" => "FROM_MODULE",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_REVIEW" => "N",
		"USE_SHARE" => "Y",
		"USE_STORE" => "N",
		"VIEW_TYPE" => "table",
		"VISIBLE_PROP_COUNT" => "6",
		"USE_COMPARE_GROUP" => "N",
		"T_COMPLECTS" => "",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>