## 获取下载地址

- MongoDB 源码下载地址：https://www.mongodb.com/download-center#community

![image-20200827154508841](../static/images/InstallRedHat/image-20200827154508841.png)

![image-20200827155121384](../static/images/InstallRedHat/image-20200827155121384.png)

## 下载

> 这里我们选择 tgz 下载，下载完安装包，并解压 tgz（以下演示的是 64 位 Linux上的安装） 。

```sh
[root@localhost ~]# wget https://fastdl.mongodb.org/linux/mongodb-linux-x86_64-rhel70-4.4.0.tgz        # 下载
[root@localhost ~]# tar -zxvf mongodb-linux-x86_64-rhel70-4.4.0.tgz                                    # 解压
[root@localhost ~]# mv mongodb-linux-x86_64-rhel70-4.4.0  /usr/local/mongodb4                                         # 将解压包拷贝到指定目录
```

> MongoDB 的可执行文件位于 bin 目录下，所以可以将其添加到 PATH 路径中：

```sh
[root@localhost ~]# vim /etc/profile                    # 编辑该文件将MongoDB的可执行文件所在的bin目录添加进环境变量
[root@localhost ~]# 
```

**export PATH=`<mongodb-install-directory>`/bin:$PATH**

> `<mongodb-install-directory>` 为你 MongoDB 的安装路径。如本文的 /usr/local/mongodb4 。

```sh
PATH=${PATH}:/usr/local/mongodb4/bin
export PATH
```

```sh
[root@localhost ~]# source /etc/profile                 # 使文件生效
[root@localhost ~]# 
```

## 创建数据库目录

**默认情况下 MongoDB 启动后会初始化以下两个目录：**

- 数据存储目录：/var/lib/mongodb
- 日志文件目录：/var/log/mongodb

**我们在启动前可以先创建这两个目录并设置当前用户有读写权限：**

```sh
sudo mkdir -p /var/lib/mongo
sudo mkdir -p /var/log/mongodb
sudo chown `whoami` /var/lib/mongo     # 设置权限
sudo chown `whoami` /var/log/mongodb   # 设置权限
```

**接下来启动 Mongodb 服务：**

> 下面是附加了一些参数进行启动的，数据库路径和日志路径，以及绑定所有ip都可以连接

```sh
[root@localhost ~]# mongod --dbpath /var/lib/mongo --logpath /var/log/mongodb/mongod.log --bind_ip_all --fork
about to fork child process, waiting until server is ready for connections.
forked process: 1365
child process started successfully, parent exiting
[root@localhost ~]# 
```

**打开 /var/log/mongodb/mongod.log 文件看到以下信息，说明启动成功。**

```sh
[root@localhost ~]# cat /var/log/mongodb/mongod.log | grep Listening
{"t":{"$date":"2020-08-27T04:30:25.223-04:00"},"s":"I",  "c":"NETWORK",  "id":23015,   "ctx":"listener","msg":"Listening on","attr":{"address":"/tmp/mongodb-27017.sock"}}
{"t":{"$date":"2020-08-27T04:30:25.223-04:00"},"s":"I",  "c":"NETWORK",  "id":23015,   "ctx":"listener","msg":"Listening on","attr":{"address":"0.0.0.0"}}
[root@localhost ~]# 
```


## MongoDB 后台管理 Shell

> 如果你需要进入 mongodb 后台管理，你需要先打开 mongodb 装目录的下的 bin 目录，然后执行 mongo 命令文件。
> 当然前面我们已经修改了`/etc/profile`文件，添加了环境变量，可以直接执行`mongo`
> MongoDB Shell 是 MongoDB 自带的交互式 Javascript shell，用来对 MongoDB 进行操作和管理的交互式环境。
> 当你进入 mongoDB 后台后，它默认会链接到 test 文档（数据库）：

```sh
[root@localhost ~]# mongo
MongoDB shell version v4.4.0
connecting to: mongodb://127.0.0.1:27017/?compressors=disabled&gssapiServiceName=mongodb
Implicit session: session { "id" : UUID("fa6a3b84-361d-4c44-ac4b-422386bebeba") }
MongoDB server version: 4.4.0
---
The server generated these startup warnings when booting: 
        2020-08-27T04:30:25.190-04:00: Access control is not enabled for the database. Read and write access to data and configuration is unrestricted
        2020-08-27T04:30:25.191-04:00: You are running this process as the root user, which is not recommended
        2020-08-27T04:30:25.195-04:00: /sys/kernel/mm/transparent_hugepage/enabled is 'always'. We suggest setting it to 'never'
        2020-08-27T04:30:25.195-04:00: /sys/kernel/mm/transparent_hugepage/defrag is 'always'. We suggest setting it to 'never'
        2020-08-27T04:30:25.195-04:00: Soft rlimits too low
        2020-08-27T04:30:25.195-04:00:         currentValue: 1024
        2020-08-27T04:30:25.195-04:00:         recommendedMinimum: 64000
---
---
        Enable MongoDB's free cloud-based monitoring service, which will then receive and display
        metrics about your deployment (disk utilization, CPU, operation statistics, etc).

        The monitoring data will be available on a MongoDB website with a unique URL accessible to you
        and anyone you share the URL with. MongoDB may use this information to make product
        improvements and to suggest MongoDB products and deployment options to you.

        To enable free monitoring, run the following command: db.enableFreeMonitoring()
        To permanently disable this reminder, run the following command: db.disableFreeMonitoring()
---
> 

```

**由于它是一个JavaScript shell，您可以运行一些简单的算术运算:**

```sh
> 8*8
64
> 8+8
16
> 

```

**现在让我们插入一些简单的数据，并对插入的数据进行检索：**

> 下面第一个命令将数字 `追梦小窝` 插入到 iszmxw 集合的 `name` 字段中，`25`插入到 iszmxw 集合的 `age` 字段中
> 第二个命令测试查找集合中的所有数据

```sh
> db.iszmxw.insert({name:"追梦小窝",age:25})
WriteResult({ "nInserted" : 1 })
> db.iszmxw.find()
{ "_id" : ObjectId("5f4771292ad494d7f6b8b545"), "name" : "追梦小窝", "age" : 25 }
> 

```

**如果要停止 mongodb 可以使用以下命令：**

```sh
[root@localhost ~]# mongod --dbpath /var/lib/mongo --logpath /var/log/mongodb/mongod.log --shutdown
{"t":{"$date":"2020-08-27T08:44:03.418Z"},"s":"I",  "c":"CONTROL",  "id":20697,   "ctx":"main","msg":"Renamed existing log file","attr":{"oldLogPath":"/var/log/mongodb/mongod.log","newLogPath":"/var/log/mongodb/mongod.log.2020-08-27T08-44-03"}}
killing process with pid: 1529
[root@localhost ~]# 

```

**也可以在 mongo 的命令出口中实现：**

```sh
> use admin
switched to db admin
> db.shutdownServer()
server should be down...
> 

```

**更多命令请参考首页**