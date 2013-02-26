<?php

namespace ConFoo\Mess {

    interface API {

        /**
         * Creates a new user account and
         * returns a unique authentication token
         *
         * @param string $username
         * @param string $email
         *
         * @throws UsernameUnavailableException
         * @throws InvalidUsernameException
         * @throws InvalidEmailException
         *
         * @return string Token
         */
        public function registerUser($username, $email);

        /**
         * @param Token $token
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
        public function postMessage(Token $token, $recipient, $message);

        /**
         * @param Token $token
         *
         * @return array of Message
         */
        public function retrieveMessages(Token $token);

    }

}
