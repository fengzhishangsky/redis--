<?php
//redis事务    先放入到队列中等待执行
//watch 版本标识，监控这个建被修改，事务也不回提交
$redis = new \Redis();	
$redis->connect("127.0.0.1",6379);
/*var_dump($redis->set("name","peter"),$redis->get("name"));
die;*/
//redis监视 可以监视多个
$redis->watch('count');//为这个key设置一个版本的标识

$count = $redis->get("count");
 
$limit = 3;

if($count>=$limit){
	exit("活动结束");
}

//消息队列  消息中间件
//rabbitmq   kafak   beanstalkd   redis(模拟消息队列)
//rabbitmq 保证消息的可靠性  异步消息处理  分布式 消息的传递  解耦 服务与服务的数据的交互  分布式架构  微服务架构  
//kafak  大数据处理  日志的收集
//beanstalkd  延迟消息队列


//redis事务   redis 中的事务是不回滚
$redis->multi();
//业务逻辑
$redis->incr("count");//抢购成功人员的  增加一
sleep(1);


//默认的redis事务，不会管命令到底是成功还是失败 不回滚



$res = $redis->exec(); //版本冲突返回空值
//提交时才会执行
if($res){


	include "db.php";
	$sql = "update product set store=store-1 where id=1";
	if($mod->exec($sql)){
		echo "库存更新成功";
	}
}