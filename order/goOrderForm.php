<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *	フォルダーページ表示処理。
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=goOrderForm.php
 *	ディレクトリ=/syupure/order/
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/User.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/UserDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/Object.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/ObjectDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/BookProperty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/BookPropertyDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/PaperType.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/PaperTypeDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/PaperSize.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/PaperSizeDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/BdMethod.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/BdMethodDAO.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates_c/");

if(!isset($_POST["orderObjId"])) {
	$validationMsg = "サークル内から注文したいアイテムを選択してね！";
}
else {
	$orderObjId = $_POST["orderObjId"];
	$selectCircleId = $_POST["selectCircleId"];
	$_SESSION["orderObjId"] = $orderObjId;
	$_SESSION["selectCircleId"] = $selectCircleId;
	/* （仮）トップにてログイン開始 */
	$objList = [];
	$paperTypeList = [];
	try {
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$userDAO = new UserDAO($db);
		$user = $userDAO->findByLoginMail("Florlight.H@gmail.com");
		$objDAO = new ObjDAO($db);
		$obj = $objDAO->findByUserDir($user->getId());
		$objList = $objDAO->findAllOnDir($user->getId(), $obj->getId());
		$circleList = $objDAO->findAllOnCircle(1, 0);
		$bookPropertyDAO = new BookPropertyDAO($db);
		$bookProperty = $bookPropertyDAO->findByObjId($orderObjId);
		$nullCnt = $bookPropertyDAO->findNullCnt($orderObjId);
		$paperTypeDAO = new paperTypeDAO($db);
		$paperTypeList = $paperTypeDAO->findAll();
		$paperSizeDAO = new paperSizeDAO($db);
		$paperSizeList = $paperSizeDAO->findAll();
		$BdMethodDAO = new BdMethodDAO($db);
		$bdMethodList = $BdMethodDAO->findAll();

		$smarty->assign("user", $user);
		$smarty->assign("bookProperty", $bookProperty);
	}
	catch(PDOException $ex) {
		print_r($ex);
		$smarty->assign("errorMsg", "DB接続に失敗しました。");
		$tplPath = "error.tpl";
	}
	finally {
	 	$db = null;
	}

	// 紙質のセレクトボックス用配列作成。
	foreach ($paperTypeList as $key => $paperType) {
		$paperTypeListS[$paperType->getId()] = $paperType->getName();
	}
	// 紙サイズのセレクトボックス用配列作成。
	foreach ($paperSizeList as $key => $paperSize) {
		$paperSizeListS[$paperSize->getId()] = $paperSize->getName();
	}
	// 綴じ方向のセレクトボックス用配列作成。
	$bdDirection = array(
		"RIGHT" => "右",
		"LEFT" => "左",
	);
	// 綴じ方法のセレクトボックス用配列作成。
	foreach ($bdMethodList as $key => $bdMethod) {
		$bdMethodListS[$bdMethod->getId()] = $bdMethod->getName();
	}
	$bdDirectionId = array(1,2);
	// 未入力項目用変数作成。
	$validationCount = 0;
	foreach ($bookProperty as $key => $bookProperty) {
		# code...
	}
}

// バリデーション戻り設定
if(!empty($validationMsg)) {
	$_SESSION["validationMsg"] = $validationMsg;
	header("Location: /syupure/book/showFolder.php");
	exit;
}
else {
	$tplPath = "order-form.tpl";

	$smarty->assign("paperTypeList", $paperTypeListS);
	$smarty->assign("bdDirection", $bdDirection);
	$smarty->assign("paperSizeList", $paperSizeListS);
	$smarty->assign("nullCnt", $nullCnt);
	$smarty->assign("bdMethodList", $bdMethodListS);

	$smarty->display($tplPath);
}
