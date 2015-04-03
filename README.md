# yii2-handlebars
Fork of https://github.com/7coders/yii2-handlebars which disappeared mysteriously from GitHub

From the original 7coders README.md
==================================

Handlebars renderer for Yii2 framework.

This extension provides a `ViewRender` that would allow you to use handlebars-php view template engine.

To use this extension, simply add the following code in your application configuration:

```php
return [
    //....
    'components' => [
        'view' => [
            'renderers' => [
                'handlebars' => [
                    'class' => 'exertis\handlebars\ViewRenderer',
                    // the file extension of Handlebars templates
                    // 'extension' => '.handlebars',
                    // path alias pointing to where Handlebars cache will be stored. Set to false to disable templates cache.
                    // 'cache' => '@app/runtime/handlebars',
                    // array helpers to preload, can contain class names (strings).
                    // If empty - only default helpers will be preloaded
                    // 'helpers' => [],
                    // a callable function to escape values
                    // 'escape' => 'htmlspecialchars',
                    // array to pass as extra parameter to the escape function
                    // 'escapeArgs' => [ENT_COMPAT, 'UTF-8']
                ],
            ],
        ],
    ],
];
```

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist exertis/yii2-handlebars "*"  
```

or add

```
"exertis/yii2-handlebars": "*"  
```

to the require section of your composer.json.

