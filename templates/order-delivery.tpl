<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/order-delivery.css">
  <title>コミまる | 注文フォーム</title>
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
            <img src="image/profile-maru.png" alt="プロフィールイメージ">
          </div>
          <p id="profile-name">まる</p>
        </a>
      </div>
    </div>
    <div id="buttom-box">
      <div id="header-left-box">
        <div class="btn" id="btn-back">
          <p>戻る</p>
        </div>
        <h2 id="file-title">夏コミ合同誌.book</h2>
      </div>
    </div>
  </header>

  <div id="wrapper">
    <div id="main-area">
      <ol id="step-bar">
        <li class="step-selectable">印刷体裁</li>
        <li class="step-active">お届け先</li>
        <li>お支払い</li>
        <li>確認</li>
        <li>完了</li>
      </ol>
      <div id="main-box">
        <form action="#" method="post"> 
          <h3>お届け先について</h3>
          <p id="main-description">以下のお届け先でよろしい場合は、「次へ」ボタンをクリックしてください。</p>
          <div class="property-box">
            <table>
              <tr>
                <th>郵便番号</th>
                <td>〒574-0043</td>
              </tr>
              <tr>
                <th>住所</th>
                <td>大阪府大東市灰塚4丁目17-17</td>
              </tr>
              <tr>
                <th>お名前</th>
                <td>風炉&nbsp;光</td>
              </tr>
            </table>
            <div id="btn-edit">
              <p>編集</p>
            </div>
          </div>
          <div id="btn-submit">
            <input type="submit" class="btn" value="次へ">
          </div>
        </form>
      </div>
    </div>    
  </div>
</body>
</html>