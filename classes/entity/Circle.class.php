<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=Circle.class.php
 *	ディレクトリ=/syupure/classes/entity/
 */

/**
 *	サークルエンティティクラス。
 */
class Circle {
	/**
	 *	主キーのid。
	 */
	private $id;
	/**
	 *	サークル名。
	 */
	private $name;
	/**
	 *	都道府県ID。
	 */
	private $prefId;
	/**
	 *	郵便番号。
	 */
	private $postalCode;
	/**
	 *	住所1。
	 */
	private $addressPrefectures;
	/**
	 *	住所2。
	 */
	private $addressMunicipality;
	/**
	 *	住所3。
	 */
	private $addressOther;


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