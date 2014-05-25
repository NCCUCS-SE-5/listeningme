<?php
    session_start();
    include("connect.php");

    $id         = $_POST['id'];
    $pw         = $_POST['pw'];
    $pw2        = $_POST['pw2'];
    $fullname   = $_POST['fullname'];
    $sex        = $_POST['sex'];
    $birthday   = $_POST['birthday'];
    $telephone  = $_POST['telephone'];
    $mobile     = $_POST['mobile'];
    $address    = $_POST['address'];
    $email      = $_POST['email'];
    $profession = $_POST['profession'];
    $other      = $_POST['other'];
    $sql = "SELECT * FROM member_table where account_number = '$id'";
?>
<head>
    <meta charset="utf-8">
    <title>福利請聽</title>
    <?php include 'include.php'; ?>
</head>
<body>
    <?php include 'nav.php'; ?>
    <section class="container_12">
        <div class="grid_12" style="text-align:center;height:400px">
            <?php
            //確認密碼輸入的正確性
              if ($id != null && $pw != null && $pw2 != null && $pw == $pw2) {
                if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
                  echo '驗證碼錯誤!';
                  echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
                } else {
                  $sql    = "SELECT * FROM member_table where account_number = '$id'";
                  $result = mysql_query($sql);
                  if (@mysql_fetch_row($result)) {
                    echo '帳號已存在!';
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
                  } else {
                    //新增資料進資料庫語法
                    $sql = "insert into member_table (account_number, password, full_name, sex, birthday, telephone, mobile, address, email, profession, other) values ('$id', '$pw', '$fullname', '$sex', '$birthday', '$telephone', '$mobile', '$address', '$email', '$profession', '$other')";
                    if (mysql_query($sql)) {
                      echo '新增成功!';
                      echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                    } else {
                      echo '新增失敗!';
                      echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
                    }
                  }
                }
              } else {
                echo '請確認帳號與密碼輸入無誤!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
              }
            unset($_SESSION['captcha']);
            ?>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>