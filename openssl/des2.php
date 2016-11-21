<?php  
/** 
 * PHP DES ���ܳ�ʽ 
 * 
 * @param $key ��耣��˂���Ԫ�ȣ� 
 * @param $encrypt Ҫ���ܵ����� 
 * @return string ���� 
 */  
function encrypt ($key, $encrypt)  
{  
    // ���� PKCS#7 RFC 5652 Cryptographic Message Syntax (CMS) ���� Message ���� Padding  
    $block = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_ECB);  
    $pad = $block - (strlen($encrypt) % $block);  
    $encrypt .= str_repeat(chr($pad), $pad);  
   
    // ����Ҫ�O�� IV �M�м���  
    $passcrypt = mcrypt_encrypt(MCRYPT_DES, $key, $encrypt, MCRYPT_MODE_ECB);  
    return base64_encode($passcrypt);  
}  
   
/** 
 * PHP DES ���ܳ�ʽ 
 * 
 * @param $key ��耣��˂���Ԫ�ȣ� 
 * @param $decrypt Ҫ���ܵ����� 
 * @return string ���� 
 */  
function decrypt ($key, $decrypt)  
{  
    // ����Ҫ�O�� IV  
    $str = mcrypt_decrypt(MCRYPT_DES, $key, base64_decode($decrypt), MCRYPT_MODE_ECB);  
   
    // ���� PKCS#7 RFC 5652 Cryptographic Message Syntax (CMS) ���� Message �Ƴ� Padding  
    $pad = ord($str[strlen($str) - 1]);  
    return substr($str, 0, strlen($str) - $pad);  
}  
   
$key = '1234567812345678';  
$plain = '123456';  
$encrypt = encrypt($key, $plain);  
$decrypt = decrypt($key, $encrypt);  
   
echo 'plain = ' . $plain . "\n";  
echo 'encrypt = ' . $encrypt . "\n";  
echo 'decrypt = ' . $decrypt . "\n";  
?>  