<?php   
   if (! empty ( $_FILES ['file'] ['name'] ))
        {
           $tmp_file = $_FILES ['file'] ['tmp_name'];
           
           //$tmp_size = $_FILES ['file_stu'] ['size'];
   
           $file_types = explode ( ".", $_FILES ['file'] ['name'] );
           $file_type = $file_types [count ( $file_types ) - 1];
            /*�б��ǲ���.xls�ļ����б��ǲ���excel�ļ�*/
            if (strtolower ( $file_type ) != "xls")              
           {
                 $this->error ( '����Excel�ļ��������ϴ�' );
            }
           /*�����ϴ�·��*/
      

           $savePath = "upload/";
           
    
           /*��ʱ���������ϴ����ļ�*/
            $str = date ( 'Ymdhis' ); 
            $file_name = $str . "." . $file_type;
            
            /*�Ƿ��ϴ��ɹ�*/
            if (! move_uploaded_file( $tmp_file, $savePath . $file_name )) 
             {
                 $this->error ( '�ϴ�ʧ��' );
             }
		}
?>		   
		   