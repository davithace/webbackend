<?php  
    //����֤����Կ
    $dn = array(    
        "countryName" => 'XX', //���ڹ�������    
        "stateOrProvinceName" => 'State', //����ʡ������    
        "localityName" => 'SomewhereCity', //���ڳ�������    
        "organizationName" => 'MySelf',   //ע��������    
        "organizationalUnitName" => 'Whatever', //��֯����    
        "commonName" => 'mySelf', //��������    
        "emailAddress" => 'user@domain.com' //����    
    );    
         
    $privkeypass = '111111'; //˽Կ����    
    $numberofdays = 365;     //��Чʱ��    
    $cerpath = "./test.cer"; //����֤��·��    
    $pfxpath = "./test.pfx"; //��Կ�ļ�·��    
         
         
    //����֤��    
    $privkey = openssl_pkey_new();    
    $csr = openssl_csr_new($dn, $privkey);    //����֤��ǩ������
    $sscert = openssl_csr_sign($csr, null, $privkey, $numberofdays);    
    openssl_x509_export($sscert, $csrkey); //����֤��$csrkey    
    openssl_pkcs12_export($sscert, $privatekey, $privkey, $privkeypass); //������Կ$privatekey    
    //����֤���ļ�    
    $fp = fopen($cerpath, "w");    
    fwrite($fp, $csrkey);    
    fclose($fp);    
    //������Կ�ļ�    
    $fp = fopen($pfxpath, "w");    
    fwrite($fp, $privatekey);    
    fclose($fp);    
?>   

