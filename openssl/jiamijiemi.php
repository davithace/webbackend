<?php    
$privkeypass = '111111'; //˽Կ����    
$pfxpath = "./test.pfx"; //��Կ�ļ�·��    
$priv_key = file_get_contents($pfxpath); //��ȡ��Կ�ļ�����    
$data = "test"; //�������ݲ���test    
     
//˽Կ����    
openssl_pkcs12_read($priv_key, $certs, $privkeypass); //��ȡ��Կ��˽Կ    
$prikeyid = $certs['pkey']; //˽Կ    
openssl_sign($data, $signMsg, $prikeyid,OPENSSL_ALGO_SHA1); //ע�����ɼ�����Ϣ    
$signMsg = base64_encode($signMsg); //base64ת�������Ϣ    
     
     
//��Կ����    
$unsignMsg=base64_decode($signMsg);//base64���������Ϣ    
openssl_pkcs12_read($priv_key, $certs, $privkeypass); //��ȡ��Կ��˽Կ    
$pubkeyid = $certs['cert']; //��Կ    
$res = openssl_verify($data, $unsignMsg, $pubkeyid); //��֤    
echo $res; //�����֤�����1����֤�ɹ���0����֤ʧ��    
?>  