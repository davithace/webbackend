<?php
    /*
    * ���뽫 php.ini �е� com.allow_dcom ��Ϊ TRUE
    */
 
    function php_Word($wordname,$htmlname,$content)
    {
        //��ȡ���ӵ�ַ
        $url = $_SERVER['HTTP_HOST'];
        $url = $url.$_SERVER['PHP_SELF'];
        $url = dirname($url)."/";
        //����һ��ָ����COM���������
        $word = new COM("word.application") or die("Unable to instanciate Word");
 
        //��ʾĿǰ����ʹ�õ�Word�İ汾��
        echo "Loading Word, v. {$word->Version}";
 
        //�����Ŀɼ�������Ϊ0���٣������Ҫʹ������ǰ�˴򿪣�ʹ��1���棩
        $word->Visible = 1;
        //---------------------------------��ȡWord���ݲ��� START-----------------------------------------
        //��һ��word�ĵ�
        $word->Documents->Open($url.$wordname);
 
        //��filename.docת��Ϊhtml��ʽ��������Ϊhtml�ļ�
        $word->Documents[1]->SaveAs(dirname(__FILE__)."/".$htmlname,8);
 
        //��ȡhtm�ļ����ݲ������ҳ�� (�ı�����ʽ���ᶪʧ)
        $content = file_get_contents($url.$htmlname);
        echo $content;
 
        //��ȡword�ĵ����ݲ������ҳ�棨�ı���ԭ��ʽ�Ѷ�ʧ��
        $content= $word->ActiveDocument->content->Text;
        echo $content;
 
        //�ر���COM���֮�������
        $word->Documents->close(true);
        $word->Quit();
        $word = null;
        unset($word);
        //---------------------------------�½���Word�ĵ����� START--------------------------------------
        //����һ���յ�word�ĵ�
        $word->Documents->Add();
 
        //д�����ݵ��½�word
        $word->Selection->TypeText("$content");
 
        //�����½���word�ĵ�
        $word->Documents[1]->SaveAs(dirname(__FILE__)."/".$wordname);
 
        //�ر���COM���֮�������
        $word->Quit();
    }
    php_Word("BasicTable.docx","filename.html","д��word������");
?>