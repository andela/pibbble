<?php

class UserRegistrationTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    public function testNewUserRegistration()
    {
        $this->visit('/auth/register')
            ->type('opeyemiab', 'username')
            ->type('ope@yahoo.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
<<<<<<< HEAD
<<<<<<< HEAD
            ->press('submit')
            ->see('Check your mail box to confirm your email address.');
=======
            ->press('register')
            ->seePageIs('/auth/confirmemail');
>>>>>>> f563f96... [Pibbble][#108779138] Test Email Verification
=======
            ->press('submit')
            ->see('Check your mail box to confirm your email address.');
>>>>>>> 309eddb... [Pibbble][#108779138] Update Tests
    }

    public function testRegistrationAfterEmailValidation()
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 7d005a3... [Pibbble][#108779138] Add Email Verification to the registration process.
        $this->withSession(['_token' => '23eftyhsjeu7yfbhfijsuyhfuushbnu826h',
                            'username' => 'opeyemiab',
                            'email' => 'ope@yahoo.com',
                            'password' => bcrypt('123456'),
<<<<<<< HEAD
=======
        $this->withSession(['_token'=>'23eftyhsjeu7yfbhfijsuyhfuushbnu826h',
                            'username'=>'opeyemiab',
                            'email'=>'ope@yahoo.com',
                            'password'=> bcrypt('123456'),
>>>>>>> f563f96... [Pibbble][#108779138] Test Email Verification
=======
>>>>>>> 7d005a3... [Pibbble][#108779138] Add Email Verification to the registration process.
                            ])
            ->visit('/?_token=23eftyhsjeu7yfbhfijsuyhfuushbnu826h')
            ->see('opeyemiab');
    }
}
