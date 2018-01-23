<?php
/* Smarty version 3.1.30, created on 2018-01-23 12:40:51
  from "/Applications/MAMP/htdocs/syupure/templates/order-form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a66aec389a5d7_82707760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b77f8eaf80b39db18c3bede35914f75df852aa0a' => 
    array (
      0 => '/Applications/MAMP/htdocs/syupure/templates/order-form.tpl',
      1 => 1516678848,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a66aec389a5d7_82707760 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
      <div id="validation-box">
        <p>未設定項目が3件あります！</p>
      </div>
      <div id="main-left-box">
        <div id="main-left-view" class="">
          <ul>
            <li>
              <p>全体のイメージ</p>
              <ul>
                <li>紙サイズ</li>
                <li>冊数</li>
                <li>綴じ方向</li>
              </ul>
            </li>
            <li>
              <p>冊子の表紙・裏表紙</p>
              <ul>
                <li></li>
              </ul>
            </li>
            <li></li>
          </ul>
        </div>
      </div>
      <div id="main-right-box">
        <form action="#" method="post"> 
          <h3>全体のイメージ</h3>
          <div class="property-box">
            <table>
              <tr>
                <th>紙サイズ</th>
                <td>
                  <select name="" id="">
                    <option value="A4">A4</option>
                    <option value="B5">B5</option>
                    <option value="A3">A3</option>
                    <option value="B4">B4</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>冊数</th>
                <td><input type="number"><span>冊</span></td>
              </tr>
              <tr>
                <th>綴じ方向</th>
                <td>
                  <input type="radio" name="binding" value="左">左
                  <input type="radio" name="binding" value="右">右
                </td>
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
</html><?php }
}
