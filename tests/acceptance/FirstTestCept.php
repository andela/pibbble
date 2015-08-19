<?php
 
$I = new AcceptanceTester($scenario);
$I->wantTo('Check if the Home Page has "Laravel 5" in it');
 
$I->amOnPage('/');
$I->see('Laravel 5'); 
 
?>