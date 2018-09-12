<?php


 
$db = array(
    'host' => '127.0.0.1',         //设置服务器地址
    'port' => '3306',              //设端口 
    'dbname' => 'test',             //设置数据库名      
    'username' => 'root',           //设置账号
    'password' => '123456',      //设置密码
    'charset' => 'utf8',             //设置编码格式
    'dsn' => 'mysql:host=127.0.0.1;dbname=test;port=3306;charset=utf8',   //这里不知道为什么，也需要这样再写一遍。
);
 
//连接
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //默认是PDO::ERRMODE_SILENT, 0, (忽略错误模式)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 默认是PDO::FETCH_BOTH, 4
);
 
try{
    $mod = new PDO($db['dsn'], $db['username'], $db['password'], $options);
}catch(PDOException $e){
    die('数据库连接失败:' . $e->getMessage());
}

