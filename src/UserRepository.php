<?php

namespace ConFoo\Mess {

    interface UserRepository {

        public function saveUser(User $user);

        /**
         * @param $username
         *
         * @return ConFoo\Mess\User
         */
        public function findUserByUsername($username);


        /**
         * @param Token $token
         *
         * @return ConFoo\Mess\User
         */
        public function findUserByToken(Token $token);

    }

}