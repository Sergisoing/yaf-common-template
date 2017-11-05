<?php
/**
 * @name SampleModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author yangqinchuan
 */
class SampleModel extends Illuminate\Database\Eloquent\Model{

    protected $connection = 'default';
    protected $table = 'sample';

    public function selectSample() {
        return 'Hello World!';
    }

    public function insertSample($arrInfo) {
        return true;
    }
}
