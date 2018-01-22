<?php
/* Smarty version 3.1.30, created on 2018-01-22 18:52:29
  from "/Applications/MAMP/htdocs/syupure/templates/top.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a65b45d1c7439_77633007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c446697cb82db062cf7c339dadfabbde80c65c34' => 
    array (
      0 => '/Applications/MAMP/htdocs/syupure/templates/top.tpl',
      1 => 1516614748,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a65b45d1c7439_77633007 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
          <p id="profile-name"><?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
</p>
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
</html><?php }
}
