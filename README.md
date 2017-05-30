UNDER DEV !!!
=============


# yii2-wavecms-example
Example module for [WaveCMS](https://github.com/mrstroz/yii2-wavecms). Full example how to build modules for WaveCMS.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Run

```
php composer.phar require --prefer-source "[package/name]" "dev-master"
```

or add

```
"[package/name]": "dev-master"
```

to the require section of your `composer.json` file.


Required
--------

Update `config/main.php` (Yii2 advanced template) 
```

'bootstrap' => [
    ...
    'mrstroz\wavecms\example\Bootstrap'
    ...
],
'modules' => [
    ...
    'mrstroz\wavecms\example\Module'
    ...
],
    


```