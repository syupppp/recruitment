<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=BookOrderDAO.class.php
 *	ディレクトリ=/syupure/classes/dao/
 */

/**
 *	ブック注文履歴テーブルへのデータ操作クラス。
 */
class OrderBookDAO {
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
	 *	ブック注文情報登録。
	 *
	 *	@param BookOrder $bookOrder 登録情報が格納されたBookOrderオブジェクト。
	 *	@return boolean 登録されたかどうかを表す値。
	 */
	public function insert(OrderBook $orderBook) {
		$sqlInsert = "INSERT INTO order_book (`date`, al_pp_size, al_bd_direction, al_bd_method, al_pp_direction, al_bk_num, al_pp_num, fr_clobw, fr_pp_type, in_clorbw, in_pp_type, obj_id) VALUES (:order_date, :al_pp_size, :al_bd_direction, :al_bd_method, :al_pp_direction, :al_bk_num, :al_pp_num, :fr_clobw, :fr_pp_type, :in_clorbw, :in_pp_type, :obj_id)";
		$stmt = $this->db->prepare($sqlInsert);
		$stmt->bindValue(":order_date", date('Y-m-d G:i:s'), PDO::PARAM_STR);
		$stmt->bindValue(":al_pp_size", $orderBook->getAlPpSize(), PDO::PARAM_STR);
		$stmt->bindValue(":al_bd_direction", $orderBook->getAlBdDirection(), PDO::PARAM_STR);
		$stmt->bindValue(":al_bd_method", $orderBook->getAlBdMethod(), PDO::PARAM_STR);
		$stmt->bindValue(":al_pp_direction", $orderBook->getAlPpDirection(), PDO::PARAM_STR);
		$stmt->bindValue(":al_bk_num", $orderBook->getAlBkNum(), PDO::PARAM_INT);
		$stmt->bindValue(":al_pp_num", $orderBook->getAlPpNum(), PDO::PARAM_INT);
		$stmt->bindValue(":fr_clobw", $orderBook->getFrClorbw(), PDO::PARAM_STR);
		$stmt->bindValue(":fr_pp_type", $orderBook->getFrPpType(), PDO::PARAM_STR);
		$stmt->bindValue(":in_clorbw", $orderBook->getInClorbw(), PDO::PARAM_STR);
		$stmt->bindValue(":in_pp_type", $orderBook->getInPpType(), PDO::PARAM_STR);
		$stmt->bindValue(":obj_id", $orderBook->getObjId(), PDO::PARAM_INT);

		$result = $stmt->execute();
		$id = 0;
		if($result) {
			$id = $this->db->lastInsertId();
		}
		return $result;
	}
}