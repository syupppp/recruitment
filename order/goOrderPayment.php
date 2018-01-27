<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *	フォルダーページ表示処理。
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=goOrderPayment.php
 *	ディレクトリ=/syupure/order/
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/User.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/UserDAO.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates_c/");

/* （仮）トップにてログイン開始 */
try {
	$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
	$userId = $_SESSION["userId"];
	$userName = $_SESSION["userName"];
	$userDAO = new UserDAO($db);
	$user = $userDAO->findByUserId($userId);

	$smarty->assign("userName", $userName);
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

$tplPath = "order-payment.tpl";

$smarty->display($tplPath);
