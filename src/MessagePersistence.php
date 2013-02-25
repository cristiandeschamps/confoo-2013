<?php
/**
 * Created by JetBrains PhpStorm.
 * User: theseer
 * Date: 2/25/13
 * Time: 4:24 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ConFoo\Mess;


interface MessagePersistence {

    public function saveMessage($recipient, $message);

}