<?php

namespace ConFoo\Mess {

    class ServiceTest extends \PHPUnit_Framework_TestCase {

        /**
         * @var Service
         */
        private $service;

        /**
         * @var UserRepository
         */
        private $persistence;

        protected function setUp() {
            $this->persistence = $this->getMock('ConFoo\\Mess\\UserRepository');
            $this->service = new Service($this->persistence);
        }

        public function testNewUserCanBeRegistered() {
            $this->persistence->expects($this->once())
                              ->method('saveUser');
            $token = $this->service->registerUser('user', 'user@example.org');
            $this->assertInstanceOf('ConFoo\\Mess\\Token', $token);
        }

        /**
         * @expectedException ConFoo\Mess\InvalidUsernameException
         */
        public function testLengthOfUsernameMustBeAtLeastFour() {
            $token = $this->service->registerUser('123', 'user@example.org');
        }

    }

}


