<?php  
	/** 
	* User: xishizhaohua@qq.com 
	* Date: 14-11-29 
	* Time: ����10:27 
	*/  
	  
	/** 
	* ��Կ�ļ���·�� 
	*/  
	

	 
	$privateKeyFilePath = 'rsa_private_key.pem';  
	/** 
	* ��Կ�ļ���·�� 
	*/  
	$publicKeyFilePath = 'rsa_public_key.pem';  
	extension_loaded('openssl') or die('php��Ҫopenssl��չ֧��');  
	(file_exists($privateKeyFilePath) && file_exists($publicKeyFilePath))  or die('��Կ���߹�Կ���ļ�·������ȷ');  
	/** 
	* ����Resource���͵���Կ�������Կ�ļ����ݱ��ƻ���openssl_pkey_get_private��������false 
	*/  
	
	$privateKey = openssl_pkey_get_private(file_get_contents($privateKeyFilePath));  
	
	if(openssl_sign('hello', $out, $privateKey))
		var_dump(base64_encode($out));
	die;
	
	/** 
	* ����Resource���͵Ĺ�Կ�������Կ�ļ����ݱ��ƻ���openssl_pkey_get_public��������false 
	*/  
	$publicKey = openssl_pkey_get_public(file_get_contents($publicKeyFilePath));  
	($privateKey && $publicKey) or die('��Կ���߹�Կ������');  
	/** 
	* ԭ���� 
	*/  
	$originalData = '�ҵ��ʺ���:shiki,������:matata';  
	/** 
	* �����Ժ�����ݣ���������·�ϴ��� 
	*/  
	$encryptData = '';  
	echo 'ԭ����Ϊ:', $originalData, PHP_EOL;  
	  
	///////////////////////////////��˽Կ����////////////////////////  
	if (openssl_private_encrypt($originalData, $encryptData, $privateKey)) 
	{  
		/** 
		 * ���ܺ� ����base64_encode�󷽱�����ַ�д��� ���ߴ�ӡ  �����ӡΪ���� 
		 */  
		echo '���ܳɹ������ܺ�����(base64_encode��)Ϊ:', base64_encode($encryptData), PHP_EOL;  
	  
	} else {  
		die('����ʧ��');  
	}  
	  
	  
	///////////////////////////////�ù�Կ����////////////////////////  
	  
	/** 
	* �����Ժ������ 
	*/  
	$decryptData ='';  
	  
	if (openssl_public_decrypt($encryptData, $decryptData, $publicKey)) 
	{  
		echo '���ܳɹ������ܺ�����Ϊ:', $decryptData, PHP_EOL;    
	} else {  
		die('���ܳɹ�');  
	}  
?>