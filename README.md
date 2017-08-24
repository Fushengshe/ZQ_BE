# 青年诗词楹联网

## 轮播图

### 添加轮播图

> http://www.thmaoqiu.cn/poetry/public/index.php/carousel/add

数据传输方式：POST

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id,可选  | 3
url(string) | 传入图片的url | http://otq91javs.bkt.clouddn.com/im1.jpg

验证成功返回 
 ```json
 {
     "code":0,
     "msg":"成功添加一张轮播图"
 }
 ```

验证失败返回
 ```json
 {
     "code":1,
     "msg":"添加轮播图失败请稍后再试"
 }
 ```
  ```json
  {
      "code":2,
      "msg":"请插入轮播图"
  }
  ```
   ```json
   {
       "code":3,
       "msg":"该轮播图id已存在"
   }
   ```

### 修改轮播图

>http://www.thmaoqiu.cn/poetry/public/index.php/carousel/edit

数据传输方式：POST

数据传输格式为：JSON

参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id  | 3
url(string) | 传入图片的url | http://otq91javs.bkt.clouddn.com/im1.jpg

验证成功返回 
 ```json
 {
     "code":0,
     "msg":"成功修改一张轮播图"
 }
 ```

验证失败返回
 ```json
 {
     "code":1,
     "msg":"修改轮播图失败请稍后再试"
 }
 ```
  ```json
  {
      "code":2,
      "msg":"请插入轮播图"
  }
  ```


### 删除轮播图

>http://www.thmaoqiu.cn/poetry/public/index.php/carousel/del

数据传输方式：DELETE

数据传输格式为：JSON

参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id  | 3

删除成功返回
 ```json
 {
     "code":0,
     "msg":"删除轮播图成功"
 }
 ```
 
 删除失败返回
  ```json
  {
      "code":1,
      "msg":"删除轮播图失败，请稍后再试"
  }
```
 
 ### 展示轮播图
 
 >http://www.thmaoqiu.cn/poetry/public/index.php/carousel/show
 
数据传输方式：GET

数据传输格式为：JSON

展示成功返回
```json
{
      "code": 0,
      "data": [
          {
              "id": 1,
              "url": "http://otq91javs.bkt.clouddn.com/im1.jpg"
          },
          {
              "id": 3,
              "url": "http://otq91javs.bkt.clouddn.com/im1.jpg"
          },
          {
              "id": 4,
              "url": "C:\\xampp\\tmp\\php276D.tmp"
          },
          {
              "id": 5,
              "url": "C:\\xampp\\tmp\\php4F05.tmp"
          }
      ]
  }
 ```

展示失败返回
```json
{
  "code" : 1,
  "msg" : "查询轮播图失败，请稍后再试"
  }
```
### 添加诗词社

> http://www.thmaoqiu.cn/poetry/public/index.php/poetrysociety/add

数据传输方式：POST

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id,可选  | 3
url(string) | 传入图片的url | http://otq91javs.bkt.clouddn.com/im1.jpg
name(string) | 传入desc,诗词社的名字  | 诗词社

验证成功返回 
 ```json
{
    "code": 0,
    "msg": "成功添加一个诗词社"
}
 ```

验证失败返回
 ```json
 {
     "code":1,
     "msg":"添加诗词社失败请稍后再试"
 }
 ```
  ```json
  {
      "code":2,
      "msg":"请插入诗词社图片"
  }
  ```
   ```json
  {
      "code": 3,
      "msg": "该诗词社id已存在"
  }
   ```
### 修改诗词社

>http://www.thmaoqiu.cn/poetry/public/index.php/poetrysociety/edit

数据传输方式：POST

数据传输格式为：JSON

参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id  | 3
url(string) | 传入图片的url | http://otq91javs.bkt.clouddn.com/im1.jpg
name(string) | 传入desc,诗词社的名字  | 诗词社

验证成功返回 
 ```json
{
    "code": 0,
    "msg": "成功修改一个诗词社"
}
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "修改诗词社失败请稍后再试"
}
 ```
  ```json
{
    "code": 2,
    "msg": "请插入诗词社图片"
}
  ```

### 删除诗词社

>http://www.thmaoqiu.cn/poetry/public/index.php/poetrysociety/del

数据传输方式：DELETE

数据传输格式为：JSON

参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id  | 3

删除成功返回
 ```json
{
    "code": 0,
    "msg": "成功删除一个诗词社"
}
 ```
 
 删除失败返回
  ```json
{
    "code": 0,
    "msg": "删除诗词社失败请稍后再试"
}
```
 
 ### 展示诗词社
 
 >http://www.thmaoqiu.cn/poetry/public/index.php/poetrysociety/show
 
数据传输方式：GET

数据传输格式为：JSON

展示成功返回
```json
{
    "code": 0,
    "data": [
        {
            "id": 1,
            "url": "http://otq91javs.bkt.clouddn.com/im1.jpg",
            "name": "诗词社"
        },
        {
            "id": 2,
            "url": "http://otq91javs.bkt.clouddn.com/im1.jpg",
            "name": null
        },
        {
            "id": 3,
            "url": "http://otq91javs.bkt.clouddn.com/im1.jpg",
            "name": null
        },
        {
            "id": 5,
            "url": "http://otq91javs.bkt.clouddn.com/im1.jpg",
            "name": "诗词社"
        }
    ]
}
 ```

展示失败返回
```json
{
  "code" : 1,
  "msg" : "查询诗词社失败，请稍后再试"
  }
```

 