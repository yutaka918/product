<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
    <?php
        try {
            $pro_code  = $_POST['code'];
            $pro_gazou_name = $_POST['gazou_name'];

            //↓下記の5行がデータベースに接続するためのプログラム　
            $dsn         = 'mysql:dbname=mst_product; host=localhost; charset=utf8';   
            $user        = 'root';
            $password    = '';
            $dbh         = new PDO($dsn, $user, $password);
            $dbh         ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql         = 'DELETE FROM mst_product WHERE code=?';
            $stmt        = $dbh->prepare($sql);
            $data[]      = $pro_code;
            $stmt        -> execute($data);

            $dbh         = null;

            if($pro_gazou_name!='') {
                unlink('./gazou/'.$pro_gazou_name);
            }
        } catch(Exception $e) {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    ?>

    削除しました。<br>
    <br>

    <a href="pro_list.php">戻る</a>

</body>
</html>