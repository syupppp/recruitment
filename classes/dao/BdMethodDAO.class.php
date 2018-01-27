<?php
/**
 *	就職作品 コミックマーケット支援サービス コミまる
 *
 *	@author Miruri Higashimura <easternvillage.cocoa@gmail.com>
 *	@version 1.0
 *	@copyright Sarva
 *
 *	ファイル名=BdMethodDAO.class.php
 *	ディレクトリ=/syupure/classes/dao/
 */

/**
 *	BdMethodテーブルへのデータ操作クラス。
 */
class BdMethodDAO {
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
	 *	全綴じ方法取得。
	 *
	 *	@return array 綴じ方法オブジェクトが格納された配列。ただし、該当データがない場合はnull。
	 */
	public function findAll() {
		$sql = "SELECT * FROM bd_method";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$bdMethodList = [];
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id"];
			$name = $row["name"];

			$bdMethod = new BdMethod();
			$bdMethod->setId($id);
			$bdMethod->setName($name);
			$bdMethodList[$id] = $bdMethod;
		}
		return $bdMethodList;
	}
}