<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=BdMethod.class.php
 *	ディレクトリ=/syupure/classes/entity/
 */

/**
 *	エンティティクラス。
 */
class BdMethod {
	/**
	 *	主キーのid。
	 */
	private $id;
	/**
	 *	綴じ方法。
	 */
	private $name;


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
}