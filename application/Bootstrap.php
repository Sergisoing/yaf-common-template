<?php

use Illuminate\Database\Capsule\Manager as Capsule;
/**
 * @name Bootstrap
 * @author yangqinchuan
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf\Bootstrap_Abstract {

    public function _initConfig() {
		//把配置保存起来
		$arrConfig = Yaf\Application::app()->getConfig();
		Yaf\Registry::set('config', $arrConfig);
	}

    public function _initDatabaseORM(Yaf\Dispatcher $dispatcher) {
        $capsule = new Capsule;
        $appConfig = Yaf\Application::app()->getConfig();
        foreach ($appConfig->database as $connectionName => $dbConfig) {
            $capsule->addConnection([
            'driver'    => $dbConfig['driver'] ?? 'mysql',
            'host'      => $dbConfig['host'],
            'database'  => $dbConfig['database'],
            'username'  => $dbConfig['username'],
            'password'  => $dbConfig['password'],
            'charset'   => $dbConfig['charset'] ?? 'utf8',
            'prefix'    => $dbConfig['prefix']
            ], $connectionName);
        }
        $capsule->bootEloquent();
    }

	public function _initPlugin(Yaf\Dispatcher $dispatcher) {
		//注册布局插件
		$layoutPlugin = new LayoutPlugin('layout.phtml');
        Yaf\Registry::set('layout', $layoutPlugin);
        $dispatcher->registerPlugin($layoutPlugin);
	}

	public function _initRoute(Yaf\Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
	}
	
	public function _initView(Yaf\Dispatcher $dispatcher) {
		//在这里注册自己的view控制器，例如smarty,firekylin
	}
}
