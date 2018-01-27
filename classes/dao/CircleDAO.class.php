<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=CircleDAO.class.php
 *	ディレクトリ=/syupure/classes/dao/
 */

/**
 *	Circleテーブルへのデータ操作クラス。
 */
class CircleDAO {
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
	 *	サークル検索。
	 *
	 *	@param integer $circleId 検索するサークルID。
	 *	@return Circle 該当するCircleオブジェクト。ただし、該当データがない場合はnull。
	 */
	public function findByPK($circleId) {
		$sql = "SELECT * FROM circle WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id", $circleId, PDO::PARAM_INT);
		$result = $stmt->execute();
		$circle = null;
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$name = $row["name"];
			$prefId = $row["pref_id"];
			$postalCode = $row["postal_code"];
			$addressPrefectures = $row["address_prefectures"];
			$addressMunicipality = $row["address_municipality"];
			$addressOther = $row["address_other"];
			$deliveryName = $row["delivery_name"];
			$phoneNumber = $row["phone_number"];

			$circle = new Circle();
			$circle->setId($circleId);
			$circle->setName($name);
			$circle->setPrefId($prefId);
			$circle->setPostalCode($postalCode);
			$circle->setAddressPrefectures($addressPrefectures);
			$circle->setAddressMunicipality($addressMunicipality);
			$circle->setAddressOther($addressOther);
			$circle->setDeliveryName($deliveryName);
			$circle->setPhoneNumber($phoneNumber);
		}

		return $circle;
	}
}