<?php

namespace ConFoo\Mess {

    class UserPersistenceStub implements UserPersistence {

        private $users = array();

        public function saveUser(User $user) {
            $this->users[$user->getUsername()] = $user;
        }

        public function findUserByUsername($username) {
            if (!isset($this->users[$username])) {
                throw new PersistenceException("'$username' not found");
            }
            return $this->users[$username];
        }
    }

}
