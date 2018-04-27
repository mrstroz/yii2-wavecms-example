# yii2-wavecms-example
**Example module for [Yii 2 WaveCMS](https://github.com/mrstroz/yii2-wavecms).** 

Please do all install steps first from [Yii 2 WaveCMS](https://github.com/mrstroz/yii2-wavecms).

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Run

```
composer require --prefer-source "mrstroz/yii2-wavecms-example" "dev-master"
```

or add

```
"mrstroz/yii2-wavecms-example": "dev-master"
```

to the require section of your `composer.json` file.


Required
--------

1. Update `backend/config/main.php` (Yii2 advanced template) 
```
'modules' => [
    // ...
    'wavecms-example' => [
        'class' => 'mrstroz\wavecms\example\Module'
    ],
],
```

2. Run migration 

Add the `migrationPath` in `console/config/main.php` and run `yii migrate`:

```php
// Add migrationPaths to console config:
'controllerMap' => [
    'migrate' => [
        'class' => 'yii\console\controllers\MigrateController',
        'migrationPath' => [
            '@vendor/mrstroz/yii2-wavecms-example/migrations'
        ],
    ],
],
```

Or run migrates directly

```
yii migrate --migrationPath=@vendor/mrstroz/yii2-wavecms-example/migrations
```
