<?php

namespace ConFoo\Mess {

    class User {

        /**
         * @var string
         */
        private $username;

        /**
         * @var string
         */
        private $email;

        /**
         * @var Token
         */
        private $token;

        /**
         * @var Message[]
         */
        private $messages = array();

        public function __construct($username, $email, Token $token) {
            $this->username = $username;
            $this->email = $email;
            $this->token = $token;
        }

        /**
         * @return string
         */
        public function getEmail() {
            return $this->email;
        }

        /**
         * @return \ConFoo\Mess\Token
         */
        public function getToken() {
            return $this->token;
        }

        /**
         * @return string
         */
        public function getUsername() {
            return $this->username;
        }


        public function addMessage(Message $message) {
            $this->messages[] = $message;
        }

    }

}
