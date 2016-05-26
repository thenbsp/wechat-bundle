# wechat-bundle
Wechat Bundle for Symfony3 based [thenbsp/wechat](https://github.com/thenbsp/wechat)

### configuration

```php
// ./app/config/config.yml

thenbsp_wechat:
    wechat:
        appid: "your appid"
        appsecret: "your appsecret"
```

### use doctrine cache driver

```php
// ./app/config/config.yml

doctrine_cache:
    providers:
        filesystem_cache:
            type: file_system

thenbsp_wechat:
    wechat:
        appid: "your appid"
        appsecret: "your appsecret"
    cache_driver:
        id: "doctrine_cache.providers.filesystem_cache"
```
