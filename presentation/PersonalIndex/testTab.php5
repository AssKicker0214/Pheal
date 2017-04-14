<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2015/11/12
 * Time: 22:10
 */require_once($_SERVER['DOCUMENT_ROOT'] . "/businesslogic/messagebl/MessageBL.php5");
            require_once("../tool/Builder.php5");
            $messages = getAllMessages($_COOKIE['userid']);
            foreach ($messages as $message) {
                $tile = new MessageTile($message['SENDER'], $message['RECIPIENT'], $message['CONTENT'], $message['TIME'], $message['STATUS'], $message['TITLE'], $message['MSGID']);
                $tile->makeTile();
            }
