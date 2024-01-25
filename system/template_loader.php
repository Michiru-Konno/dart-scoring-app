<?php
//リクエストURLを編集
$originalUri = $_SERVER['REQUEST_URI'];
//パラメーターを削除
$uriWithoutParams = strtok($originalUri, '?');
//末尾にスラッシュがついていた場合削除
$cleanedUri = preg_replace('/\/$/', '', $uriWithoutParams);
//トップページだけ特例
if($uriWithoutParams=='/'){
    $cleanedUri = '/'; 
}

//リクエストURLに該当するページがあるか検索
$sql = "SELECT post_id ,template, css,post_status FROM post_index WHERE permalink = ?";
$stmt = $tournament_access->prepare($sql);
//リクエストしたURLを検索する
$stmt->bind_param("s", $cleanedUri); 
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($row) {
    if($row['post_status']=='publish'){
        //ノーマルな固定ページを表示
        $post_id = $row['post_id'];
        $post_data = get_post_data( $post_id );
        $template = $post_data['template'];
        $post_title = $post_data['post_title'];
        $css = $post_data['css'];
    }else{
        //post_id = 2 は Not Found Page　の投稿番号（公開していない→存在していないページ）
        $post_data = get_post_data( 2 );
        $template = $post_data['template'];
        $post_title = $post_data['post_title'];
        $css = $post_data['css'];
        
    }
}else{
    //post_id = 2 は Not Found Page　の投稿番号（公開していない→存在していないページ）
    $post_data = get_post_data( 2 );
    $template = $post_data['template'];
    $post_title = $post_data['post_title'];
    $css = $post_data['css'];
}
$stmt->close();
?>