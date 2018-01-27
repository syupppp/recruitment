<?php
/**
 * WP32 PHPサンプル12 マスターテーブル管理完版 Src03/26
 * 共通関数記述ファイル
 *
 *	@author Shinzo SAITO <architshin@websarva.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=Functions.php
 *	ディレクトリ=/wp32/scottadminkan/classes/
 */

/**
 *	ログイン済かどうかをチェックする関数。
 *	セッションからログイン情報が見つからない場合はログアウト状態と判定する。
 *
 *	@return boolean ログアウト状態の場合はtrue、ログイン状態の場合はfalse。
 */
function loginCheck() {
	$result = false;

	if(!isset($_SESSION["loginFlg"]) || $_SESSION["loginFlg"] == false || !isset($_SESSION["id"]) || !isset($_SESSION["name"]) || !isset($_SESSION["auth"])) {
		$result = true;
	}

	return $result;
}

/**
 *	Session情報の掃除関数。
 *	ログイン情報以外のセッション中の情報を一度破棄する。
 *	各ユースケース最初の実行ohoでこの関数を実行する。
 */
function clearSession() {
	$loginFlg = $_SESSION["loginFlg"];
	$userId = $_SESSION["userId"];
	$userName = $_SESSION["userName"];

	session_unset();

	$_SESSION["loginFlg"] = $loginFlg;
	$_SESSION["userId"] = $userId;
	$_SESSION["userName"] = $userName;
}
?>