#JQueryMobile

**This component inserts a JQueryMobile core scripts and theme into your
Yii Framework 1.x application.**

Author: Christian Salazar H. christiansalazarh@gmail.com

##Setup

+ register a new component into: protected/config/main.php
```
	'components'=>array(
		'class'=>'ext.jquerymobile.JQueryMobileComponent',
		'theme'=>'jqm-default.theme.min.css',  
		'autoload'=>true|false,  // the script insertion modality.
		// any available in extensions/jquerymobile/themes
	),
```
                                                                        
+ launch it at startup in your protected/config/main.php
```                                                                        
   	'init'=>array('jquerymobile'),
```

+ Usage is: 
```
	// if 'autoload' is false, then invoke scripts in any action or controller when required:
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

After setup, you have two choices, depending of the 'autoload' config entry:

###Autoload

When 'autoload' is false, you are required to make a explicit call
to any of this methods (above) by hand, as an example, for a specific 
action or controller. To keep things clear: suppose you dont want jqm
for your whole website actions and views, autoload=false is good for you.

When 'autoload' is true, the 'jquery.mobile.theme' components is automatically
invoked at startup, that is, the scripts are available for your whole website.

##Theming

+ Manage Themes: A predefined set of themes is available inside 'themes' directory of this
extension, you can add/remove themes from this directory, lets suppose
you have downloaded a new Theme from the [JQuery Mobile Theme Roller](http://themeroller.jquerymobile.com/):

	New Theme: **my-cool-jqm-theme.css**, please be aware that jquery mobile
	theme roller creates for you a ZIP file containing a lot of files, you
	don't need all of this files, you need only one of them: the css file.

	Copy it inside: 

	protected/extensions/jquerymobile/theme/my-cool-jqm-theme.css

+ Theme Selection:  You can control which of this themes should be used in
your application by specifying it in the config entry:

```
	'components'=>array(                                          
		'class'=>'ext.jquerymobile.JQueryMobileComponent',
		'theme'=>'my-cool-jqm-theme.css',
		'autoload'=>true,
	),
```

##About jQueryMobile

This links put you in touch with this beautifull framework.

* [Getting Started on jQueryMobile](http://demos.jquerymobile.com/1.2.1/docs/about/getting-started.html)
* [JQuery Mobile Theme Roller](http://themeroller.jquerymobile.com/)
