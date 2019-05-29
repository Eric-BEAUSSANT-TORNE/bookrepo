<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Book Archive</title>
    <link rel="stylesheet" href="./main.css">
  </head>
  <body>

    <div class="wrapper">
      <div class="head">
        <h1>WIES18 bokverktyg</h1>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
          <p>Välj fil att ladda upp:</p>
          <input type="file" name="fileToUpload" id="fileToUpload" >
          <input type="submit" value="Ladda upp" name="submit">
      </form>

    </div>
      <?php
      session_start();
      $phpFileUploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
      );
      if(isset($_FILES['fileToUpload'])){

        $ext_error = false;
        // Allowed extentions
        $extenstions = array('csv');
        // Check if uploaded file is allowed
        $file_ext = end(explode('.',$_FILES['fileToUpload']['name']));
        if($extentions == $file_ext){
          $ext_error = true;
        }
        if($_FILES['fileToUpload']['error']){
          echo $phpFileUploadErrors[$_FILES['fileToUpload']['error']];
        }
        elseif($ext_error){
          echo 'Invalid file extention';
        }
        else
        {
          echo 'Uppladdning lyckad!';
        }
        //Saves file
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'],
            './' . $_FILES['fileToUpload']['name']);

            $_SESSION['upedfile'] = './' . $_FILES['fileToUpload']['name'];
      }

      function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
      }
    ?>

  </body>
</html>
