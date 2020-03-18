$(function() {

// フォームで未入力項目があるときポップアップ表示をする。
$("#submit").on('click', function() {
    var entry = $('#entry').val();
    var detail = $('#detail').val();
    if (entry == '' && detail == '') {
        alert('タイトルと内容を入力してください');
    } else if (entry == '') {
        alert('タイトルを入力してください');
    } else if (detail == '') {
        alert('内容を入力してください');
    }
})

// いいね！を押したら反映されるような処理。
$('.good').on('click', function() {
    alert('まだ実装途中です。');
})


});