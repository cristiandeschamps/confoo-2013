<?php

namespace ConFoo\Mess {

    class Token {

        /**
         * @var string
         */
        private $value;

        /**
         * @param string $username
         */
        public function __construct($username) {
            $this->value = sha1(uniqid($username, true));
        }

        public function __toString() {
            return $this->value;
        }

    }

}