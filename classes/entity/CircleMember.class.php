<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=CircleMember.class.php
 *	ディレクトリ=/syupure/classes/entity/
 */

/**
 *	サークルメンバーエンティティクラス。
 */
class CircleMember {
	/**
	 *	サークルID。
	 */
	private $circleId;
	/**
	 *	ユーザID。
	 */
	private $userId;


	//以下アクセサメソッド。

	public function getCircleId() {
		return $this->circleId;
	}
	public function setCircleId($circleId) {
		$this->circleId = $circleId;
	}
	public function getUserId() {
		return $this->userId;
	}
	public function setUserId($userId) {
		$this->userId = $userId;
	}
}