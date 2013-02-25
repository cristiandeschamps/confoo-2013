<?php

namespace ConFoo\Mess {

    class UserPersistenceStubTest extends \PHPUnit_Framework_TestCase {

        /**
         * @var UserPersistence
         */
        private $persistence;

        protected function setUp() {
            $this->persistence = new UserPersistenceStub();
        }

        public function testUserCanBePersisted() {
            $user = new User('username','email', new Token('username'));
            $this->persistence->saveUser($user);

            $retrievedUser = $this->persistence->findUserByUsername('username');
            $this->assertEquals($user, $retrievedUser);
        }
    }

}


