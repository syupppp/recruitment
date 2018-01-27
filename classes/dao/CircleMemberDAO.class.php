<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=CircleMemberDAO.class.php
 *	ディレクトリ=/syupure/classes/dao/
 */

/**
 *	CircleMemberテーブルへのデータ操作クラス。
 */
class CircleMemberDAO {
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
	 *	ユーザIDによるサークル情報検索。
	 *
	 *	@param integer $userID 検索するユーザID。
	 *	@return array $circleIdList 該当するサークルIDの配列。ただし、該当データがない場合はnull。
	 */
	public function findByCircleId($userId) {
		$sql = "SELECT * FROM circle_member WHERE user_id = :user_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":user_id", $userId, PDO::PARAM_INT);
		$result = $stmt->execute();
		$circleIdList = [];
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$circleIdList[] = $row["circle_id"];
		}
		return $circleIdList;
	}
}