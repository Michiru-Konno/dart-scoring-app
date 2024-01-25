<?php
// データベース認証情報
$database_host = 'localhost:8889';
$database_user = 'root';
$database_password = 'root';

// データベースにアクセスする関数
function connectToDatabase($database_name) {
    global $database_host, $database_user, $database_password;
    $db = new mysqli($database_host, $database_user, $database_password, $database_name);
    
    if ($db->connect_error) {
        die('データベース接続エラーが発生しました。管理者に連絡してください。');
    }

    return $db;
}

// 基幹データベースにアクセス
$cms_access = connectToDatabase('LAA1430352-raquty');

// ユーザーデータベースにアクセス
$user_access = connectToDatabase('LAA1430352-user');

// 加盟団体データベースにアクセス
$organizations_access = connectToDatabase('LAA1430352-organization');

// 管理画面データベースにアクセス
$manage_access = connectToDatabase('LAA1430352-manage');

// 大会関係データベースにアクセス
$tournament_access = connectToDatabase('LAA1430352-tournament');

// ログデータベースにアクセス
$log_access = connectToDatabase('LAA1430352-log');
?>
