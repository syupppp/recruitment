<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *	フォルダーページ表示処理。
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=goOrderDelivery.php
 *	ディレクトリ=/syupure/order/
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/BookProperty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/BookPropertyDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/Circle.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/CircleDAO.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates_c/");

// オブジェクトID取得。
$objId = $_SESSION["orderObjId"];
$smarty->assign("objId", $objId);

$bookPropertyColumn["id"] = $id = trim($_POST["id"]);
$bookPropertyColumn["alPpSize"] = $alPpSize = trim($_POST["alPpSize"]);
$bookPropertyColumn["alBdDirection"] = $alBdDirection = trim($_POST["alBdDirection"]);
$bookPropertyColumn["alBdMethod"] = $alBdMethod = trim($_POST["alBdMethod"]);
$bookPropertyColumn["alPpDirection"] = $alPpDirection = trim($_POST["alPpDirection"]);
$bookPropertyColumn["alBkNum"] = $alBkNum = trim($_POST["alBkNum"]);
$bookPropertyColumn["alPpNum"] = $alPpNum = trim($_POST["alPpNum"]);
$bookPropertyColumn["frClorbw"] = $frClorbw = trim($_POST["frClorbw"]);
$bookPropertyColumn["frPpType"] = $frPpType = trim($_POST["frPpType"]);
$bookPropertyColumn["inClorbw"] = $inClorbw = trim($_POST["inClorbw"]);
$bookPropertyColumn["inPpType"] = $inPpType = trim($_POST["inPpType"]);

/* INSERT処理 */
$bookProperty = new BookProperty();
$bookProperty->setId($id);
$bookProperty->setAlPpSize($alPpSize);
$bookProperty->setAlBdDirection($alBdDirection);
$bookProperty->setAlBdMethod($alBdMethod);
$bookProperty->setAlPpDirection($alPpDirection);
$bookProperty->setAlBkNum($alBkNum);
$bookProperty->setAlPpNum($alPpNum);
$bookProperty->setFrClorbw($frClorbw);
$bookProperty->setFrPpType($frPpType);
$bookProperty->setInClorbw($inClorbw);
$bookProperty->setInPpType($inPpType);
$bookProperty->setObjId($objId);

/* （仮）トップにてログイン開始 */
try {
	$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
	$userId = $_SESSION["userId"];
	$userName = $_SESSION["userName"];
	$bookPropertyDAO = new BookPropertyDAO($db);
	$bookPropertyDAO->update($bookProperty);
	$circleDAO = new CircleDAO($db);
	$circle = $circleDAO->findByPK($userId);

	$smarty->assign("userName", $userName);
	$smarty->assign("circle", $circle);
}
catch(PDOException $ex) {
	print_r($ex);
	$smarty->assign("errorMsg", "DB接続に失敗しました。");
	$tplPath = "error.tpl";
}
finally {
 	$db = null;
}


$tplPath = "order-delivery.tpl";

$smarty->display($tplPath);