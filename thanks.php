<?php 
//check.phpから送信データを受け取る
    // echo $_POST['nickname'].'<br>';
    // echo $_POST['email'] . '<br>';
    // echo $_POST['content'] . '<br>';

    //ステップ1　DBに接続
    $dsn = 'mysql:dbname=phpkiso;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn , $user , $password);
    //オブジエクト指向
    $dbh->query('SET NAME utf-8');

    /// ステップ2 sql文を実行する
    $sql = 'INSERT INTO `survey`(`nickname` , `email` , `content`)VALUES(? ,? ,?)';
    $date = array($_POST['nickname'] , $_POST['email'] , $_POST['content']);
    $stmt = $dbh ->prepare($sql);
    $stmt->execute($date);

    $dbh = null;

    $nickname = htmlspecialchars($_POST['nickname']);
    $email = htmlspecialchars($_POST['email']);
  

  ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 <meta charset="utf-8">
   <title></title>
 </head>
 <body>
  <h1>お問い合わせありがとうございました！</h1>
  <p>ニックネーム:<?php  echo $_POST['nickname'];?>様</p>
  <p>メールアドレス:<?php  echo $_POST['email'];?></p>
  <p>お問い合わせ内容:<?php  echo $_POST['content'];?></p>

  

 </body>
 </html>

 <!-- ①DBとの連携部分の予習
      ②formと$_POST部分の復習
      ③bootsnippから気に入ったフォームのデザインを今回のindex.htmlに反映
      $nickname = htmlspecialchars($_POST['nicaname'])
  -->