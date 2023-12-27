<?php
include_once 'link.php';

$sql="SELECT * FROM topic";
$result=$link->query($sql);
$list='';
while($row=$result->fetch_array(MYSQLI_ASSOC)){
    $list=$list."<li><a href='index.php?id={$row['id']}'>{$row['title']}</a></li>";
}

$article=array(
    'title'=>'WEB',
    'description'=>'Hello, PHP!!',
    'date'=>'2023-12-27'
);

if(isset($_GET['id'])){
    $sql="SELECT * FROM topic WHERE id={$_GET['id']}";
    $result=$link->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $article['title']=$row['title'];
    $article['description']=$row['description'];
    $article['date']=$row['date'];
}

$link->close();

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
</head>
<body>
    <h1><a href="index.php">Web</a></h1>
    <ol>
        <?=$list ?>
    </ol>
    <a href="create.php">Create</a>
    <h2><?=$article['title'] ?></h2>
    <p><?=$article['description'] ?></p>
    <p><?=$article['date'] ?></p>
</body>
</html>