<?php

namespace ConFoo\Mess {

    class MessagePersistenceStub implements MessagePersistence {

        private $messages = array();

        public function saveMessage($recipient, $message) {
            $this->messages[] = $message;
        }

    }

}
