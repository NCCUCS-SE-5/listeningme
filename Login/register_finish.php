<?php
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id        = $_POST['id'];
$pw        = $_POST['pw'];
$pw2       = $_POST['pw2'];
$fullname = $_POST['fullname'];
$sex   = $_POST['sex'];
$birthday = $_POST['birthday'];
$telephone = $_POST['telephone'];
$mobile = $_POST['mobile'];
$address   = $_POST['address'];
$email = $_POST['email'];
$profession = $_POST['profession'];
$other     = $_POST['other'];

$sql = "SELECT * FROM member_table where account_number = '$id'";
if (mysql_query($sql))
//判斷帳號密碼是否為空值
    
//確認密碼輸入的正確性
    if ($id != null && $pw != null && $pw2 != null && $pw == $pw2) {
        if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
            echo '驗證碼錯誤!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        } else {
            $sql    = "SELECT * FROM member_table where account_number = '$id'";
            $result = mysql_query($sql);
            if (@mysql_fetch_row($result)) {
                echo '帳號已存在!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
            } else {
                //新增資料進資料庫語法
                $sql = "insert into member_table (account_number, password, full_name, sex, birthday, telephone, mobile, address, email, profession, other) values ('$id', '$pw', '$fullname', '$sex', '$birthday', '$telephone', '$mobile', '$address', '$email', '$profession', '$other')";
                if (mysql_query($sql)) {
                    echo '新增成功!';
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                } else {
                    echo '新增失敗!';
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                }
            }
        }
    } else {
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
unset($_SESSION['captcha']);
?>