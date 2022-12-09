<?php

namespace App\Tests;


use PHPUnit\Framework\TestCase;
use App\PasswordChecker;

 class TestUnitaireTest extends TestCase
 {
    public function testPassword(): void
    {
        $pwd = new PasswordChecker("azertyuiop");


        $this->assertTrue($pwd->TestPwd());

        
    }
    public function testPasswordNon(): void
    {
        $pwd = new PasswordChecker("azertyu");


        $this->assertFalse($pwd->TestPwd());
        
    }
 }