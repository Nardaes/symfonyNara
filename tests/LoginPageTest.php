<?php
    namespace App\Tests\Controller;

    use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
    
    class LoginPageTest extends WebTestCase
    {
        public function testIndex()
        {
            $client = static::createClient();
            $client->request('GET', 'https://127.0.0.1/login');
    
            $this->assertResponseIsSuccessful();
            $this->assertSelectorTextContains('h2', 'Sign In');
        }



        public function TestLoginVraisubmission()
        {
            $client = static::createClient();
            $client->request('GET', '/login');
            $client->submitForm('loginB', [
                'email' => 'test@test.test',
                'password' => 'Test123?'

            ]);
            $this->assertResponseRedirects();
            $client->followRedirect();
            $this->assertSelectorExists('div:contains("surHome")');
        }

        public function TestLoginFauxsubmission()
        {
            $client = static::createClient();
            $client->request('GET', '/login');
            $client->submitForm('loginB', [
                'email' => 'test@test.test',
                'password' => 'Test12?'

            ]);
            $this->assertResponseRedirects();
            $client->followRedirect();
            $this->assertSelectorExists('div:contains("surlog")');
        }
    }