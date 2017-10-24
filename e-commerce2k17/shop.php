<?php
  include ("lib/inc/header.php");
  include ("lib/inc/shopnav.php");
?>
      <div class="row">
        <h2 id="shop_title">Welcome</h2>
      </div>

      <div class="main_content row">
        <?php
          try {

            $db = new PDO("mysql:host=localhost;dbname=chamiltonFinal;port=8888", "r2hstudent", "SbFaGzNgGIE8kfP");

            //Query that selects all products from my database
            $select = 'SELECT * FROM productsinstock';

            //if statements to check if a category was selected or not
            if (!empty($_GET['category'])) {
              $select = $select . ' WHERE category = :category ';
            }
            $prep = $db->prepare($select);

            if (!empty($_GET['category'])) {
              $prep->bindParam(":category", strip_tags($_GET['category']));
            }

            $prep->execute();

            foreach ($prep as $product) {
              echo "
                <div class=\"shop_content\">
                  <div class=\"shop_columns\">
                    <h3>{$product['name']}</h3>
                    <figure><a href=\"productdetail.php?id={$product['id']}\"><img src=\"{$product['img']}\" alt=\"{$product['name']}\"></a></figure>
                    <figcaption>\${$product['price']}</figcaption>
                  </div>
                </div>
              ";
            }

          } catch (Exception $e) {
            echo "its broken";
          }

        ?>
      </div><!-- main_content -->
<?php
  include "lib/inc/footer.php";
?>
