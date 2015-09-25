<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'MUSTERFIRMA',
    //'theme'=>'bootstrap2',
    //Available layouts for Bootstrap v2.3.2 :starter,hero,fluid,carousel,justified-nav,marketing-narrow. (uncomment 'theme'=>'bootstrap2' to use these).
    // Available layouts for Bootstrap v3.0.0 :starter-template,offcanvas,carousel,justified-nav,jumbotron,jumbotron-narrow.
    'layout' => 'jumbotron',

    // preloading 'log' component
    'preload' => array(
        'log',
		'tstranslation',
		'config',
        'input', //Filter
        'bootstrap', // preload the bootstrap component,comment this out if you don't use bootstrap2 theme.
        //(Yiistrap and YiiWheels work with bootstrap 2).
    ),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.bootstrap.components.*',
        'application.extensions.bootstrap.helpers.TbHtml',
        //DEBUGGING STUFF
        'application.vendors.FirePHPCore.FirePHP',
        'application.vendors.FirePHPCore.FB',
    ),
    'aliases' => array(
        //yiistrap
       // 'bootstrap' => realpath(__DIR__ ..'extensions.bootstrap'),	
        // yiiwheels configuration
        'yiiwheels' => 'webroot.protected.extensions.yiiwheels'
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
		/*
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1',
            'generatorPaths' => array(
                'bootstrap.gii'
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
           // 'ipFilters' => array('127.0.0.1', '::1'),
        ),
		*/

    ),


    /**
     * Add controller map for `tstranslation`
     */

	 'controllerMap' => array(
        'tstranslation' => 'tstranslation.controllers.TsTranslationController'
    ),
 


 /********** START OF COMPONENTS ********************/
    'components' => array(
	
		'config' => array(
          'class' => 'application.components.Config',
         //   'cache'=>3600,
       ),
		
		'image'=>array(
			'class'=>'application.extensions.image.CImageComponent',
                            // GD or ImageMagick
			'driver'=>'GD',
		),
				
		'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        //email
        'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
        ),

        //filter,security
        'input' => array(
            'class' => 'CmsInput',
            'cleanPost' => true,
            'cleanGet' => true,
            'cleanMethod' => 'stripClean'
        ),
        // yiistrap configuration
        'bootstrap' => array(
            'class' => 'application.extensions.bootstrap.components.KTbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false,
            'rules' => array(
                'site/page/<view:\w+>' => 'site/page/',
				'login' => 'site/login',
				'page/<shortText>'=> '/page/page',
				'page/<id:\d+>'=> '/page/view',
				'p/<shortText:\w+>'=> array('/page/page','urlSuffix'=>'.htm','caseSensitive'=>false),
				//'p/<shortText:.*>'=> array('/page/page','urlSuffix'=>'.htm','caseSensitive'=>false),
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
			
			
			
            /**
            * Set `urlManager` class
            */
            'class' => 'TsUrlManager',
 
            /**
             * Set `showLangInUrl` parameter (NOT REQUIRED),
             *
             * AVAILABLE VALUES:
             * - `true` means language code shows in url. Example: .../mysite/en/article/create
             * - `false` means language code not shows in url. Example: .../mysite/article/create
             * DEFAULT VALUE: `true`
            */
            'showLangInUrl' => true,
 
            /**
             * Set `prependLangRules` parameter (NOT REQUIRED),
             * this parameter takes effect only if `showLangInUrl` parameter is `true`.
             * It strongly recomended to add language rule to `rules` parameter handly
             *
             * AVAILABLES VALUES:
             * - `true` means automaticly prepends `_lang` parameter before all rules.
             *      Example: '<_lang:\w+><controller:\w+>/<id:\d+>' => '<controller>/view',
             * - `false` means `_lang` parameter you must add handly
             * DEFAULT VALUE: `true`
            */
            'prependLangRules' => true,
 
            /******************************/

        ),

        /*'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),*/

        'db' =>    array(       //SERVER
            'class' => 'CDbConnection',
								'connectionString' => 'mysql:host=localhost;dbname=yiicms',
								'username' => 'root',
								'password' => '',
								'charset' => 'UTF8',
								'tablePrefix' => '',
								'emulatePrepare' => true,
                               //   'enableProfiling' => true,
                              'schemaCacheID' => 'cache',
                             'schemaCachingDuration' => 3600
                                              ),

		
        'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
        'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
        'clientScript' => array(
			'class' => 'CClientScript',
			'scriptMap' => array(
				//don't allow the framework to load jQuery,we load it manually,(see components/Controller.php).
				'jquery.js' => false,
				//'jquery.min.js' => false
			),
			'coreScriptPosition' => CClientScript::POS_END,
		),




 
        /**
         * Add `tstranslation` component
         */
        'tstranslation'=>array(
            /**
            * Set `tstranslation` class
            */
            'class' => 'ext.tstranslation.components.TsTranslation',
 
            /**
             * Set `accessRules` parameter (NOT REQUIRED),
             * parameter effects to dynamic content translation and language managment
             *
             * AVAILABLE VALUES:
             * - '*' means all users
             * - '@' means all registered users
             * - `username`. Example: 'admin' means Yii::app()->user->name === 'admin'
             * - `array of usernames`. Example: array('admin', 'manager') means in_array(array('admin', 'manager'), Yii::app()->user->name)
             * - your custom expression. Example: array('expression' => 'Yii::app()->user->role === "admin"')
             * DEFAULT VALUE: '@'
            */
            'accessRules' => '@',
 
            /**
             * Set `languageChangeFunction` (NOT REQUIRED),
             * function processing language change
             *
             * AVAILABLE VALUES:
             * - `true` means uses extension internal function (RECOMENDED)
             * - `array()` means user defined function. Example: array('TestClass', 'testMethod'), 'TestClass' and 'testMethod' must be exist and imported to project
             * DEFAULT VALUE: `true`
            */
            'languageChangeFunction' => true,
        ),
 

        /**
         * Add `messages` component
         */
        'messages' => array(
            /**
            * Set `messages` class
            */
            'class' => 'TsDbMessageSource',
 
            /**
            * Set `Missing Messages` translation action
            */
            'onMissingTranslation' => array('TsTranslation', 'addTranslation'),
 
            /**
             * Set `notTranslatedMessage` parameter (NOT REQUIRED),
             *
             * AVAILABLE VALUES:
             * - `false / null` means nothing shows if message translation is empty
             * - `text` means shows defined text if message translation is empty.
             *      Example: 'Not translated data!'
             * DEFAULT VALUE: `null`
            */
           'notTranslatedMessage' => 'Not translated data!',
 
            /**
             * Set `ifNotTranslatedShowDefault` parameter (NOT REQUIRED),
             *
             * AVAILABLE VALUES:
             * - `false` means shows `$this->notTranslatedMessage` if message translation is empty
             * - `true` means shows default language translation if message translation is empty.
             * DEFAULT VALUE: `true`
            */
            'ifNotTranslatedShowDefault' => false,
 
        ),
		
		// Minify JS/CSS Files
		
		'clientScript'=> array(
		   'class' => 'application.extensions.yii-EClientScript.EClientScript',
		   'combineScriptFiles' => true, // By default this is set to true, set this to true if you'd like to combine the script files
		   'combineCssFiles' => true, // By default this is set to true, set this to true if you'd like to combine the css files
		   'optimizeScriptFiles' => false, // @since: 1.1
		   'optimizeCssFiles' => false, // @since: 1.1
		   'optimizeInlineScript' => false, // @since: 1.6, This may case response slower
		   'optimizeInlineCss' => false, // @since: 1.6, This may case response slower
			),		
			
 
    ), /********** END OF COMPONENTS ********************/
 
    /**
    * Set `language` and `sourceLanguage` (NOT REQUIRED)
    */
    'language' => 'en',
    'sourceLanguage' => 'en',
 
    /******************************/






 // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
		'fromEmail' => 'admin@gmail.com',
		'replyEmail' => 'reply-to@gmail.com',
		'myEmail' => '[MY  EMAIL]',
		'gmail_password' => 'MY  GMAIL PASSWORD',
		'recaptcha_private_key' => '', // captcha will not work without these keys!
		'recaptcha_public_key' => '', //http://www.google.com/recaptcha
		'contactRequireCaptcha' => true,
		
		'pageTitle'=>'Site Title',
        'pageDesc'=>'Site Tagline as Description',

		//Choose Bootswatch skin.'none' means default bootstrap theme.See http://bootswatch.com/
		//Options for Bootstrap2:(make sure you have 'theme'=>'bootstrap2' in this file.)
		//none,amelia,cerulean,cosmo,cyborg,flatly,journal,readable,simplex,slate,spacelab,spruce,superhero,united
		'bootswatch2_skin' => 'none',

		//Options for Bootstrap3:(no theme specified,default view files from protected/views are used)
		//none,amelia,cerulean,cosmo,cyborg,flatly,journal,readable,simplex,slate,spacelab,united
		'bootswatch3_skin' => 'none',

		//render a form to try out layouts and skins.
		'render_switch_form' => true
	),
);