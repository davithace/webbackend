<?php

	$ch = curl_init(); 
	$timeout = 5; 
	$url="http://www.baidu.com";
	curl_setopt ($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_HEADER, 0); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
	$contents = curl_exec($ch);
	echo $contents;

/*
	
//���ȼ���Ƿ�֧��curl
if (!extension_loaded("curl")) {   
trigger_error("�Բ����뿪��curl����ģ�飡", E_USER_ERROR);
}
//����xml
$xmldata="<?xml version='1.0' encoding='UTF-8'?><group><name>����</name><age>22</age></group>";
//��ʼһ��curl�Ự
$curl = curl_init();
//����url
curl_setopt($curl, CURLOPT_URL,"http://localhost/dealxml.php");
//���÷��ͷ�ʽ��
postcurl_setopt($curl, CURLOPT_POST, true);
//���÷�������
curl_setopt($curl, CURLOPT_POSTFIELDS, $xmldata);
//ץȡURL���������ݸ������
//$contents=curl_exec($curl);
curl_exec($curl);
//�ر�cURL��Դ�������ͷ�ϵͳ��Դ
curl_close($curl);
*/

?>