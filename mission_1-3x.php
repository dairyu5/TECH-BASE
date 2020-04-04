<html>
 <head>
  <title>mission1-3</title>
 </head>
 <body>
     <?php
        $file= file_get_contents("mission_1-2.txt");//どのファイルをgetするかを指定
        echo $file;//$は変数だから上の行が出力される
     ?>
 </body>
</html>