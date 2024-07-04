<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POST Request Example</title>
</head>

<body>
    <h2>發送 POST 請求到 PHP 伺服器</h2>
    <!-- application/x-www-form-urlencoded 為默認form編碼 -->
    <form id="myForm" enctype="application/x-www-form-urlencoded">
        <label for="req">輸入 req 參數:</label><br>
        <input type="text" id="req" name="req" value=""><br><br>
        <button type="button" onclick="sendRequest()">發送請求</button>
    </form>
    <p id="response"></p>

    <script>
        function sendRequest() {
            var form = document.getElementById("myForm");
            var reqValue = document.getElementById("req").value;
            //創建form-urlencoded所需表單格式(key-value)
            var params = "req=" + encodeURIComponent(reqValue);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "back.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("response").innerHTML = "回應: " + xhr.responseText;
                    } else {
                        document.getElementById("response").innerHTML = "發生錯誤: " + xhr.status;
                    }
                }
            };

            xhr.send(params);
        }
    </script>
</body>

</html>