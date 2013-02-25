<?php

namespace ConFoo\Mess {


    class TokenTest extends \PHPUnit_Framework_TestCase {

        public function testTokenHasCorrectLength() {
            $token = new Token('username');
            $this->assertEquals(40, strlen($token));
        }
    }

}