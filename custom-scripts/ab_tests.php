<?## A/B-тестирование на сайте ##
global $USER;
$alpExps = unserialize($APPLICATION->get_cookie("alpExps"));
$alpExps  = (!$alpExps ? array() : $alpExps);

if ($alpExps['updateExp'] != "160516") {
    $alpExps = array();
    $alpExps['updateExp'] = "160516";
}

//$alpExps['smartBannerApple']	= (!$alpExps['smartBannerApple'] ? rand(1,2) : $alpExps['smartBannerApple']);
$alpExps['discountBlock']		= (!$alpExps['discountBlock'] ? rand(1,2) : $alpExps['discountBlock']);

if ($APPLICATION->GetCurDir() == '/personal/cart/') {
    $alpExps['recsInCart']        = (!$alpExps['recsInCart'] ? rand(1,2) : $alpExps['recsInCart']);
}
?>


<!-- Тест Рекомендаций в корзине -->
<?if ($APPLICATION->GetCurDir() == '/personal/cart/') {
    if ($alpExps['recsInCart'] == 1) {?>
        <script type="text/javascript">
            $(document).ready(function() {
                dataLayer.push({
                    event: 'ab-test-gtm',
                    action: 'recsInCart',
                    label: 'withRecs'
                });
                console.log('recsInCart withRecs');
            });
        </script>
    <?} elseif ($alpExps['recsInCart'] == 2) {?>
        <style>
            .recomendation {display:none;}
        </style>    
        <script type="text/javascript">
            $(document).ready(function() {
                dataLayer.push({
                    event: 'ab-test-gtm',
                    action: 'recsInCart',
                    label: 'withoutRecs'
                });
                console.log('recsInCart withoutRecs');
            });
        </script>
    <?}
}?>
<!-- //Тест Рекомендаций в корзине -->

<!-- Тест Рекомендаций в корзине -->
<?if ($APPLICATION->GetCurDir() == '/') {
	if ($alpExps['discountBlock'] == 1) {?>
		<style>
			.blockBestsHide, .blockDiscountHide {display:none;}
			.blockBestsShow, .blockDiscountShow {display:inline;}
		</style>
		<script type="text/javascript">
			$(document).ready(function() {
				dataLayer.push({
					event: 'ab-test-gtm',
					action: 'discountBlock',
					label: 'moveUpwards'
				});
				console.log('discountBlock moveUpwards');
			});
		</script>
	<?} elseif ($alpExps['discountBlock'] == 2) {?>
		<style>
			.blockBestsShow, .blockDiscountShow {display:none;}
			.saleWrapp {overflow: visible;}
		</style>
		<script type="text/javascript">
			$(document).ready(function() {
				dataLayer.push({
					event: 'ab-test-gtm',
					action: 'discountBlock',
					label: 'doNothing'
				});
				console.log('discountBlock doNothing');
			});
		</script>
	<?}
}?>
<!-- //Тест Рекомендаций в корзине -->

<!-- Тест СмартБаннера -->
<meta name="apple-itunes-app" content="app-id=429622051">
<!-- //Тест СмартБаннера -->

<?$APPLICATION->set_cookie("alpExps", serialize($alpExps));
## A/B-тестирование на сайте ##?>