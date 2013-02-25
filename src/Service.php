<?php

namespace ConFoo\Mess {

    class Service implements API {

        /**
         * @var UserPersistence
         */
        private $persistence;

        /**
         * @param UserPersistence $persistence
         */
        public function __construct(UserPersistence $persistence) {
            $this->persistence = $persistence;
        }

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
        public function registerUser($username, $email) {
            if (strlen($username) < 4) {
                throw new InvalidUsernameException("'$username' is too short");
            }
            $token = new Token($username);

            try {
                $this->persistence->saveUser(new User($username, $email, $token));
                return $token;
            } catch (PersistenceException $e) {
                throw new \RuntimeException('...', 0, $e);
            }

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
