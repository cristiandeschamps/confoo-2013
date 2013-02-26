<?php

namespace ConFoo\Mess {

    class InMemoryUserRepository implements UserRepository {

        private $users = array();

        public function saveUser(User $user) {
            $this->users[$user->getUsername()] = $user;
        }

        public function findUserByUsername($username) {
            if (!isset($this->users[$username])) {
                throw new UserRepositoryException("'$username' not found");
            }
            return $this->users[$username];
        }
    }

}
