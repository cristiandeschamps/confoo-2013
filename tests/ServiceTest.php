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
        private $repository;

        protected function setUp() {
            $this->repository = $this->getMock('ConFoo\\Mess\\UserRepository');
            $this->service = new Service($this->repository);
        }

        public function testNewUserCanBeRegistered() {
            $this->repository->expects($this->once())
                              ->method('saveUser');
            $token = $this->service->registerUser('user', 'user@example.org');
            $this->assertInstanceOf('ConFoo\\Mess\\Token', $token);
        }

        /**
         * @expectedException RuntimeException
         */
        public function testRegisterUserThrowsExceptionWhenSavingUserFails() {
            $this->repository->expects($this->once())
                ->method('saveUser')
                ->will($this->throwException(new UserRepositoryException('failed')));
            $this->service->registerUser('user', 'user@example.org');
        }

        /**
         * @expectedException ConFoo\Mess\InvalidUsernameException
         */
        public function testLengthOfUsernameMustBeAtLeastFour() {
            $token = $this->service->registerUser('123', 'user@example.org');
        }

        public function testMessageCanBePostedToExistingUser() {
            $sender = $this->getMockBuilder('ConFoo\\Mess\\User')
                           ->disableOriginalConstructor()
                           ->getMock();

            $recipient = $this->getMockBuilder('ConFoo\\Mess\\User')
                              ->disableOriginalConstructor()
                              ->getMock();
            $recipient->expects($this->once())
                      ->method('addMessage');

            $this->repository->expects($this->any())
                             ->method('findUserByToken')
                             ->will($this->returnValue($sender));
            $this->repository->expects($this->any())
                             ->method('findUserByUsername')
                             ->will($this->returnValue($recipient));

            $this->service->postMessage(new Token('validSender'), 'recipientUser', 'the Message!');
        }

        public function testMessagesCanBeRetrieved() {
            $messages = array(
                $this->getMockBuilder('ConFoo\\Mess\\Message')
                     ->disableOriginalConstructor()
                     ->getMock()
            );

            $user = $this->getMockBuilder('ConFoo\\Mess\\User')
                         ->disableOriginalConstructor()
                         ->getMock();
            $user->expects($this->any())
                 ->method('getMessages')
                 ->will($this->returnValue($messages));

            $this->repository->expects($this->any())
                ->method('findUserByToken')
                ->will($this->returnValue($user));

            $result = $this->service->retrieveMessages(new Token('user'));
            $this->assertSame($messages, $result);
        }

    }

}


