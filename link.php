<?php
include_once 'host.php';

class Link extends mysqli {
    public function __construct($host, $user, $pass, $db, $port, $socket, $charset) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        parent::__construct($host, $user, $pass, $db, $port, $socket);
    }
}

$link = new Link($host, $user, $pwd, 'port12345', 3306, null, 'utf8mb4');
if ($link->connect_errno) {
    throw new RuntimeException('connection error: ' . $link->connect_error);
}
$link->select_db($user);

$sql="SELECT * FROM topic";
$result=$link->query($sql);
$list='';
while($row=$result->fetch_array(MYSQLI_ASSOC)){
    $list=$list.'<li>'.$row['title'].'</li>';
}
?>