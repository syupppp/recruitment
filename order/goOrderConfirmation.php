<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *	フォルダーページ表示処理。
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=goOrderComfirmation.php
 *	ディレクトリ=/syupure/order/
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/User.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/UserDAO.class.php');
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
$circleId = $_SESSION["selectCircleId"];
$smarty->assign("objId", $objId);
// ログイン情報取得
$userId = $_SESSION["userId"];
$userName = $_SESSION["userName"];
$smarty->assign("userName", $userName);

/* ブック注文仕様情報、サークル情報、ユーザ情報の取得。 */
/* ブック注文仕様情報を表示用に加工するために、紙サイズ、綴じ方法、紙質情報を取得。 */
$bookProperty = "";
$paperSizeList = [];
$bdMethodList = [];
$paperTypeList = [];
$circle = "";
$user = "";

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

	// サークル情報取得。
	$circleDAO = new CircleDAO($db);
	$circle = $circleDAO->findByPK($circleId);
	// ユーザ情報取得。
	$userDAO = new userDAO($db);
	$user = $userDAO->findByUserId($userId);

	$smarty->assign("bookProperty", $bookProperty);
	$smarty->assign("circle", $circle);
	$smarty->assign("user", $user);
}
catch(PDOException $ex) {
	print_r($ex);
	$smarty->assign("errorMsg", "DB接続に失敗しました。");
	$tplPath = "error.tpl";
}
finally {
 	$db = null;
}


$tplPath = "order-confirmation.tpl";

$smarty->display($tplPath);