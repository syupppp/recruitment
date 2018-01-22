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
			$id = $row["id"];
			$name = $row["name"];
			$prefId = $row["pref_id"];
			$postalCode = $row["postal_code"];
			$addressPrefectures = $row["address_prefectures"];
			$addressMunicipality = $row["address_municipality"];
			$addressOther = $row["address_other"];
			$phoneNumber = $row["phone_number"];

			$circle = new Circle();
			$circle->setId($id);
			$circle->setName($name);
			$circle->setType($type);
			$circle->setUserId($userId);
			$circle->setCircleId($circleId);
			$circle->setParentId($parentId);
		}

		return $circle;
	}
}