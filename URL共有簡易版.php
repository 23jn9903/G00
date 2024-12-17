<?php
    function generateShareToken() {
        return bin2hex(random_bytes(16));
    }
     // ログインユーザーのshare_settingsを取得
     //prepareしたりうんたらかんたら
     $content = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($content) {
        // 共有トークンがない場合は生成
        if (!$content['share_token']) {
            $shareToken = generateShareToken();
            $stmt = $pdo->prepare("UPDATE contents SET share_token = ? WHERE id = ?");
            $stmt->execute([$shareToken, $contentId]);
            $content['share_token'] = $shareToken;
        }

        // 共有URL生成
        $shareUrl = "http://" . $_SERVER['HTTP_HOST'] . "/共有したいサイト.php?token=" . $content['share_token'];
    }

?>
以下共有したいサイト.phpのサンプル
↓↓↓
<?php
// 表示するときは？
$token = $_GET['token'] ?? null

if ($token) {
    //share_settingsを検索
    //うんたらかんたら

    $page = $stmt->fetch(PDO::FETCH_ASSOC);

    // ページが存在し、有効期限内であることを確認
    //ページが存在し、有効期限であれば、共有フラグ的なものをtrueに
    $shared_page_flg = false;
     if ($page && (!$page['expires_at'] || strtotime($page['expires_at']) > time())) {
        $shared_page_flg = true;
     }

     if($shared_page_flg == false){
        <button onclick="updatePage()">更新</button> 
     }
