<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=BookPropertyDAO.class.php
 *	ディレクトリ=/syupure/classes/dao/
 */

/**
 *	BookPropertyテーブルへのデータ操作クラス。
 */
class BookPropertyDAO {
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
	 *	オブジェクトIDによる検索。
	 *
	 *	@param integer $objId 検索するオブジェクトID。
	 *	@return BookProperty 該当するBookPropertyオブジェクト。ただし、該当データがない場合はnull。
	 */
	public function findByObjID($objId) {
		$sql = "SELECT * FROM book_property WHERE obj_id = :obj_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":obj_id", $objId, PDO::PARAM_INT);
		$result = $stmt->execute();
		$bookProperty = null;
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id"];
			$alPpSize = $row["al_pp_size"];
			$alBdDirection = $row["al_bd_direction"];
			$alBdMethod = $row["al_bd_method"];
			$alPpDirection = $row["al_pp_direction"];
			$alBkNum = $row["al_bk_num"];
			$alPpNum = $row["al_pp_num"];
			$frClorbw = $row["fr_clorbw"];
			$frPpType = $row["fr_pp_type"];
			$inClorbw = $row["in_clorbw"];
			$inPpType = $row["in_pp_type"];

			$bookProperty = new BookProperty();
			$bookProperty->setId($id);
			$bookProperty->setAlPpSize($alPpSize);
			$bookProperty->setAlBdDirection($alBdDirection);
			$bookProperty->setAlBdMethod($alBdMethod);
			$bookProperty->setAlPpDirection($alPpDirection);
			$bookProperty->setAlBkNum($alBkNum);
			$bookProperty->setAlPpNum($alPpNum);
			$bookProperty->setFrClorbw($frClorbw);
			$bookProperty->setFrPpType($frPpType);
			$bookProperty->setInClorbw($inClorbw);
			$bookProperty->setInPpType($inPpType);
			$bookProperty->setObjId($objId);
		}
		return $bookProperty;
	}

	/**
	 *	未入力項目数の取得。
	 *
	 *	@param integer $objId 検索するオブジェクトID。
	 *	@return integer nullの個数。
	 */
	public function findNullCnt($objId) {
		$sql = "SELECT * FROM book_property WHERE obj_id = :obj_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":obj_id", $objId, PDO::PARAM_INT);
		$result = $stmt->execute();
		$bookPropertyList = [];
		$nullCnt = 0;
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id"];
			$alPpSize = $row["al_pp_size"];
			$alBdDirection = $row["al_bd_direction"];
			$alBdMethod = $row["al_bd_method"];
			$alPpDirection = $row["al_pp_direction"];
			$alBkNum = $row["al_bk_num"];
			$alPpNum = $row["al_pp_num"];
			$frClorbw = $row["fr_clorbw"];
			$frPpType = $row["fr_pp_type"];
			$inClorbw = $row["in_clorbw"];
			$inPpType = $row["in_pp_type"];

			$bookPropertyList["id"] = $id;
			$bookPropertyList["alPpSize"] = $alPpSize;
			$bookPropertyList["alBdDirection"] = $alBdDirection;
			$bookPropertyList["alBdMethod"] = $alBdMethod;
			$bookPropertyList["alPpDirection"] = $alPpDirection;
			$bookPropertyList["alBkNum"] = $alBkNum;
			$bookPropertyList["alPpNum"] = $alPpNum;
			$bookPropertyList["frClorbw"] = $frClorbw;
			$bookPropertyList["frPpType"] = $frPpType;
			$bookPropertyList["inClorbw"] = $inClorbw;
			$bookPropertyList["inPpType"] = $inPpType;
		}
		if (isset($bookPropertyList)) {
			foreach ($bookPropertyList as $key => $value) {
				if(is_null($value) || empty($value) || $value=="") {
					$nullCnt += 1;
				}
			}
		}
		return $nullCnt;
	}

	/**
	 *	ブック注文仕様更新。
	 *
	 *	@param BookProperty $bookProperty 登録情報が格納されたbookPropertyオブジェクト。
	 *	@return boolean 登録されたかどうかを表す値。
	 */
	public function update(BookProperty $bookProperty) {
		$sqlUpdate = "UPDATE book_property SET al_pp_size = :al_pp_size, al_bd_direction = :al_bd_direction, al_bd_method = :al_bd_method, al_pp_direction = :al_pp_direction, al_bk_num = :al_bk_num, al_pp_num = :al_pp_num, fr_clorbw = :fr_clorbw, fr_pp_type = :fr_pp_type, in_clorbw = :in_clorbw, in_pp_type = :in_pp_type WHERE id = :id";
		$stmt = $this->db->prepare($sqlUpdate);
		$stmt->bindValue(":al_pp_size", $bookProperty->getAlPpSize(), PDO::PARAM_INT);
		$stmt->bindValue(":al_bd_direction", $bookProperty->getAlBdDirection(), PDO::PARAM_STR);
		$stmt->bindValue(":al_bd_method", $bookProperty->getAlBdMethod(), PDO::PARAM_INT);
		$stmt->bindValue(":al_pp_direction", $bookProperty->getAlPpDirection(), PDO::PARAM_STR);
		$stmt->bindValue(":al_bk_num", $bookProperty->getAlBkNum(), PDO::PARAM_INT);
		$stmt->bindValue(":al_pp_num", $bookProperty->getAlPpNum(), PDO::PARAM_INT);
		$stmt->bindValue(":fr_clorbw", $bookProperty->getFrClorbw(), PDO::PARAM_STR);
		$stmt->bindValue(":fr_pp_type", $bookProperty->getFrPpType(), PDO::PARAM_INT);
		$stmt->bindValue(":in_pp_type", $bookProperty->getInPpType(), PDO::PARAM_INT);
		$stmt->bindValue(":in_clorbw", $bookProperty->getInClorbw(), PDO::PARAM_STR);
		$stmt->bindValue(":id", $bookProperty->getId(), PDO::PARAM_INT);
		$result = $stmt->execute();
		return $result;
	}

}