<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=PaperSizeDAO.class.php
 *	ディレクトリ=/syupure/classes/dao/
 */

/**
 *	PaperSizeテーブルへのデータ操作クラス。
 */
class PaperSizeDAO {
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
	 *	全紙サイズ取得。
	 *
	 *	@return array 紙サイズオブジェクトが格納された配列。ただし、該当データがない場合はnull。
	 */
	public function findAll() {
		$sql = "SELECT * FROM paper_size";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$paperSizeList = [];
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id"];
			$name = $row["name"];

			$paperSize = new PaperSize();
			$paperSize->setId($id);
			$paperSize->setName($name);
			$paperSizeList[$id] = $paperSize;
		}
		return $paperSizeList;
	}
}