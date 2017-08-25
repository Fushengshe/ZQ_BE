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

 

## 栏目


### 添加栏目

> http://www.thmaoqiu.cn/poetry/public/index.php/addlists

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
column(string) | 传入栏目名  | 栏目A
url(string) | 栏目url | http://abc.com
order(int) |  栏目位置  |  5
uid(int) | 父级栏目id（插入父级栏目返回该项0） | 1

验证成功返回 
 ```json
 {
     "code": 0,
     "msg": "添加栏目成功
   "listid": 30,
 }
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "栏目名 为必填项"
}
{
    "code": 1,
    "msg": "栏目位置 必须为整数"
}
{
    "code": 1,
    "msg": "栏目地址 为必填项"
}
{
    "code": 1,
    "msg": "栏目位置 为必填项"
}
{
    "code": 1,
    "msg": "父级栏目 为必填项"
}
{
    "code": 1,
    "msg": "父级栏目 必须为整数"
}
{
    "code": 2,
    "msg": "插入位置不存在
}
{
    "code": 3,
    "msg": "操作失败，请重试"
}
 ```

### 删除栏目

> http://www.thmaoqiu.cn/poetry/public/index.php/dellists

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入栏目id  | 30

验证成功返回 
 ```json
 {
     "code": 0,
     "msg": "删除成功
 }
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "栏目id 为必填项"
}
{
    "code": 1,
    "msg": "栏目id 必须为整数"
}
{
    "code": 2,
    "msg": "栏目不存在"
}
｛
    "code": 3,
    "msg": "操作失败，请重试"
}
 ```

### 修改栏目

> http://www.thmaoqiu.cn/poetry/public/index.php/editlists

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
column(string) | 传入栏目名  | 栏目A
url(string) | 栏目url | http://abcdef.com
id(int) | 传入栏目id  | 30

验证成功返回 
 ```json
 {
     "code": 0,
     "msg": "更改成功
 }
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "栏目id 为必填项"
}
{
    "code": 1,
    "msg": "栏目名 为必填项"
}
{
    "code": 1,
    "msg": "栏目url为必填项"
}
{
    "code": 1,
    "msg": "栏目id 必须为整数"
}
{
    "code": 2,
    "msg": "被修改的栏目不存在"
}
｛
    "code": 3,
    "msg": "操作失败，请重试"
}
 ```

### 查询栏目

> http://www.thmaoqiu.cn/poetry/public/index.php/showlists

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----

验证成功返回 
 ```json
{
    "code": 0,
    "res": [
        {
            "column": "新闻速递",
            "id": 1,
            "order": "1",
            "childColumn": [
                {
                    "name": "诗词要闻",
                    "url": "0",
                    "uid": "1",
                    "order": "1"
                },
                {
                    "name": "联坛动态",
                    "url": "0",
                    "uid": "1",
                    "order": "2"
                }
            ]
        },
        {
            "column": "中华诗词",
            "id": 2,
            "order": "2",
            "childColumn": [
                {
                    "name": "诗词大观",
                    "url": "0",
                    "uid": "2",
                    "order": "1"
                },
                {
                    "name": "时代新声",
                    "url": "0",
                    "uid": "2",
                    "order": "2"
                },
                {
                    "name": "经典诗词鉴赏",
                    "url": "0",
                    "uid": "2",
                    "order": "3"
                },
                {
                    "name": "名家百科",
                    "url": "0",
                    "uid": "2",
                    "order": "4"
                }
            ]
        },
        {
            "column": "诗联大赛",
            "id": 3,
            "order": "3",
            "childColumn": [
                {
                    "name": "征诗征联",
                    "url": "0",
                    "uid": "3",
                    "order": "5"
                },
                {
                    "name": "获奖揭晓",
                    "url": "0",
                    "uid": "3",
                    "order": "6"
                },
                {
                    "name": "荣誉检索",
                    "url": "0",
                    "uid": "3",
                    "order": "7"
                }
            ]
        },
        {
            "column": "大学堂",
            "id": 4,
            "order": "4",
            "childColumn": [
                {
                    "name": "诗词学堂",
                    "url": "0",
                    "uid": "4",
                    "order": "1"
                },
                {
                    "name": "对联网校",
                    "url": "0",
                    "uid": "4",
                    "order": "2"
                },
                {
                    "name": "理论研习",
                    "url": "0",
                    "uid": "4",
                    "order": "3"
                },
                {
                    "name": "书画音像",
                    "url": "0",
                    "uid": "4",
                    "order": "4"
                },
                {
                    "name": "123",
                    "url": "3",
                    "uid": "4",
                    "order": "40"
                }
            ]
        },
        {
            "column": "校园联盟",
            "id": 5,
            "order": "5",
            "childColumn": [
                {
                    "name": "校园资讯",
                    "url": "0",
                    "uid": "5",
                    "order": "1"
                },
                {
                    "name": "活动交流",
                    "url": "0",
                    "uid": "5",
                    "order": "2"
                },
                {
                    "name": "联盟介绍",
                    "url": "0",
                    "uid": "5",
                    "order": "3"
                },
                {
                    "name": "申请加入",
                    "url": "0",
                    "uid": "5",
                    "order": "4"
                }
            ]
        },
        {
            "column": "中青概况",
            "id": 6,
            "order": "6",
            "childColumn": [
                {
                    "name": "登陆论坛",
                    "url": "0",
                    "uid": "6",
                    "order": "1"
                },
                {
                    "name": "中青简介",
                    "url": "0",
                    "uid": "6",
                    "order": "2"
                },
                {
                    "name": "组织机构",
                    "url": "0",
                    "uid": "6",
                    "order": "3"
                },
                {
                    "name": "大事记",
                    "url": "0",
                    "uid": "6",
                    "order": "4"
                },
                {
                    "name": "捐赠",
                    "url": "0",
                    "uid": "6",
                    "order": "5"
                },
                {
                    "name": "联系我们",
                    "url": "0",
                    "uid": "6",
                    "order": "6"
                }
            ]
        }
    ]
}
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "栏目为空"
}
 ```


## 文章


### 添加文章

> http://www.thmaoqiu.cn/poetry/public/index.php/addart

数据传输方式：POST

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
title(string) | 标题  | 标题五
author(string) | 责任编辑 | 我
content(string) |  文章内容  | 这是文章 
source(string) | 文章来源 | 百度
list_id(int) | 所属栏目 | 1

验证成功返回 
 ```json
 {
     "code": 0,
     "msg": "添加文章成功
   "id": 12,
 }
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "标题 为必填项"
}
{
    "code": 1,
    "msg": "责任编辑 为必填"}
{
    "code": 1,
    "msg": "文章内容 为必填项"}
{
    "code": 1,
    "msg": "栏目位置 为必填项"
}
{
    "code": 1,
    "msg": "文章来源 为必填项"
}
{
    "code": 1,
    "msg": "所属栏目 为必填项"
}
{
    "code": 2,
    "msg": "添加文章失败，请重试”
}
 ```

### 删除文章

> http://www.thmaoqiu.cn/poetry/public/index.php/delart

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
id(int) | 文章id | 10

验证成功返回 
 ```json
 {
     "code": 0,
     "msg": "删除文章成功
 }
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "要删除的文章 为必填项"
}
{
    "code": 2,
    "msg": "该文章已被删除”
}
 ```

### 修改文章

> http://www.thmaoqiu.cn/poetry/public/index.php/editart

数据传输方式：POST

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
id(int) | 文章id | 8
title(string) | 标题  | 标题五
author(string) | 责任编辑 | 我
content(string) |  文章内容  | 这是文章 
source(string) | 文章来源 | 百度
list_id(int) | 所属栏目 | 1

验证成功返回 
 ```json
 {
     "code": 0,
     "msg": "修改文章成功
 }
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "文章id 为必填项"
}
{
    "code": 1,
    "msg": "标题 为必填项"
}
{
    "code": 1,
    "msg": "责任编辑 为必填"
}
{
    "code": 1,
    "msg": "文章内容 为必填项"
}
{
    "code": 1,
    "msg": "栏目位置 为必填项"
}
{
    "code": 1,
    "msg": "文章来源 为必填项"
}
{
    "code": 1,
    "msg": "所属栏目 为必填项"
}
{
    "code": 2,
    "msg": "目标栏目不存在，请重试”
}
{
    "code": 3,
    "msg": "修改文章失败，请重试”
}
 ```

### 查询文章

#####查文章详细

> http://www.thmaoqiu.cn/poetry/public/index.php/showart

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
id(int) | 文章id | 1

验证成功返回 
 ```json
{
    "code": 0,
    "article": {
        "title": "文章一",
        "content": "哈哈哈哈文章一",
        "pic": "/pic1",
        "author": "作者",
        "source": "百度",
        "created_at": "1970-01-02 10:01"
    }
}
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "文章id 为必填项"
}
{
    "code": 2,
    "msg": "操作失败，请重试”}
 ```

#####查文章标题
> http://www.thmaoqiu.cn/poetry/public/index.php/showtitle

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
list_id(int) | 栏目id | 1

验证成功返回 
 ```json
{
    "code": 0,
    "title": [
        {
            "title": "标题1",
            "id": "8"
        },
        {
            "title": "sb",
            "id": "10"
        },
        {
            "title": "sb",
            "id": "9"
        },
        {
            "title": "标题1",
            "id": "5"
        },
        {
            "title": "标题",
            "id": "3"
        },
        {
            "title": "文章二",
            "id": "2"
        }
    ]
}
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "栏目 为必填项"
}
{
    "code": 2,
    "msg": "该栏目暂未发表文章”
}
 ```
#####查更多文章
> http://www.thmaoqiu.cn/poetry/public/index.php/showmore

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
list_id(int) | 栏目id | 1

验证成功返回 
 ```json
{
    "0": {
        "title": "标题1",
        "id": "8"
    },
    "1": {
        "title": "sb",
        "id": "10"
    },
    "2": {
        "title": "sb",
        "id": "9"
    },
    "3": {
        "title": "标题1",
        "id": "5"
    },
    "4": {
        "title": "标题",
        "id": "3"
    },
    "5": {
        "title": "文章二",
        "id": "2"
    },
    "6": {
        "title": "文章一",
        "id": "1"
    },
    "7": {
        "title": "5",
        "id": "4"
    },
    "8": {
        "title": "1",
        "id": "7"
    },
    "9": {
        "title": "2",
        "id": "6"
    },
    "code": 0
}
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "栏目 为必填项"
}
{
    "code": 2,
    "msg": "该栏目暂未发表文章”
}
```



## 评论



### 添加评论

> http://www.thmaoqiu.cn/poetry/public/index.php/addcomment

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
comment(string) | 评论  | hello
uid(string) | 父评论id | 0（无父评论）
article_id(string) |  文章id | 1 
user_id(int) | 用户id | 1

验证成功返回 
 ```json
{
    "code": 0,
    "msg": "评论成功",
    "id": 8
}
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "评论 为必填项"
}
{
    "code": 1,
    "msg": "父评论id 为必填"
}
{
    "code": 1,
    "msg": "文章id 为必填项"
}
{
    "code": 1,
    "msg": "用户id 为必填项"}
{
    "code": 2,
    "msg": "评论失败，请重试”}
 ```

### 查询评论

> http://www.thmaoqiu.cn/poetry/public/index.php/showcomment

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
article_id(string) |  文章id | 1 

验证成功返回 
 ```json
{
    "code": 0,
    "msg": [
        {
            "user_name": "匿名用户",
            "comment": "haha",
            "created_at": "2031-04-21 19:04",
            "id": 19
        },
        {
            "user_name": "xxx",
            "comment": "hello",
            "created_at": "2017-08-24 17:08",
            "id": 18
        },{
            "user_name": "匿名用户",
            "comment": "哈哈哈",
            "created_at": "2005-03-18 01:03",
            "id": 1,
            "childComment": [
                {
                    "comment": "44444",
                    "id": 4,
                    "created_at": "2005-03-06 11:03"
                },
                {
                    "user_name": "xxx",
                    "comment": "55555",
                    "id": 5,
                    "created_at": "1971-05-10 11:05"
                }
            ]
      }
    ]
}
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "文章id 为必填项"
}
{
    "code": 2,
    "msg": "暂无评论”
}
 ```

### 更多评论

> http://www.thmaoqiu.cn/poetry/public/index.php/morecomment

数据传输方式：GET

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
uid(string) |  父评论id | 1 

验证成功返回 
 ```json
{
    "code": 0,
    "msg": [
        {
            "comment": "44444",
            "id": 4
        },
        {
            "comment": "55555",
            "id": 5
        }
    ]
}
 ```

验证失败返回
 ```json
{
    "code": 1,
    "msg": "父评论d 为必填项"
}
{
    "code": 2,
    "msg": "操作失败，请重试”
}
 ```
