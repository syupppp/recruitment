<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/syupure/css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="/syupure/css/common.css">
  <link rel="stylesheet" href="/syupure/css/order-delivery.css">
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
        <li class="step-active">お届け先</li>
        <li>お支払い</li>
        <li>確認</li>
        <li>完了</li>
      </ol>
      <div id="main-box">
        <form action="/syupure/order/goOrderPayment.php" method="post">
          <h3>お届け先について</h3>
          <p id="main-description">以下のお届け先でよろしい場合は、「次へ」ボタンをクリックしてください。</p>
          <div class="property-box">
            <table>
              <tr>
                <th>郵便番号</th>
                <td>〒{$circle->getPostalCode()}</td>
              </tr>
              <tr>
                <th>住所</th>
                <td>{$circle->getAddressPrefectures()}{$circle->getAddressMunicipality()}{$circle->getAddressOther()}</td>
              </tr>
              <tr>
                <th>お名前</th>
                <td>{$circle->getDeliveryName()}</td>
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