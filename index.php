<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *	トップ画面表示処理
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=index.php
 *	ディレクトリ=/syupure/
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/User.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/UserDAO.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates_c/");

try {
	$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
	$userDAO = new UserDAO($db);
	$user = $userDAO->findByLoginMail("Florlight.H@gmail.com");

	$_SESSION["loginFlg"] = 1;
	$_SESSION["userId"] = $user->getId();
	$_SESSION["userName"] = $user->getName();
}
catch(PDOException $ex) {
	print_r($ex);
	$smarty->assign("errorMsg", "DB接続に失敗しました。");
	$smarty->assign("errorMsg", "DB接続に失敗しました。");
	$tplPath = "error.tpl";
}
finally {
 	$db = null;
}

header("Location: /syupure/book/showFolder.php");
exit;
