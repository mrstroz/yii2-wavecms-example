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
'bootstrap' => [
    // ...
    'mrstroz\wavecms\example\Bootstrap'
],
'modules' => [
    // ...
    'example' => [
        'class' => 'mrstroz\wavecms\example\Module'
    ],
],
```

2. Run migration 
```
yii migrate --migrationPath=@vendor/mrstroz/yii2-wavecms-example/migrations
```
