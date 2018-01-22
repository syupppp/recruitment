$(function() {

  var dWidth = "";
  var iWidth = "";
  var iMargin = "";
  var left = 0;
  var size = 0;
  var pageboxWidth = 0;

/* 値の取得(ページ読み込み後不変) */
  iMargin = parseInt($('#page-box li').css('padding-right'));
  
/*
 *  ページスクロールバーの設定を行う関数
 * * * * * 
 *  引数なし
 */
  function setPageScrollBar() {
    /* 値の取得 */
    size = $('#page-box .main-obj-icon').length;
    /* #page-scroll-bar inputのvalueを設定 */
    $('#bar').val(size);
    /* #page-scroll-bar inputのmaxを設定 */
    $('#bar').attr('max',size);
  }

/*
 *  メインエリアのwidth設定を行う関数
 * * * * * 
 *  引数なし
 */
  function setMainareaWidth() {
    /* 値の取得 */
    dWidth = $(window).width();
    iWidth = $('#page-box .main-obj-icon').width();
    pageboxWidth = iWidth*size+iMargin*(size-1);
    console.log(pageboxWidth);
    if($('#page-box ul .over').length) {
      iMarginDrp = parseInt($('#page-box .over').css('padding-right'));
      // ドロップ前後の#page-box liのmarginの差分を足す
      pageboxWidth += iMarginDrp;
    }
    left = (dWidth-iWidth)/2;
    size = $('#page-box .main-obj-icon').length;  // 個数
    /* #page-box ulのwidthを設定 */
    $('#page-box ul').css('width', pageboxWidth+'px');
    /* #page-box ulのpaddingを設定 */
    $('#page-box ul').css('padding', '0 '+left+'px');
  }

/*
 ****************************************
 ****************************************
 以下、処理
 */  
  
/* 初期処理 */
  setPageScrollBar();
  setMainareaWidth()

  
  
/* ページスクロールバーの移動中の処理 */
  $('#bar').on('input', function () {
    var val = $(this).val();
    var m = $('#page-wrapper ul li').eq(val-1);
    var showScrollLeft = (iWidth+iMargin)*(val-1)
    // 左基準にて要素の表示位置へスクロール
    $('#page-wrapper').scrollLeft(showScrollLeft);
  } );


/*
 *  ドラッグ&ドロップの処理。
 *
 *  最終更新日
 *  2018/01/10 11:39
 *
 */
  // ドラッグ先の変数。
  var nowDragObj = "";
  var nowDragover = "";
  var nowDragoverChild = null;

  // ドラッグ開始
  function handleDragStart(e) {
    nowDragObj = $(this).attr('class');
    $(this).addClass('active');
  }


  // ドラッグ中
  function handleDrag(e) {
  }


  // ドラッグ要素がドロップ要素に入った時
  function handleDragEnter(e) {
    // overクラスを付与。
    this.classList.add("over");
    setMainareaWidth();
    // overクラスが付与された要素番号を取得。(#page-wrapper ul liのx番目)
    nowDragoverChild = $('#page-wrapper ul li').index(this);
  }


  // ドラッグ要素がドロップ要素から出た時
  function handleDragLeave(e) {
    this.classList.remove("over");
    // nowDragoverChildをnullに設定。
    nowDragoverChild = null;
    setTimeout(function() {
      setMainareaWidth();
    },500);
  }


  // ドラッグ終了時
  function handleDragEnd(e) {
    $(this).removeClass('active');
    // objを追加した場合、html要素を追加。
      $('#page-wrapper ul li').eq(nowDragoverChild).after('<li><div class="btn-info"><p><span>詳細情報を表示</span></p></div><div class="main-obj-icon"><div class="book">book-icon</div></div><p class="main-obj-name">アイウエオまるまる.book</p></li>');
    // widthとスクロールバーを再設定。
    setPageScrollBar();
    setMainareaWidth();
  }

  // ドラッグ関数を作動。
  var cols = document.querySelectorAll('#area-evacuate .evac-obj, #page-wrapper li');
  [].forEach.call(cols, function(col) {
	col.addEventListener('dragstart', handleDragStart, false);
    col.addEventListener('drag', handleDrag, false);
    col.addEventListener('dragenter', handleDragEnter, false);
    col.addEventListener('dragleave', handleDragLeave, false);
	col.addEventListener('dragend', handleDragEnd, false);
  });

});
