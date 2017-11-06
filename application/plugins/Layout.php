<?php
/**
 * Created by PhpStorm.
 * User: yangqinchuan
 * Date: 2017/11/6
 * Time: 下午9:26
 */

class LayoutPlugin extends Yaf\Plugin_Abstract{
    protected $layoutFile = '';
    protected $layoutDir = '';
    protected $layoutVars = [];

    public function __construct($layoutFile, $layoutDir = '') {
        $this->layoutFile = $layoutFile;
        $this->layoutDir = $layoutDir ? $layoutDir : APPLICATION_PATH . '/application/views';
    }

    public function __set($key, $value) {
        $this->layoutVars[$key] = $value;
    }

    public function postDispatch(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response) {
        $originBody = $response->getBody();
        // Clear Body
        $response->clearBody();
        $layout = new Yaf\View\Simple($this->layoutDir);
        $layout->content = $originBody;
        $layout->assign('layout', $this->layoutVars);
        $response->setBody($layout->render($this->layoutFile));
    }
}