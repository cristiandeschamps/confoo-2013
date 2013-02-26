<?php

namespace ConFoo\Mess {

    class Message {

        /**
         * @var User
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
         * @param User      $sender
         * @param string    $message
         * @param \DateTime $createdAt
         */
        public function __construct(User $sender, $message, \DateTime $createdAt = NULL) {
            $this->sender = $sender;
            $this->message = $message;
            if ($createdAt === NULL) {
                $createdAt = new \DateTime();
            }
            $this->createdAt = $createdAt;
        }

        /**
         * @return string
         */
        public function getMessage() {
            return $this->message;
        }

        /**
         * @return User
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