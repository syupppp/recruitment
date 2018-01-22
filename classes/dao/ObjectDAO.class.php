<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=ObjectDAO.class.php
 *	ディレクトリ=/syupure/classes/dao/
 */

/**
 *	Objectテーブルへのデータ操作クラス。
 */
class ObjDAO {
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
	 *	ユーザーディレクトリ取得。
	 *
	 *	@param integer $userId ユーザID。
	 *	@return Obj 該当するObjオブジェクト。ただし、該当データがない場合はnull。
	 */
	public function findByUserDir($userId) {
		$sql = "SELECT * FROM object WHERE user_id = :user_id AND parent_id = 0";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":user_id", $userId, PDO::PARAM_INT);
		$result = $stmt->execute();
		$obj = null;
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id"];
			$name = $row["name"];
			$type = $row["type"];
			$userId = $row["user_id"];
			$circleId = $row["circle_id"];
			$parentId = $row["parent_id"];

			$obj = new Obj();
			$obj->setId($id);
			$obj->setName($name);
			$obj->setType($type);
			$obj->setUserId($userId);
			$obj->setCircleId($circleId);
			$obj->setParentId($parentId);
		}

		return $obj;
	}

	/**
	 *	ディレクトリ内の全ファイル取得。
	 *
	 *	@param integer $parentId 親ディレクトリID。
	 *	@return array 該当するObjオブジェクト配列。ただし、該当データがない場合はnull。
	 */
	public function findAllOnDir($userId, $parentId) {
		$sql = "SELECT * FROM object WHERE user_id = :user_id AND parent_id = :parent_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":user_id", $userId, PDO::PARAM_INT);
		$stmt->bindValue(":parent_id", $parentId, PDO::PARAM_INT);
		$result = $stmt->execute();
		$objList = [];
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id"];
			$name = $row["name"];
			$type = $row["type"];
			$userId = $row["user_id"];
			$circleId = $row["circle_id"];

			$obj = new Obj();
			$obj->setId($id);
			$obj->setName($name);
			$obj->setType($type);
			$obj->setUserId($userId);
			$obj->setCircleId($circleId);
			$obj->setParentId($parentId);
			$objList[] = $obj;
		}
		return $objList;
	}


}