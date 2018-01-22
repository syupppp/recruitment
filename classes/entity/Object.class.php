<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=Object.class.php
 *	ディレクトリ=/syupure/classes/entity/
 */

/**
 *	オブジェクトエンティティクラス。
 */
class Object {
	/**
	 *	主キーのid。
	 */
	private $id;
	/**
	 *	オブジェクト名。
	 */
	private $name;
	/**
	 *	オブジェクトタイプ。
	 */
	private $type;
	/**
	 *	ユーザID。
	 */
	private $userId;
	/**
	 *	サークルID。
	 */
	private $circleId;
	/**
	 *	親階層ID。
	 */
	private $parentId;


	//以下アクセサメソッド。

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
	}
	public function getUserId() {
		return $this->userId;
	}
	public function setUserId($userId) {
		$this->userId = $userId;
	}
	public function getCircleId() {
		return $this->circleId;
	}
	public function setCircleId($circleId) {
		$this->circleId = $circleId;
	}
	public function getParentId() {
		return $this->parentId;
	}
	public function setParentId($parentId) {
		$this->parentId = $parentId;
	}
}