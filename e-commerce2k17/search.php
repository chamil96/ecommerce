<?php
  include "lib/inc/header.php";
?>
  <div class="main_content row">
    <form class="search" action="search.php" method="GET">
      <label for="search">Find What You're Looking For:</label>
      <input type="text" id="search" name="search" placeholder="Type here..." value="">
      <input id="submit_btn" type="submit" name="submit" value="Search">
    </form>
    <form class="search" action="search.php" method="GET">
      <label for="price">Filter By Price:</label>
      <select class="filter_bar" name="price">
        <option id="all"  value="all">All Prices</option>
        <option id="low"  value="low">Lowest</option>
        <option id="high"  value="high">Highest</option>
      </select>
      <input id="submit_btn" type="submit" name="Submit" value="Search">
    </form>
    <?php
      try {
        // $db = new PDO("mysql:host=localhost;dbname=chamiltonFinal;port=8888", "root", "root");
        $db = new PDO("mysql:host=localhost;dbname=chamiltonFinal", "r2hstudent", "SbFaGzNgGIE8kfP");

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
        echo "it's broken";

      }
      try {
        // $db = new PDO("mysql:host=localhost;dbname=chamiltonFinal;port=8888", "root", "root");
        $db = new PDO("mysql:host=localhost;dbname=chamiltonFinal", "r2hstudent", "SbFaGzNgGIE8kfP");

        $price = $_GET['price'];

        //I used switch statements to check the value of the select and used the proper queries for it
        switch (!empty($_GET['price'])) {
          case ('high'):
            $searchPrice = "SELECT * FROM productsinstock ORDER BY price DESC";
            $prep = $db->prepare($searchPrice);
            $prep->execute();
            break;

          case ('low'):
            $searchPrice = "SELECT * FROM productsinstock ORDER BY price ASC";
            $prep = $db->prepare($searchPrice);
            $prep->execute();
            break;


          default:
            $searchPrice = "SELECT * FROM productsinstock";
            $prep = $db->prepare($searchPrice);
            $prep->execute();
            break;
        }
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
       echo "it's broken";
      }



    ?>
  </div>
<?php
  include "lib/inc/footer.php";
?>
