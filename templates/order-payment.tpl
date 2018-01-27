<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/syupure/css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="/syupure/css/common.css">
  <link rel="stylesheet" href="/syupure/css/order-payment.css">
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
            <img src="/syupure/image/profile-maru.png" alt="プロフィールイメージ">
          </div>
          <p id="profile-name">{$userName}</p>
        </a>
      </div>
    </div>
    <div id="buttom-box">
      <div id="header-left-box">
        <div class="btn" id="btn-back">
          <p><a href="/syupure/book/showFolder.php">戻る</a></p>
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
        <form action="/syupure/order/goOrderConfirmation.php" method="post">
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
                <td>{$user->getCreditCompany()}</td>
              </tr>
              <tr>
                <th>名義人名</th>
                <td>{$user->getCreditName()}</td>
              </tr>
              <tr>
                <th>有効期限(月/年)</th>
                <td>{$user->getCreditDate()}</td>
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