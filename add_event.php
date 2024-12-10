
<?php
// ファイルの先頭でエラー表示を有効に
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'EventDAO.php';

// POSTデータの確認
var_dump($_POST);

try {
    // 各変数の値を確認
    $eventName = $_POST['event-name'];
    echo "イベント名: " . $eventName . "<br>";
    
    $eventDate = new DateTime($_POST['event-date']);
    echo "日付: " . $eventDate->format('Y-m-d H:i:s') . "<br>";
    
    $memberName = $_POST['member-name'];
    echo "メンバー名: " . $memberName . "<br>";
    
    $userID = "U000001";
    echo "ユーザーID: " . $userID . "<br>";

    $eventDAO = new EventDAO();
    $eventId = $eventDAO->add_event($userID, $eventName, $eventDate);
    
    echo "作成されたイベントID: " . $eventId . "<br>";
    echo json_encode(['success' => true, 'eventId' => $eventId]);

} catch (Exception $e) {
    echo "エラー発生: " . $e->getMessage() . "<br>";
    echo "ファイル: " . $e->getFile() . "<br>";
    echo "行: " . $e->getLine() . "<br>";
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
/*
// 実行するためのエンドポイントをつくるよ！

require_once 'EventDAO.php';


require_once 'EventDAO.php';

try {
    // POSTデータを取得
    $eventName = $_POST['event-name'];
    $eventDate = new DateTime($_POST['event-date']);
    $memberName = $_POST['member-name'];
    $userID = "U000001";  // 仮のユーザーID

    // EventDAOのインスタンスを作成
    $eventDAO = new EventDAO();

    // イベントを追加
    $eventId = $eventDAO->add_event($userID, $eventName, $eventDate);
    
    // 成功レスポンスを返す
    echo json_encode(['success' => true, 'eventId' => $eventId]);

} catch (Exception $e) {
    // エラーレスポンスを返す
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
    */
