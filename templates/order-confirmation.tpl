<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/order-confirmation.css">
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
        <li class="step-selectable">お支払い</li>
        <li class="step-active">確認</li>
        <li>完了</li>
      </ol>
      <div id="main-box">
        <form action="#" method="post"> 
          <h3>ご注文はまだ確定していません。</h3>
          <p id="main-description">以下の情報をご確認の上、下の「注文する」ボタンをクリックしてください。</p>
          <div class="property-box">
            <table>
              <caption>印刷体裁</caption>
              <tr>
                <th>紙サイズ</th>
                <td>A4</td>
              </tr>
              <tr>
                <th>冊数</th>
                <td>20冊</td>
              </tr>
              <tr>
                <th>綴じ方向</th>
                <td>右</td>
              </tr>
            </table>
            <table>
              <caption>お届け先情報</caption>
              <tr>
                <th>郵便番号</th>
                <td>〒574-0043</td>
              </tr>
              <tr>
                <th>住所</th>
                <td>大阪府大東市4丁目17-17</td>
              </tr>
              <tr>
                <th>お名前</th>
                <td>風炉 光</td>
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
                <td>MasterCard</td>
              </tr>
              <tr>
                <th>名義人</th>
                <td>HIKARU&nbsp;FURO</td>
              </tr>
              <tr>
                <th>有効期限(月/年)</th>
                <td>10月&nbsp;2021年</td>
              </tr>
            </table>
          </div>
          <div id="btn-order" class="btn">
            <p>注文する</p>
          </div>
        </form>
      </div>
    </div>    
  </div>
</body>
</html>