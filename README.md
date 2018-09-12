# redis--mysql 测试秒杀
自用redis秒杀和正常mysql逻辑测试

watch.php 使用了redis事务处理，
buy.php 模拟用原生的php+mysql处理  


测试用的apache自带的ab测试
ab.exe -c 1000 -n 100 http://domain/buy.php  1000个请求  每次100个并发
