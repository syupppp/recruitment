<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/syupure/css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="/syupure/css/common.css">
  <link rel="stylesheet" href="/syupure/css/top.css">
  <title>コミまる | トップ</title>
</head>
<body>
  <header>
    <div id="top-box">
      <h1 id="logo">
        <a href="#">コミまる</a>
      </h1>
      <div id="head-wrapper-top">
        <a href="#" id="profile-box" class="clear-fix">
          <div id="profile-img">
            <img src="/syupure/image/profile-maru.png" alt="プロフィールイメージ">
          </div>
          <p id="profile-name">{$user->getName()}</p>
        </a>
      </div>
    </div>
    <div id="buttom-box">
      <div id="head-wrapper-top" class="clear-fix">
        <div class="btn" id="btn-delete">
          <p>削除</p>
        </div>
        <div class="btn" id="btn-download">
          <p>ダウンロード</p>
        </div>
        <div class="btn" id="btn-add">
          <p>新規追加</p>
        </div>
      </div>
    </div>
  </header>

    <div id="wrapper">
    <div id="main-area">
      <div id="main-option" class="clear-fix">
        <form action="#" method="get" id="form-box" class="clear-fix">
          <input type="text" value="" placeholder="ファイルを検索" id="form-textbox">
          <input type="submit" value="検索" id="form-submit">
        </form>
        <div id="obj-btn-list">
          <div id="btn-switching"></div>
          <div id="btn-sort"></div>
        </div>
      </div>
      <form action="#" method="post">
        <div id="main-wrapper">
          <ol id="pankuzu-list" class="clear-fix">
            <li><a href="#">まるさんのフォルダー</a></li>
            <li><a href="#">夏コミ18</a></li>
          </ol>
          <ul class="obj-box">
            <li>
              <div class="main-obj-icon">
                <label><input class="obj-checkbox-input" type="checkbox" name="" value="1"><span class="obj-checkbox-part"></span></label>
                <div class="book">book-icon</div>
              </div>
              <p class="main-obj-name">アイウエオまるまる.book</p>
            </li>
            <li>
              <div class="main-obj-icon">
                <div class="book">book-icon</div>
              </div>
              <p class="main-obj-name">アイウエオまるまる.book</p>
            </li>
            <li>
              <div class="main-obj-icon">
                <div class="book">book-icon</div>
              </div>
              <p class="main-obj-name">アイウエオまるまる.book</p>
            </li>
          </ul>
        </div>
      </form>
    </div>
  </div>

  <div id="sub-area">
    <ul id="sub-header">
      <div id="btn-sercle-hide"><span>格納ボタン</span></div>
      <li>みんなのサークル</li>
    </ul>
    <ul class="obj-box">
      <li>
        <div class="main-obj-icon">
          <div class="book">book-icon</div>
        </div>
        <p class="main-obj-name">アイウエオまるまる.book</p>
      </li>
      <li>
        <div class="main-obj-icon">
          <div class="book">book-icon</div>
        </div>
        <p class="main-obj-name">アイウエオまるまる.book</p>
      </li>
      <li>
        <div class="main-obj-icon">
          <div class="book">book-icon</div>
        </div>
        <p class="main-obj-name">アイウエオまるまる.book</p>
      </li>
    </ul>
  </div>
</body>
</html>