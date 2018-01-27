<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=BookProperty.class.php
 *	ディレクトリ=/syupure/classes/entity/
 */

/**
 *	ブック注文仕様エンティティクラス。
 */
class BookProperty {
	/**
	 *	主キーのid。
	 */
	private $id;
	/**
	 *	紙サイズ。
	 */
	private $alPpSize;
	/**
	 *	綴じ方向。
	 */
	private $alBdDirection;
	/**
	 *	綴じ方法。
	 */
	private $alBdMethod;
	/**
	 *	紙方向。
	 */
	private $alPpDirection;
	/**
	 *	部数。
	 */
	private $alBkNum;
	/**
	 *	総ページ数。
	 */
	private $alPpNum;
	/**
	 *	表紙カラー。
	 */
	private $frClorbw;
	/**
	 *	表紙紙質。
	 */
	private $frPpType;
	/**
	 *	本文用紙カラー。
	 */
	private $inClorbw;
	/**
	 *	本文用紙紙質。
	 */
	private $inPpType;
	/**
	 *	オブジェクトID。
	 */
	private $objId;


	//以下アクセサメソッド。

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getAlPpSize() {
		return $this->alPpSize;
	}
	public function setAlPpSize($alPpSize) {
		$this->alPpSize = $alPpSize;
	}
	public function getAlBdDirection() {
		return $this->alBdDirection;
	}
	public function setAlBdDirection($alBdDirection) {
		$this->alBdDirection = $alBdDirection;
	}
	public function getAlBdMethod() {
		return $this->alBdMethod;
	}
	public function setAlBdMethod($alBdMethod) {
		$this->alBdMethod = $alBdMethod;
	}
	public function getAlPpDirection() {
		return $this->alPpDirection;
	}
	public function setAlPpDirection($alPpDirection) {
		$this->alPpDirection = $alPpDirection;
	}
	public function getAlBkNum() {
		return $this->alBkNum;
	}
	public function setAlBkNum($alBkNum) {
		$this->alBkNum = $alBkNum;
	}
	public function getAlPpNum() {
		return $this->alPpNum;
	}
	public function setAlPpNum($alPpNum) {
		$this->alPpNum = $alPpNum;
	}
	public function getFrClorbw() {
		return $this->frClorbw;
	}
	public function setFrClorbw($frClorbw) {
		$this->frClorbw = $frClorbw;
	}
	public function getFrPpType() {
		return $this->frPpType;
	}
	public function setFrPpType($frPpType) {
		$this->frPpType = $frPpType;
	}
	public function getInClorbw() {
		return $this->inClorbw;
	}
	public function setInClorbw($inClorbw) {
		$this->inClorbw = $inClorbw;
	}
	public function getInPpType() {
		return $this->inPpType;
	}
	public function setInPpType($inPpType) {
		$this->inPpType = $inPpType;
	}
	public function getObjId() {
		return $this->objId;
	}
	public function setObjId($objId) {
		$this->objId = $objId;
	}

}