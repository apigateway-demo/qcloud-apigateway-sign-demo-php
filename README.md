# qcloud-apigateway-sign-demo-php

## 注意事项

- 默认创建的API是需要鉴权，可以勾选免鉴权则请求该API时不需要发送鉴权
- 若API选择需要鉴权，则该API（所在的服务）需要发布、该发布环境需要绑定使用计划、而且该使用计划需要绑定API-KEY，然后使用对应的API-KEY来访问该API
- 含有中文和空格的query, body在请求时需要对值进行urlencode处理，编码为utf-8.
- 参数计算签名时，必须使用编码前的值进行签名，不能用urlencode后字符串的进行签名.所以请在签名之后再对query、body的值做urlencode。
