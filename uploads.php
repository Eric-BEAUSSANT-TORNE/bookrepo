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
      <form action="upload.php" method="post" enctype="multipart/form-data">
          <p>Välj fil att ladda upp:</p>
          <input type="file" name="fileToUpload" id="fileToUpload" value="Sök">
          <input type="submit" value="Ladda upp" name="submit">
      </form>

      </div>
<?php
if (isset($_FILES)) {
    $check = true;
    if ($_FILES['fileToUpload']['type'] !== 'text/plain') {
        $check = false;
    }

if ($check) {

      $path = realpath('./') . '/UploadedFiles/' . $_FILES['fileToUpload']['name'];

        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "$path")) {
            echo "Filen ". basename( $_FILES["fileToUpload"]["name"]). " har laddat up.";
            ?>
            <form action="user_data.php">
                <input type="submit" value="Försätta>>">
            </form>
        <?php
        } else {
            echo "Tyvär det var nån fel me laddaup fil.";
        }
    }
}
?>

  </body>
</html>
