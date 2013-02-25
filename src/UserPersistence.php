<?php

namespace ConFoo\Mess {

    interface UserPersistence {

        public function saveUser(User $user);
        public function findUserByUsername($username);

    }

}