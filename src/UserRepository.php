<?php

namespace ConFoo\Mess {

    interface UserRepository {

        public function saveUser(User $user);
        public function findUserByUsername($username);

    }

}