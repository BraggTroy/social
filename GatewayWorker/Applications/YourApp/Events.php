<?php
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * 用于检测业务代码死循环或者长时间阻塞等问题
 * 如果发现业务卡死，可以将下面declare打开（去掉//注释），并执行php start.php reload
 * 然后观察一段时间workerman.log看是否有process_timeout异常
 */
//declare(ticks=1);

use \GatewayWorker\Lib\Gateway;
use \GatewayWorker\Lib\Db;

/**
 * 主逻辑
 * 主要是处理 onConnect onMessage onClose 三个方法
 * onConnect 和 onClose 如果不需要可以不用实现并删除
 */
class Events
{
    /**
     * 当客户端连接时触发
     * 如果业务不需此回调可以删除onConnect
     *
     * @param int $client_id 连接id
     */
    public static function onConnect($client_id) {
        // 向当前client_id发送数据
        // Gateway::sendToClient($client_id, "$client_id");
        // 向所有人发送
        // Gateway::sendToAll("$client_id login\n");
    }

   /**
    * 当客户端发来消息时触发
    * @param int $client_id 连接id
    * @param mixed $message 具体消息
    */
   public static function onMessage($client_id, $message) {
        $db = Db::instance('db1');
        $m = json_decode($message, true);
        var_dump($m);
        if ($m['to']['type'] == 'setuid') {
            // 绑定uid
            Gateway::bindUid($client_id,$m['mine']['id']);
        }elseif($m['to']['type'] == 'friend') {
            $t = time();
            // 写入消息未读
            $db->insert('chat_not_read')->cols(array('userId'=>$m['to']['id'],'friendId'=>$m['mine']['id']))->query();
            // 已读消息记录，自己发的是已读
            $id = $db->insert('chat_record')->cols(array('userId'=>$m['mine']['id'],'friendId'=>$m['to']['id'],'content'=>$m['mine']['content'],'time'=>$t))->query();

            // 判断指定用户是否在线
            if (Gateway::isUidOnline($m['to']['id'])){
                $arr = [];
                $arr['emit'] = 'chatMessage';
                $arr['data'] = ['username'=>$m['mine']['username'], 'avatar'=>$m['mine']['avatar'], 'id'=>$m['mine']['id'], 'type'=>$m['to']['type'], 'content'=>$m['mine']['content'], 'cid'=>$id, 'mine'=>false, 'fromid'=>$m['mine']['id'], 'timestamp'=>$t];
                // 向指定用户发送
                Gateway::sendToUid($m['to']['id'], json_encode($arr));
            }
        }
        // 向所有人发送
        // Gateway::sendToAll("$client_id said ".$m->content);
   }

   /**
    * 当用户断开连接时触发
    * @param int $client_id 连接id
    */
   public static function onClose($client_id) {
       // 向所有人发送
    //    GateWay::sendToAll("$client_id logout");
   }
}
