<?php
	/*������׿apk���е�ѹ��XML�ļ�����ԭ�Ͷ�ȡXML����
	�������ܣ���ҪPHP��ZIP������֧�֡�*/
	include('./Apkparser.php');
	$appObj  = new Apkparser(); 
	$targetFile = "./b.apk";//apk���ڵ�·����ַ
	$res   = $appObj->open($targetFile);
	echo $appObj->getAppName()."</br>";     // Ӧ������
	echo  $appObj->getPackage()."</br>";     // Ӧ�ð���
	echo $appObj->getVersionName()."</br>";   // �汾����
	echo $appObj->getVersionCode()."</br>";   // �汾����
?>