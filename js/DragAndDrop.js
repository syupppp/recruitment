// *
// * ドラッグアンドドロップの実現
// *
// * 参考サイト: https://www.html5rocks.com/ja/tutorials/dnd/basics/#toc-examples
// * 参考サイト: http://www.htmq.com/dnd/
// * 

// *
// * 「ドラッグイベント」
// * dragstart 	... ドラッグ開始時
// * drag 		... ドラッグが継続している間
// * dragenter	... ドラッグ要素がドロップ要素に入った時
// * dragleave 	... ドラッグ要素がドロップ要素から出た時
// * dragover 	... ドラッグ要素がドロップ要素に重なっている間
// * drop 		... ドロップ時
// * dragend 	... ドラッグ終了時


var nowDragover = "";

// ドラッグ開始の設定
function handleDragStart(e) {
  this.style.opacity = '0.4';  // this / e.target is the source node.
  $("#edits").addClass('active');
  // $("#edits").animate({
  //   "right": "50px"
  // }
  // ,1000
  // ,"easeOutQuad"
  // );
}

// リンクのドラッグでリンク先に移動を防止する
function handleDragOver(e) {
  if (e.preventDefault) {
    e.preventDefault(); // Necessary. Allows us to drop.
  }
  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.
  // リンクのドラッグでリンク先に移動を防止する その2
  return false;
}

// overクラスを切り替えをdragenterで実現（Dragoverの代わりに使用）
function handleDragEnter(e) {
  // this / e.target is the current hover target.
  this.classList.add('over');
  nowDragover = $(this).attr('id');

  console.log(nowDragover);
}
function handleDragLeave(e) {
  this.classList.remove('over');  // this / e.target is previous target element.
  nowDragover = "";
}

// ブラウザのデフォルト動作を起動しない設定
function handleDrop(e) {
  // this / e.target is current target element.

  if (e.stopPropagation) {
  	// DOMを起動しない
    e.stopPropagation(); // stops the browser from redirecting.
  }

  // See the section on the DataTransfer object.

  return false;
}

// ドラッグ終了時の設定
function handleDragEnd(e) {
  // this/e.target is the source node.
    $("#edits").removeClass('active');

  [].forEach.call(cols, function (col) {
    col.classList.remove('over');
  });
  this.style.opacity = '1.0';  // this / e.target is the source node.
 

  switch(nowDragover){
    case "edits-delete" :
      if(!confirm('本当に削除しますか？')){

      }else{
        // $(this).addClass('hidden');
        $(this).hide("slow",function(){
          $(this).remove();
        })
        // $(this).animate({width: 'hide', height: 'hide', opacity: 'hide'}, 'slow', function () {
        //        $(this).remove();
        //    });
      }
      break;
    case "edits-download" :
      console.log("download");
      download($(this).data("uri"),$(this).data("filename"));
      break;
  }
}

function download(uri,fileName){
  var link = document.createElement('a');
  link.download = fileName;
  link.href = uri;
  link.click();

}

var cols = document.querySelectorAll('#items #icons-item dl, #edits ul li');
console.log(cols);

[].forEach.call(cols, function(col) {
	col.addEventListener('dragstart', handleDragStart, false);
	col.addEventListener('dragenter', handleDragEnter, false);
	col.addEventListener('dragover', handleDragOver, false);
	col.addEventListener('dragleave', handleDragLeave, false);
	col.addEventListener('drop', handleDrop, false);
	col.addEventListener('dragend', handleDragEnd, false);
});