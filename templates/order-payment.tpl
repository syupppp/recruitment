<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/order-payment.css">
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
        <li class="step-selectable">お届け先</li>
        <li class="step-active">お支払い</li>
        <li>確認</li>
        <li>完了</li>
      </ol>
      <div id="main-box">
        <form action="#" method="post">
          <h3>お支払い方法について</h3>
          <p id="main-description">以下のお支払い方法でよろしい場合は、「次へ」ボタンをクリックしてください。</p>
          <div class="property-box">
            <table>
              <tr>
                <th>お支払い方法</th>
                <td>クレジット払い</td>
              </tr>
              <tr>
                <th>カード会社</th>
                <td>MasterCard</td>
              </tr>
              <tr>
                <th>名義人名</th>
                <td>HIKARU FURO</td>
              </tr>
              <tr>
                <th>有効期限(月/年)</th>
                <td>10月2021年</td>
              </tr>
            </table>
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