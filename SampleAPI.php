<?php
// HTTPヘッダーの設定
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');  // CORSの設定（必要に応じて制限をかける）
header('Access-Control-Allow-Methods: GET, POST');
try {
    // リクエストメソッドの取得
    $method = $_SERVER['REQUEST_METHOD'];
    
    // レスポンス用の配列
    $response['memoNumber'] = '0120';
    $response['memoTitle'] = '内定者説明会';
    

    
    switch ($method) {
        case 'GET':
            // GETリクエストの処理
            $response['status'] = 'success';
            break;
            
        case 'POST':
            // POSTリクエストの処理
            $response['status'] = 'success';
            $response['message'] = 'Data inserted successfully';
            break;
            
        default:
            throw new Exception('Unsupported request method');
    }
    
} catch (Exception $e) {
    // エラーハンドリング
    http_response_code(400);
    $response['status'] = 'error';
    $response['message'] = $e->getMessage();
}

// JSONとしてレスポンスを返す
echo json_encode($response, JSON_UNESCAPED_UNICODE);