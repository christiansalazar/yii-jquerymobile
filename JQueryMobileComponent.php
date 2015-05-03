<?php
/**
 * JQueryMobileComponent 
 *
 *	Insert a JQuery Mobile Theme and Script into your application.
 *
 *	Usage:
 *
 	1. register a new component into: protected/config/main.php

 			'components'=>array(
				'class'=>'application.extensions.JQueryMobileComponent',
				'theme'=>'jqm-default.theme.min.js',  
					// any available in extensions/jquerymobile/themes
			),

	2. launch it at startup.

			'init'=>array(..., 'jquerymobile'),
 *
 *
 *
 * @uses CApplicationComponent
 * @author Cristian Salazar H. <christiansalazarh@gmail.com> @salazarchris74 
 * @license FreeBSD {@link http://www.freebsd.org/copyright/freebsd-license.html}
 */
class JQueryMobileComponent extends CApplicationComponent {
	public $theme = 'jqm-default.theme.min.css'; // stored in ./themes
	public function init(){
		$this->publishAssets();
	}
	private function publishAssets(){
		$localAssetsDir = dirname(__FILE__) . '/assets';
		$localThemesDir = dirname(__FILE__) . '/themes';
		$assets = Yii::app()->getAssetManager()->publish($localAssetsDir);
		echo "\nTHIS_ASSET_DIR: {$assets}\n\n";
        $cs = Yii::app()->getClientScript();
		$cs->corePackages=require(YII_PATH.'/web/js/packages.php');
		// now process js files, by fixing path, moving them to this component
		
		$jquery = &$cs->corePackages['jquery'];
		$jquert['basePath'] = $localAssetsDir."/jquery.min.js";
		$jquery['baseUrl'] = $assets;
		$jquery['js'] = array('jquery.min.js');
		
		$jqm = &$cs->corePackages['jquery.mobile'];
		$jqm['basePath'] = $localAssetsDir."/jqm.min.js";
		$jqm['baseUrl'] = $assets;
		$jqm['js'] = array('jqm.min.js');
		$jqm['depends'] = array('jquery');

		$jqmt = &$cs->corePackages['jquery.mobile.theme'];
		$jqmt['basePath'] = $localThemesDir."/".$this->theme;
		$jqmt['baseUrl'] = $assets;
		$jqmt['css'] = array($this->theme);
		$jqmt['depends'] = array('jquery.mobile');

		// now, we can proceed as regular
		// $cs->registerCoreScript("jquery.mobile.theme");
	}
}
