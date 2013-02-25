<?php

namespace ConFoo\Mess {

    class Service implements API {

        /**
         * Creates a new user account and
         * returns a unique authentication token
         *
         * @param string $username
         * @param string $email
         *
         * @throws UsernameUnavailableException
         * @throws InvalidEmailException
         *
         * @return string Token
         */
        public function registerUser($username, $email) {
            // TODO: Implement registerUser() method.
        }

        /**
         * @param string $token
         * @param string $recipient Username
         * @param string $message
         *
         * @throws InvalidTokenException
         * @throws NotAuthorizedException
         * @throws InvalidUsernameException
         * @throws InvalidMessageException
         *
         * @return null
         */
        public function postMessage($token, $recipient, $message) {
            // TODO: Implement postMessage() method.
        }

        /**
         * @param string $token
         *
         * @return array of Message
         */
        public function retrieveMessages($token) {
            // TODO: Implement retrieveMessages() method.
        }

    }

}
