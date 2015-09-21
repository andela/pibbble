<?php
$I = new FunctionalTester($scenario);
$I->wantTo('log in to site');
$I->amOnPage('/users/register');
$I->amOnPage('/users/login');
$I->amOnPage('/users/logout');
