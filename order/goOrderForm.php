
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

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates_c/");

$orderObj = $_POST["orderObj"];

/* （仮）トップにてログイン開始 */
$objList = [];
try {
	$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
	$userDAO = new UserDAO($db);
	$objDAO = new ObjDAO($db);
	$user = $userDAO->findByLoginMail("Florlight.H@gmail.com");
	$obj = $objDAO->findByUserDir($user->getId());
	$objList = $objDAO->findAllOnDir($user->getId(), $obj->getId());
	$circleList = $objDAO->findAllOnCircle(1, 0);

	$smarty->assign("order", $order);
}
catch(PDOException $ex) {
	print_r($ex);
	$smarty->assign("errorMsg", "DB接続に失敗しました。");
	$tplPath = "error.tpl";
}
finally {
 	$db = null;
}


$tplPath = "order-form.tpl";

$smarty->display($tplPath);