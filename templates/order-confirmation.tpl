<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/syupure/css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="/syupure/css/common.css">
  <link rel="stylesheet" href="/syupure/css/order-confirmation.css">
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
          <p id="profile-name">まる</p>
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
        <li class="step-selectable">お支払い</li>
        <li class="step-active">確認</li>
        <li>完了</li>
      </ol>
      <div id="main-box">
        <h3>ご注文はまだ確定していません。</h3>
        <p id="main-description">以下の情報をご確認の上、下の「注文する」ボタンをクリックしてください。</p>
        <div class="property-box">
          <table>
            <caption>印刷体裁</caption>
            <tr>
              <th>紙サイズ</th>
              <td>{$bookProperty->getAlPpSize()}</td>
            </tr>
            <tr>
              <th>冊数</th>
              <td>{$bookProperty->getAlBkNum()}冊</td>
            </tr>
            <tr>
              <th>綴じ方向</th>
              <td>{$bookProperty->getAlBdDirection()}</td>
            </tr>
            <tr>
              <th>綴じ方法</th>
              <td>{$bookProperty->getAlBdMethod()}</td>
            </tr>
            <tr>
              <th>印刷方向</th>
              <td>{$bookProperty->getAlPpDirection()}</td>
            </tr>
            <tr>
              <th>総ページ数</th>
              <td>{$bookProperty->getAlPpNum()}</td>
            </tr>
            <tr>
              <th>カラーor白黒</th>
              <td>{$bookProperty->getFrClorbw()}</td>
            </tr>
            <tr>
              <th>紙質</th>
              <td>{$bookProperty->getFrPpType()}</td>
            </tr>
            <tr>
              <th>カラーor白黒</th>
              <td>{$bookProperty->getInClorbw()}</td>
            </tr>
            <tr>
              <th>紙質</th>
              <td>{$bookProperty->getInPpType()}</td>
            </tr>
          </table>
          <table>
            <caption>お届け先情報</caption>
            <tr>
              <th>郵便番号</th>
              <td>{$circle->getPostalCode()}</td>
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
          <table>
            <caption>お支払い情報</caption>
            <tr>
              <th>お支払い方法</th>
              <td>クレジットカード</td>
            </tr>
            <tr>
              <th>カード会社</th>
              <td>{$user->getCreditCompany()}</td>
            </tr>
            <tr>
              <th>名義人</th>
              <td>{$user->getCreditName()}</td>
            </tr>
            <tr>
              <th>有効期限(月/年)</th>
              <td>{$user->getCreditDate()}</td>
            </tr>
          </table>
        </div>
        <div id="btn-order" class="btn">
          <a href="goOrderCompleted.php">注文する</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>