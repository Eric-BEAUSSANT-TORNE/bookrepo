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
      <div class="left-body">
        <p>Dina böcker:</p>
        <?php
            session_start();

            echo $_SESSION ['upedfile'];
            echo "<html><body><table>\n\n";
            $f = fopen($_SESSION["upedfile"], "r");
            while (($line = fgetcsv($f)) !== false) {
                    echo "<tr>";
                    foreach ($line as $cell) {
                            echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>\n";
            }
            fclose($f);
            echo "\n</table></body></html>";
         ?>
      </div>
      <div class="right-body">
        <form class="" action="index.html" method="post">
          <p>Fyll i din uppgifter:</p>
          Namn: <input type="text" name="Namn" value="Sven Svensson"> <br>
          Adress: <input type="text" name="Adress" value="Slottsbacken 1, 107 70 Stockholm"><br>
          Telefonnummer: <input type="text" name="Telefon" value="0707070707"><br>
          Kortuppgifter: <input type="text" name="Kort " value="1234 1234 1234 1234">
          <input type="text" name="Cvv" value="123"><br>
          <input type="checkbox" name="Godkänt" value=""> Jag godkänner vilkor och sånt. <br>
          <input type="submit" name="Betalar" value="Kör!">

        </form>
      </div>

    </div>

  </body>
</html>
