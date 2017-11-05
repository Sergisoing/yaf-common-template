# Yaf-common-template
Yaf + composer 公共模板， 方便快速创建项目

### Eloquent ORM
1. 在Models中使用
```
// define
class SampleModel extends Illuminate\Database\Eloquent\Model{

}

//useage
$sampleFirstRow = SampleModel::first();
```
2. 不通过Model使用，直接使用
```
use Illuminate\Database\Capsule\Manager as DB;
DB::connection('connetion')->table('table')->select('name')->get();
```

关于该提示：
```
Warning: Yaf\Loader::autoload(): Failed opening script /usr/local/var/www/self/yaf-common-template/application/library/Doctrine/DBAL/Driver/PDOConnection.php: No such file or directory in /usr/local/var/www/self/yaf-common-template/vendor/illuminate/database/Connectors/Connector.php on line 63
```
处理办法：
1. 在/usr/local/var/www/self/yaf-common-template/vendor/illuminate/database/Connectors/Connector.php line 63 前面加@
2. 在/usr/local/var/www/self/yaf-common-template/vendor/illuminate/database/Connectors/Connector.php 删除63 - 65行
3. 安装一下这个包dbal（不推荐）