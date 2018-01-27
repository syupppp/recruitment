<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=User.class.php
 *	ディレクトリ=/syupure/classes/entity/
 */

/**
 *	ユーザエンティティクラス。
 */
class User {
	/**
	 *	主キーのid。
	 */
	private $id;
	/**
	 *	ユーザ名。
	 */
	private $name;
	/**
	 *	ふりがな。
	 */
	private $nameKana;
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
	/**
	 *	電話番号。
	 */
	private $phoneNumber;
	/**
	 *	メールアドレス。
	 */
	private $mail;
	/**
	 *	性別。
	 */
	private $sex;
	/**
	 *	パスワード。
	 */
	private $password;
	/**
	 *	クレジット会社名。
	 */
	private $creditCompany;
	/**
	 *	クレジット名義人名。
	 */
	private $creditName;
	/**
	 *	クレジット名義人名。
	 */
	private $creditDate;

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
	public function getNameKana() {
		return $this->nameKana;
	}
	public function setNameKana($nameKana) {
		$this->nameKana = $nameKana;
	}
	public function getPrefId() {
		return $this->prefId;
	}
	public function setPrefId($prefId) {
		$this->prefId = $prefId;
	}
	public function getPostalCode() {
		return $this->postalCode;
	}
	public function setPostalCode($postalCode) {
		$this->postalCode = $postalCode;
	}
	public function getAddressPrefectures() {
		return $this->addressPrefectures;
	}
	public function setAddressPrefectures($addressPrefectures) {
		$this->addressPrefectures = $addressPrefectures;
	}
	public function getAddressMunicipality() {
		return $this->addressMunicipality;
	}
	public function setAddressMunicipality($addressMunicipality) {
		$this->addressMunicipality = $addressMunicipality;
	}
	public function getAddressOther() {
		return $this->addressOther;
	}
	public function setPhoneNumber($phoneNumber) {
		$this->phoneNumber = $phoneNumber;
	}
	public function getPhoneNumber() {
		return $this->phoneNumber;
	}
	public function setAddressOther($addressOther) {
		$this->addressOther = $addressOther;
	}
	public function getMail() {
		return $this->mail;
	}
	public function setMail($mail) {
		$this->mail = $mail;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	public function getCreditCompany() {
		return $this->creditCompany;
	}
	public function setCreditCompany($creditCompany) {
		$this->creditCompany = $creditCompany;
	}
	public function getCreditName() {
		return $this->creditName;
	}
	public function setCreditName($creditName) {
		$this->creditName = $creditName;
	}
	public function getCreditDate() {
		return $this->creditDate;
	}
	public function setCreditDate($creditDate) {
		$this->creditDate = $creditDate;
	}
}