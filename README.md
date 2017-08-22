#青年诗词楹联网

##轮播图
###添加轮播图
> http://www.thmaoqiu.cn/poetry/public/index.php/carousel/add

数据传输方式：POST

数据传输格式为：JSON


参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id,可选  | 3
url(string) | 传入图片的url | http://otq91javs.bkt.clouddn.com/im1.jpg

验证成功返回 
`{'code'=>0,'msg'=>'成功添加一张轮播图'}`

验证失败返回
`{'code'=>1,'msg'=>'添加轮播图失败请稍后再试'}`
`{'code'=>2,'msg'=>'请插入轮播图'}`
`{'code'=>3,'msg'=>'该轮播图id已存在'}`

###修改轮播图
>http://www.thmaoqiu.cn/poetry/public/index.php/carousel/edit

数据传输方式：POST

数据传输格式为：JSON

参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id  | 3
url(string) | 传入图片的url | http://otq91javs.bkt.clouddn.com/im1.jpg

验证成功返回 
`{'code'=>0,'msg'=>'成功修改一张轮播图'}`

验证失败返回
`{'code'=>1,'msg'=>'修改轮播图失败请稍后再试'}`
`{'code'=>2,'msg'=>'请插入轮播图'}`
`{'code'=>1,'msg'=>'修改轮播图失败请稍后再试'}`

###删除轮播图

数据传输方式：DELETE

数据传输格式为：JSON

参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id  | 3

删除成功返回
 `{'code'=>0,'msg'=>'删除轮播图成功'}`
 
 删除失败返回
`{'code'=>1,'msg'=>'删除轮播图失败，请稍后再试'}`
 
 ###展示轮播图
 
 >http://www.thmaoqiu.cn/poetry/public/index.php/carousel/show
数据传输方式：GET

数据传输格式为：JSON

参数(类型) | 说明 | 示例
----|------|----
id(int) | 传入id  | 3

展示成功返回
`{'code'=>0,'id'=>1,'url'=>'http://otq91javs.bkt.clouddn.com/im1.jpg''}`

展示失败返回
`{'code'=>1,'msg'=>'查询失败，请稍后再试'}`


 