<?php

namespace ConFoo\Mess {

    class InMemoryUserRepository implements UserRepository {

        private $users = array();

        public function saveUser(User $user) {
            $this->users[$user->getUsername()] = $user;
        }

        /**
         * @param $username
         *
         * @throws UserRepositoryException
         *
         * @return ConFoo\Mess\User
         */
        public function findUserByUsername($username) {
            if (!isset($this->users[$username])) {
                throw new UserRepositoryException("'$username' not found");
            }
            return $this->users[$username];
        }

        /**
         * @param Token $token
         *
         * @return ConFoo\Mess\User
         */
        public function findUserByToken(Token $token) {
            foreach($this->users as $user) {
                /** @var $user User */
                if ($user->getToken() == $token) {
                   return $user;
                }
            }
            throw new UserRepositoryException("No user with token '$token' found");
        }

    }

}
