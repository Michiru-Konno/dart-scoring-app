<?php
//connect-database.php で接続したデータベースとの接続を解除します。
$cms_access->close();
$manage_access->close();
$user_access->close();
$organizations_access->close();
$tournament_access->close();
$log_access->close();
?>