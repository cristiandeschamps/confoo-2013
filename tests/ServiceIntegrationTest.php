<?php

namespace ConFoo\Mess {

    class ServiceIntegrationTest extends \PHPUnit_Framework_TestCase {

        public function testUserCanSendMessageToAnotherUser() {
            $userRepository = new InMemoryUserRepository();
            $service = new Service($userRepository);

            $senderToken = $service->registerUser('sender', 'sender@example.org');
            $recipientToken = $service->registerUser('recipient', 'recipient@example.org');

            $message = 'A Testmessage!';
            $service->postMessage($senderToken, 'recipient', $message);

            $messages = $service->retrieveMessages($recipientToken);

            $this->assertInternalType('array', $messages);
            $this->assertCount(1, $messages);
            $this->assertEquals($message, $messages[0]->getMessage());

        }
    }

}
