#!/bin/bash

echo -e "\033[35m 开始检查目录... \033[0m"

mkdir -p /home/yezhiming/binary/activity

echo -e "\033[35m 进入目录.../home/yezhiming/binary/activity \033[0m"

# shellcheck disable=SC2164
cd /home/yezhiming/binary/activity

echo -e "\033[35m 删除旧的binary文件... \033[0m"

rm -rf binary-go*

echo -e "\033[35m 下载新文件... \033[0m"

wget https://blog.54zm.com/activity/binary-go-activity

echo -e "\033[35m 赋予可执行权限... \033[0m"

chmod 755 binary-go-activity

echo -e "\033[35m 停止旧的脚本... \033[0m"
# shellcheck disable=SC2006
old_app_pid=`ps -ef | grep binary-go-activity |grep APP_PORT=ok| awk '{print $2}'`
echo "old PID $old_app_pid"
kill -9 "$old_app_pid"
sleep 2

echo -e "\033[35m 启动脚本... \033[0m"
nohup ./binary-go-activity --APP_PORT=ok > /dev/null 2>&1 &
sleep 2
# shellcheck disable=SC2006
new_app_pid=`ps -ef | grep binary-go-activity |grep APP_PORT=ok| awk '{print $2}'`
echo -e "\033[35m new PID $new_app_pid Success... \033[0m"

