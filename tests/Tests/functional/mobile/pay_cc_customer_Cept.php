<?php 
$upoint = basename(__DIR__) ;

$_GET['customer'] = true;
$I = new FunctionalTester($scenario);
// Customer

$I->wantTo('Ensure that pay_cc template is works using customer');
$I->amOnPage('/pay/'.$upoint, array('customer' => true)); 
$I->seeResponseCodeIs(200);

$I->seeElement("input[name=context]");
$I->seeElement("input[name=Phone]");
$I->seeElement("input[name=Pan]");
$I->seeElement("input[name=CardholderName]");
$I->seeElement("input[name=Email]");

$I->wantTo('Ensure that CVC2/CVV2 field is exists and have type=password');
$I->seeElement("input",['name' => 'Cvc2','type'=>'password']);

$I->seeElement("select[name=ExpMonth]");
$I->seeElement("select[name=ExpYear]");
$I->seeElement("#chSaveCard");

$I->see("Оплатить","button[type=submit]");
$I->seeElement("button#btnBack");