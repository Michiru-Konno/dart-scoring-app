<?php
//データベース認証
require_once(dirname(__FILE__).'/database/connect-databese.php');
//共通Function(PHP)を読み込み
require_once(dirname(__FILE__).'/../common/global.php');
//リクエストページの有無を確認
require_once(dirname(__FILE__).'/template_loader.php');
//ログインの有無を確認
// require_once(dirname(__FILE__).'/login_check.php');
// head呼び出し
require_once(dirname(__FILE__) .'/../common/head/head.php') ;
// header呼び出し
require_once(dirname(__FILE__) .'/../common/header/header.php') ;
//テンプレートを取得して投稿を表示
require_once(dirname(__FILE__) . '/../template/' . $template . '.php');
//フッター呼び出し
if($post_id != 6){
    require_once(dirname(__FILE__) .'/../common/footer/footer.php') ;
}
//データベース接続解除
require_once(dirname(__FILE__).'/database/disconnect-database.php');
?>