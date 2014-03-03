<html>
  <head>
  </head>
    <body>
      <?php
         
         
         $link = mysql_connect('localhost', 'dnygard', 'kissa1');
         if (!$link) {
             die('Could not connect: ' . mysql_error());
             }
             echo 'Connected successfully';
             mysql_close($link);
             
                  
      ?>
      
    </body>

</html>