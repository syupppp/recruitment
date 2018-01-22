<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Bookデータの編集</title>
  <link rel="stylesheet" href="css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="css/book.css">
  <script src="js/jquery-3.2.1.min.js"></script>
<!--
  <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
  </script>
-->
  <script src="js/book.js"></script>
</head>
<body>
  <header>
    <h1 id="logo">
      <a href="#">コミまる</a>
    </h1>
    <div id="head-wrapper">
      <div class="top-box">
        <div class="btn" id="btn-save">
          <p>保存</p>
        </div>
      </div>
      <div class="clear-fix bottom-box">
        <div id="file-title-box">
          <div class="btn-info">
            <p><span>インフォメーションボタン</span></p>
          </div>
          <p>例大祭こみまるサークル合同誌.book</p>
        </div>
        <div class="btn" id="btn-add">
          <p>オブジェクトの追加</p>
        </div>
        <div class="btn" id="btn-delete">
          <p>データを外す</p>
        </div>
      </div>
    </div>
  </header>
  <div id="area-evacuate">
    <div>
      <div class="evac-obj" draggable="true">
        <p>book</p>
      </div>
      <div class="evac-obj">
        <p>book</p>
      </div>
      <div class="evac-obj">
        <p>book</p>
      </div>
      <div class="evac-obj">
        <p>book</p>
      </div>
    </div>
  </div>
  <div id="page-box">
    <div id="page-wrapper">
      <ul>
        <li draggable="true">
          <div class="btn-info">
            <p><span>詳細情報を表示</span></p>
          </div>
          <div class="main-obj-icon">
            <div class="front-cvr"><span>obj</span></div>
          </div>
          <p class="main-obj-name">表紙.jpg</p>
        </li>
        <li draggable="true">
          <div class="btn-info">
            <p><span>詳細情報を表示</span></p>
          </div>
          <div class="main-obj-icon">
            <div class="book">book-icon</div>
          </div>
          <p class="main-obj-name">アイウエオまるまる.book</p>
        </li>
        <li draggable="true">
          <div class="btn-info">
            <p><span>詳細情報を表示</span></p>
          </div>
          <div class="main-obj-icon">
            <div class="book">book-icon</div>
          </div>
          <p class="main-obj-name">アイウエオまるまる.book</p>
        </li>
        <li draggable="true">
          <div class="btn-info">
            <p><span>詳細情報を表示</span></p>
          </div>
          <div class="main-obj-icon">
            <div class="book">book-icon</div>
          </div>
          <p class="main-obj-name">アイウエオまるまる.book</p>
        </li>
        <li draggable="true">
          <div class="btn-info">
            <p><span>詳細情報を表示</span></p>
          </div>
          <div class="main-obj-icon">
            <div class="back-cvr"><span>obj</span></div>
          </div>
          <p class="main-obj-name">裏表紙.jpg</p>
        </li>
      </ul>
    </div>

  </div>
  <div id="page-operation">
    <div class="top-box">
      <div class="btn" id="btn-front-more">
        <p>&lt;&lt;&nbsp;表紙</p>
      </div>
      <div class="btn" id="btn-front">
        <p>&lt;&nbsp;前のBook</p>
      </div>
      <div id="page-scroll-bar">
        <input id="bar" type="range" class="input-range" value="1" max="16" min="1" step="1" data-unit="%">
      </div>
      <div class="btn" id="btn-back">
        <p>次のBook&nbsp;&gt;&gt;</p>
      </div>
      <div class="btn" id="btn-back-more">
        <p>裏表紙&nbsp;&gt;&gt;</p>
      </div>
    </div>
  </div>
  <div>
    <ul>
      <li></li>
      <li></li>
    </ul>
  </div>
</body>
</html>
