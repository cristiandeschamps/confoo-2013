<?php

namespace ConFoo\Mess {

    class Message {

        /**
         * @var User
         */
        private $sender;

        /**
         * @var User
         */
        private $recipient;

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
         * @param User      $recipient
         * @param string    $message
         * @param \DateTime $createdAt
         */
        public function __construct(User $sender, User $recipient, $message, \DateTime $createdAt = NULL) {
            $this->sender = $sender;
            $this->recipient = $recipient;
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
         * @return User
         */
        public function getRecipient() {
            return $this->recipient;
        }

        /**
         * @return \DateTime
         */
        public function getCreatedAt() {
            return $this->createdAt;
        }

    }

}