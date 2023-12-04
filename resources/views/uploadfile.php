<html>
   <body>
      <?php
         echo Form::open(array('url' => '/uploadfile','files'=>'true'));
         echo 'Select the file to upload.';
         echo Form::file('image');
         echo Form::submit('Upload File');
         echo Form::close();
         // echo "<form method='post' action='http://127.0.0.1:8000/uploadfile' enctype='multipart/form-data'><input type='file' name='image'/><input type='submit' value='upload'/></form>"
      ?>
   </body>
</html>

