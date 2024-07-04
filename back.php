<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['req'])) {
        $req = $_POST['req'];
        // 將 res 以 x-www-form-urlencoded 所需格式回傳
        // http_build_query 為url格式組合方法，也正好符合form-urlencoded所需格式，因此拿來做使用
        echo http_build_query(['res' => $req]);
    } else {
        http_response_code(400);
        echo '缺少 req 參數';
    }
} else {
    http_response_code(405);
    echo '只允許 POST 請求';
}
