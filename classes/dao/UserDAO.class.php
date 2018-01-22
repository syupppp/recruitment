<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=UserDAO.class.php
 *	ディレクトリ=/syupure/classes/dao/
 */

/**
 *	Userテーブルへのデータ操作クラス。
 */
class UserDAO {
	/**
	 *	@var PDO DB接続オブジェクト
	 */
	private $db;

	/**
	 *	コンストラクタ
	 *
	 *	@param PDO $db DB接続オブジェクト
	 */
	public function __construct(PDO $db) {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$this->db = $db;
	}

	/**
	 *	ログインメールによる検索。
	 *
	 *	@param string $usMail ログインメールアドレス。
	 *	@return User 該当するUserオブジェクト。ただし、該当データがない場合はnull。
	 */
	public function findByLoginMail($mail) {
		$sql = "SELECT * FROM user WHERE mail = :mail";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
		$result = $stmt->execute();
		$user = null;
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id"];
			$name = $row["name"];
			$nameKana = $row["name_kana"];
			$prefId = $row["pref_id"];
			$postalCode = $row["postal_code"];
			$addressPrefectures = $row["address_prefectures"];
			$addressMunicipality = $row["address_municipality"];
			$addressOther = $row["address_other"];
			$phoneNumber = $row["phone_number"];
			$mail = $row["mail"];
			$sex = $row["sex"];
			$password = $row["password"];

			$user = new User();
			$user->setId($id);
			$user->setName($name);
			$user->setNameKana($nameKana);
			$user->setPrefId($prefId);
			$user->setPostalCode($postalCode);
			$user->setAddressPrefectures($addressPrefectures);
			$user->setAddressMunicipality($addressMunicipality);
			$user->setAddressOther($addressOther);
			$user->setMail($mail);
			$user->setPassword($password);
		}

		return $user;
	}
}