<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *	フォルダーページ表示処理。
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=showFolder.php
 *	ディレクトリ=/syupure/book/
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/Functions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/User.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/UserDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/Object.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/ObjectDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/entity/CircleMember.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/syupure/classes/dao/CircleMemberDAO.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/syupure/templates_c/");

if(isset($_SESSION["validationMsg"])) {
	$validationMsg = $_SESSION["validationMsg"];
	$smarty->assign("validationMsg", $validationMsg);
}

clearSession();

// ログインユーザ情報取得。
$userId = $_SESSION["userId"];
$userName = $_SESSION["userName"];

$objList = [];
try {
	$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
	$objDAO = new ObjDAO($db);
	$obj = $objDAO->findByUserDir($userId);
	$objList = $objDAO->findAllOnDir($userId, $obj->getId());
	$circleObjList = $objDAO->findAllOnCircle(1, 0);
	$circleMemberDAO = new CircleMemberDAO($db);
	$circleIdList = $circleMemberDAO->findByCircleId($userId);

	$smarty->assign("obj", $obj);
	$smarty->assign("objList", $objList);
	$smarty->assign("circleObjList", $circleObjList);
	$smarty->assign("circleId", $circleIdList[0]);
}
catch(PDOException $ex) {
	print_r($ex);
	$smarty->assign("errorMsg", "DB接続に失敗しました。");
	$tplPath = "error.tpl";
}
finally {
 	$db = null;
}

$smarty->assign("userName", $userName);

$tplPath = "top.tpl";

$smarty->display($tplPath);