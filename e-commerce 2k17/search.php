<?php
  include "lib/inc/header.php";
?>
  <div class="main_content row">
    <form class="search" action="search.php" method="GET">
      <label for="search">Find What You're Looking For:</label>
      <input type="text" id="search" name="search" placeholder="Type here..." value="">
      <input id="submit_btn" type="submit" name="submit" value="Search">
    </form>
    <?php
      try {
        // $db = new PDO("mysql:host=localhost;dbname=chamilton_stockroom;port=8888", "root", "root");
        $db = new PDO("mysql:host=localhost;dbname=chamiltonFinal;port=8888", "r2hstudent", "SbFaGzNgGIE8kfP");

        $searchItem = $_GET['search'];

        if (!empty($searchItem)) {
          $search = "SELECT * FROM productsinstock WHERE name LIKE ' %{$searchItem}%' OR description LIKE '%{$searchItem}%' OR category LIKE '%{$searchItem}%' OR price LIKE '%{$searchItem}%' ";

          $prep = $db->prepare($search);
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

        }

      } catch (Exception $e) {

      }

    ?>
  </div>
<?php
  include "lib/inc/footer.php";
?>
