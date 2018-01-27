<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *	フォルダーページ表示処理。
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=goOrderComplited.php
 *	ディレクトリ=/syupure/order/
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/OrderBook.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/OrderBookDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/BookProperty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/BookPropertyDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/Circle.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/CircleDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/PaperSize.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/PaperSizeDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/BdMethod.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/BdMethodDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/PaperType.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/PaperTypeDAO.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates_c/");

// オブジェクトIDとサークルID取得。
$objId = $_SESSION["orderObjId"];
$smarty->assign("objId", $objId);
// ログイン情報取得
$userId = $_SESSION["userId"];
$userName = $_SESSION["userName"];
$smarty->assign("userName", $userName);

/* ブック注文仕様情報の取得。 */
/* ブック注文情報をブック注文tblに登録。 */
$bookProperty = "";
$paperSizeList = [];
$bdMethodList = [];
$paperTypeList = [];
$orderBook = "";

try {
	$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
	// ブック注文仕様情報取得。
	$bookPropertyDAO = new BookPropertyDAO($db);
	$bookProperty = $bookPropertyDAO->findByObjID($objId);
	// 紙サイズ情報取得。
	$paperSizeDAO = new PaperSizeDAO($db);
	$paperSizeList = $paperSizeDAO->findAll();
	// 綴じ方法情報取得。
	$bdMethodDAO = new BdMethodDAO($db);
	$bdMethodList = $bdMethodDAO->findAll();
	// 紙質情報取得。
	$paperTypeDAO = new PaperTypeDAO($db);
	$paperTypeList = $paperTypeDAO->findAll();
	// ブック注文仕様を表示用に加工。
	foreach ($paperSizeList as $key => $paperSize) {
		if($paperSize->getId() == $bookProperty->getAlPpSize()) {
			$bookProperty->setAlPpSize($paperSize->getName());
		}
	}
	foreach ($bdMethodList as $key => $bdMethod) {
		if($bdMethod->getId() == $bookProperty->getAlBdMethod()) {
			$bookProperty->setAlBdMethod($bdMethod->getName());
		}
	}
	foreach ($paperTypeList as $key => $paperType) {
		if($paperType->getId() == $bookProperty->getFrPpType()) {
			$bookProperty->setFrPpType($paperType->getName());
		}
		if($paperType->getId() == $bookProperty->getInPpType()) {
			$bookProperty->setInPpType($paperType->getName());
		}
	}
	// ブック注文情報へ移し変え。
	$orderBook = new OrderBook();
	$orderBook->setAlPpSize($bookProperty->getAlPpSize());
	$orderBook->setAlBdDirection($bookProperty->getAlBdDirection());
	$orderBook->setAlBdMethod($bookProperty->getAlBdMethod());
	$orderBook->setAlPpDirection($bookProperty->getAlPpDirection());
	$orderBook->setAlBkNum($bookProperty->getAlBkNum());
	$orderBook->setAlPpNum($bookProperty->getAlPpNum());
	$orderBook->setFrClorbw($bookProperty->getFrClorbw());
	$orderBook->setFrPpType($bookProperty->getFrPpType());
	$orderBook->setInClorbw($bookProperty->getInClorbw());
	$orderBook->setInPpType($bookProperty->getInPpType());
	$orderBook->setObjId($bookProperty->getObjId());

	// ブック注文情報を登録。
	$orderBookDAO = new OrderBookDAO($db);
	$orderBookDAO->insert($orderBook);
}
catch(PDOException $ex) {
	print_r($ex);
	$smarty->assign("errorMsg", "DB接続に失敗しました。");
	$tplPath = "error.tpl";
}
finally {
 	$db = null;
}


$tplPath = "order-completed.tpl";

$smarty->display($tplPath);