<?php
/**
 * Created by PhpStorm.
 * User: yangqinchuan
 * Date: 2017/11/6
 * Time: 下午10:17
 */

class BaseController extends Yaf\Controller_Abstract {
    public $_layout = null;
    public function init() {
        $this->_layout = Yaf\Registry::get('layout');
    }
}