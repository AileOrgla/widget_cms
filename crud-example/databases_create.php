<?php
    require('Components/config.php');
        if (isset($_POST['submit'])) {
            $menu_name = $_POST['menu_name'];
            $position = $_POST['position'];
            $visible = $_POST['visible'];

            $query = "INSERT INTO subjects (menu_name, position, visible)
                      VALUES ('{$menu_name}', {$position}, {$visible})";
            $result = mysqli_query($connection, $query);
        }
?>
<!DOCTYPE HTML>
<html>
   <head>
    <title>widget_cms</title>
    <meta http-equiv="Content-Type" content="text/html;
    charset=utf-8">
     <?php if (isset($_POST['submit'])) { ?>
     <meta http-equiv="refresh" content="2; url=index.php/">
     <?php  } ?>
      <style>
          .form-field{
              margin-top: 25px;
          }
          .form-label{
              display: block;
          }
      </style>
   </head>
   <body>
   <?php
     if (isset($_POST['submit'])) {
         if($result) {
            echo "Õnnestus";
         } else {
            echo "Ebaõnnestus";
         }
     }
   ?>
   <?php if(!isset($_POST['submit'])) { ?>
        <form action="databases_create.php" method="post">
            <div class="form-field">
                <label for="menu_name" class="form-label">Pealkiri</label>
                <input id="menu-name" name="menu_name">
            </div>

            <div class="form-field">
                <label for="position" class="form-label">Positsioon</label>
                <select id="position" name="position">
                    <?php for($i = 1; $i < 16; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-field">
                <label for="visible" class="form-label">Nähtavus</label>
                <select id="visible" name="visible">
                        <option value="1">Nähtav</option>
                        <option value="0">Peidetud</option>
                </select>
            </div>

            <div class="form-field">
                <input name="submit" type="submit">
            </div>

        </form>
      <a href="index.php">Mine tagasi</a>
     <?php } ?>
   </body>
</html>
<?php mysqli_close($connection);  ?>

