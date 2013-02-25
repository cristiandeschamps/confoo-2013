<?php

namespace ConFoo\Mess {

    /**
     * Class Message
     *
     * @package ConFoo\Mess
     */class Message {

        /**
         * @var string
         */
        private $sender;

        /**
         * @var string
         */
        private $message;

        /**
         * @var \DateTime
         */
        private $createdAt;

        /**
         * @param string    $sender
         * @param string    $message
         * @param \DateTime $createdAt
         */
        public function __construct($sender, $message, \DateTime $createdAt) {
            $this->sender = $sender;
            $this->message = $message;
            $this->createdAt = $createdAt;
        }

        /**
         * @return string
         */
        public function getMessage() {
            return $this->message;
        }

        /**
         * @return string
         */
        public function getSender() {
            return $this->sender;
        }

        /**
         * @return \DateTime
         */
        public function getCreatedAt() {
            return $this->createdAt;
        }

    }

}