<?php

require_once 'PopbillMessaging.php';

$PartnerID = 'TESTER';
$SecretKey = 'okH3G1/WZ3w1PMjHDLaWdcWIa/dbTX3eGuqMZ5AvnDE=';


$MessagingService = new MessagingService($PartnerID,$SecretKey);

$MessagingService->IsTest(true);

try {
	echo $MessagingService->GetUnitCost('1231212312',ENumMessageType::SMS);
}
catch(PopbillException $pe) {
	echo $pe->getMessage();
}
echo chr(10);
/*
try {
	
	$Messages = array();
	
	
	$Messages[] = array(
		'snd' => '07075106766',
		'rcv' => '11112222',
		'rcvnm' => '수신자성명',
		'msg'	=> '개별 메시지 내용'
	);
	
	$Messages[] = array(
		'snd' => '07075106766',
		'rcv' => '11112222',
		'rcvnm' => '수신자성명',
		'msg'	=> '개별 메시지 내용'
	);
	
	
	$ReserveDT = null; //예약전송시 예약시간 yyyyMMddHHmmss 형식
	$UserID = 'userid'; //팝빌 사용자 아이디
	
	echo $MessagingService->SendSMS('1231212312','01041680206','내용내용',$Messages,$ReserveDT,$UserID);
}
catch(PopbillException $pe) {
	echo $pe->getCode().' : '.$pe->getMessage();
}
echo chr(10);
*/

$ReceiptNum = '014042114000000001';

try {
	$result = $MessagingService->GetMessages('1231212312',$ReceiptNum,'userid');
	echo json_encode($result,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
catch(PopbillException $pe) {
	echo $pe->getMessage();
}
echo chr(10);


try {
	$result = $MessagingService->CancelReserve('1231212312',$ReceiptNum,'userid');
	echo $result;
}
catch(PopbillException $pe) {
	echo $pe->getMessage();
}
echo chr(10);

try {
	$result = $MessagingService->GetURL('1231212312','userid','BOX');
	echo $result;
}
catch(PopbillException $pe) {
	echo $pe->getMessage();
}
echo chr(10);


?>
