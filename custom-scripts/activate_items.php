<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if ($USER->isAdmin()) {
	CModule::IncludeModule("iblock");
	$books = array(
	54395,
	60909,
	67903,
	7936,
	8632,
	8636,
	8638,
	8640,
	8684,
	8664,
	8682,
	8686,
	8702,
	8704,
	8678,
	8716,
	8622,
	8700,
	8800,
	8652,
	8696,
	8750,
	8746,
	8614,
	8576,
	8738,
	8720,
	8580,
	8654,
	8698,
	6139,
	8766,
	8710,
	8752,
	8786,
	8706,
	8774,
	8790,
	8826,
	8488,
	8772,
	8812,
	7407,
	8548,
	8834,
	8866,
	8808,
	8848,
	6841,
	8500,
	8814,
	66441,
	8798,
	8822,
	8714,
	8688,
	60897,
	8820,
	8754,
	8852,
	8856,
	8850,
	55602,
	55604,
	55606,
	8862,
	55598,
	60901,
	60903,
	66444,
	60915,
	8788,
	60927,
	60911,
	60905,
	8858,
	8860,
	66336,
	66770,
	8672,
	60895,
	60907,
	60899,
	60923
	);
	foreach ($books as $singlebook) {
		$obEl = new CIBlockElement();
		//$boolResult = $obEl->Update($singlebook,array('ACTIVE' => 'Y'));
		CIBlockElement::SetPropertyValuesEx($singlebook, 4, array('STATE' => ''));
		echo $singlebook.' - activated <br />';
	}
} else {
	echo "������";
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>