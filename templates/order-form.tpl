<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/syupure/css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="/syupure/css/common.css">
  <link rel="stylesheet" href="/syupure/css/order-form.css">
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
          <p id="profile-name">{$user->getName()}</p>
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
      <div id="head-wrapper-top" class="clear-fix">
        <div class="btn" id="btn-edit">
          <p>中身を編集する</p>
        </div>
      </div>
    </div>
  </header>

  <div id="wrapper">
    <div id="main-area">
      <ol id="step-bar">
        <li class="step-active">印刷体裁</li>
        <li>お届け先</li>
        <li>お支払い</li>
        <li>確認</li>
        <li>完了</li>
      </ol>
      {if $nullCnt >= 1}
      <div id="validation-box">
        <p>未設定項目が{$nullCnt}件あります！</p>
      </div>
      {/if}
      <div id="main-left-box">
        <div id="main-left-view" class="">
          <ul>
            <li>
              <p>全体のイメージ</p>
              <ul>
                <li>紙サイズ</li>
                <li>冊数</li>
                <li>綴じ方向</li>
                <li>総ページ数</li>
              </ul>
            </li>
            <li>
              <p>表紙・裏表紙</p>
              <ul>
                <li>カラー・モノクロ</li>
                <li>紙質</li>
              </ul>
            </li>
            <li>
              <p>本文用紙</p>
              <ul>
                <li>カラー・モノクロ</li>
                <li>紙質</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div id="main-right-box">
        <form action="/syupure/order/goOrderDelivery.php" method="post">
          <h3>全体のイメージ</h3>
          <div class="property-box">
            <table>
              <tr>
                <th>紙サイズ</th>
                <td>{html_options name=alPpSize options=$paperSizeList selected=$bookProperty->getAlPpSize()}</td>
              </tr>
              <tr>
                <th>冊数</th>
                <td><input type="number" name="alBkNum" value="{$bookProperty->getAlBkNum()|default:""}"><span>冊</span></td>
              </tr>
              <tr>
                <th>綴じ方向</th>
                <td>
{if $bookProperty->getAlBdDirection() == "RIGHT"}
                    <input type="radio" name="alBdDirection" value="RIGHT" checked>右綴じ
                    <input type="radio" name="alBdDirection" value="LEFT">左綴じ
{elseif $bookProperty->getAlBdDirection() == "LEFT"}
                    <input type="radio" name="alBdDirection" value="RIGHT">右綴じ
                    <input type="radio" name="alBdDirection" value="LEFT" checked>左綴じ
{else}
                    <input type="radio" name="alBdDirection" value="RIGHT">右綴じ
                    <input type="radio" name="alBdDirection" value="LEFT">左綴じ
{/if}
                </td>
              </tr>
              <tr>
                <th>綴じ方法</th>
                <td>{html_options name=alBdMethod options=$bdMethodList selected=$bookProperty->getalBdMethod()}</td>
              </tr>
              <tr>
                <th>印刷方向</th>
                <td>
{if $bookProperty->getAlPpDirection() == "VERTI"}
                    <input type="radio" name="alPpDirection" value="VERTI" checked>縦
                    <input type="radio" name="alPpDirection" value="HORIZ">横
{elseif $bookProperty->getAlPpDirection() == "HORIZ"}
                    <input type="radio" name="alPpDirection" value="VERTI">縦
                    <input type="radio" name="alPpDirection" value="HORIZ" checked>横
{else}
                    <input type="radio" name="alPpDirection" value="VERTI">縦
                    <input type="radio" name="alPpDirection" value="HORIZ">横
{/if}
                </td>
              </tr>
              <tr>
                <th>総ページ数</th>
                <td>
                  {$bookProperty->getAlPpNum()}&nbsp;ページ
                  <input type="hidden" name="alPpNum">
                </td>
              </tr>
            </table>
          </div>
          <h3>表紙</h3>
          <div class="property-box">
            <table>
              <tr>
                <th>カラーorモノクロ</th>
                <td>
{if $bookProperty->getFrClorbw() == "COLOR"}
                    <input type="radio" name="frClorbw" value="COLOR" checked>カラー
                    <input type="radio" name="frClorbw" value="BANDW">白黒
{elseif $bookProperty->getFrClorbw() == "BANDW"}
                    <input type="radio" name="frClorbw" value="COLOR">カラー
                    <input type="radio" name="frClorbw" value="BANDW" checked>白黒
{else}
                    <input type="radio" name="frClorbw" value="COLOR">カラー
                    <input type="radio" name="frClorbw" value="BANDW">白黒
{/if}
                </td>
              </tr>
              <tr>
                <th>紙質</th>
                <td>{html_options name=frPpType options=$paperTypeList selected=$bookProperty->getFrPpType()}</td>
              </tr>
            </table>
          </div>
          <h3>本文用紙</h3>
          <div class="property-box">
            <table>
              <tr>
                <th>カラーorモノクロ</th>
                <td>
{if $bookProperty->getInClorbw() == "COLOR"}
                    <input type="radio" name="inClorbw" value="COLOR" checked>カラー
                    <input type="radio" name="inClorbw" value="BANDW">白黒
{elseif $bookProperty->getInClorbw() == "BANDW"}
                    <input type="radio" name="inClorbw" value="COLOR">カラー
                    <input type="radio" name="inClorbw" value="BANDW" checked>白黒
{else}
                    <input type="radio" name="inClorbw" value="COLOR">カラー
                    <input type="radio" name="inClorbw" value="BANDW">白黒
{/if}
                </td>
              </tr>
              <tr>
                <th>紙質</th>
                <td>{html_options name=inPpType options=$paperTypeList selected=$bookProperty->getInPpType()}</td>
              </tr>
            </table>
          </div>
          <div id="btn-submit">
            <input type="hidden" name="id" value="{$bookProperty->getId()}">
            <input type="submit" class="btn" value="次へ">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>