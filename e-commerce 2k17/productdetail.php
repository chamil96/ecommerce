<?php
  include ("lib/inc/header.php");
?>
  <div class="main_content row">
    <?php
      try {
        //Establishes a connection to a database
        $db = new PDO("mysql:host=localhost;dbname=chamiltonFinal;port=8888", "r2hstudent", "SbFaGzNgGIE8kfP");

        $productdetails = 'SELECT * FROM productsinstock WHERE id = :id';

        //prepare statement to protect from sql injection
        $prep = $db->prepare($productdetails);
        $prep->bindParam(':id', strip_tags($_GET['id']));
        $prep->execute();

        foreach($prep as $details) {
          echo "
            <div class='details_content'>
                <h3>{$details['name']}</h3>
                <figure><a href='productdetail.php?id={$details['id']}''><img src='{$details['img']}' alt='{$details['name']}''></a></figure>
                <figcaption>{$details['description']}</figcaption>
                <figcaption>\${$details['price']}</figcaption>
              <div>
                <form action='shop.php' method='\GET'>
                  <label for='quantity'>Quantity:</label>
                  <input id='quantity' name='quantity' min='1' max='200' type= 'number' value='' required>
                  <input id='add_btn' type='submit' name='submit' value='Add To Cart'>
                </form>
                <input id='remove_btn' type='submit' name='submit' value='Clear Cart'>
              </div>
            </div>
          ";
        }
      } catch (Exception $e) {
        echo "its broke";
      }

    ?>
    <!-- used for validating form -->
    <script
      src="http://code.jquery.com/jquery-3.2.1.js"
      integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
      crossorigin="anonymous"></script>
    <script type="text/javascript" src="lib/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="lib/js/jquery.validate.js"></script>
    <script>
    $("#contactform").validate();
    </script>
  </div>
<?php
  include ("lib/inc/footer.php");
?>
