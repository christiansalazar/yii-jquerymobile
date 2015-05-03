#JQueryMobile

**This component inserts a JQueryMobile core scripts and theme into your
Yii Framework 1.x application.**

Author: Christian Salazar H. christiansalazarh@gmail.com

##Setup

1. register a new component into: protected/config/main.php
```
	'components'=>array(
		'class'=>'application.extensions.JQueryMobileComponent',
		'theme'=>'jqm-default.theme.min.js',  
		// any available in extensions/jquerymobile/themes
	),
```
                                                                        
2. launch it at startup in your protected/config/main.php
                                                                        
   	'init'=>array('jquerymobile'),

3. Usage is: 
```
	// call it in any action or controller when required:
	Yii::app()->clientscript->registerCoreScript("jquery.mobile.theme");
```

##Extras

The "jquery" and "jquery.mobile" core packages has been updated, now each
of them points its core files to this extension, inside 'assets' directory.

That implies, if you activate this extension then whenever you invokes a
'jquery' core script, its script path will point to a core script inside
this extension.

##Usage

After implementing this extension by following the Setup steps described at 
the top of this readme file, you'll find this new/updated packages:

+ The jQuery, insert only jQuery.

        Yii::app()->clientscript->registerCoreScript("jquery");

+ The JQuery Mobile, will insert the jquery.mobile JS script and jQuery.

        Yii::app()->clientscript->registerCoreScript("jquery.mobile");

+ The JQuery Mobile Theme, will insert a Theme.

        Yii::app()->clientscript->registerCoreScript("jquery.mobile.theme");

So, after setup your extension you should be able to make a explicit call
to any of this methods (above), please don't call all of them at the same time,
the assets mechanism is sufficient smart to determine the dependencies, 
that is, if you call 'jquery.mobile.theme' it depends on 'jquery.mobile', 
which also depends on 'jquery'.



