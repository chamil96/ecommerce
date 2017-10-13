<?php
  include ("lib/inc/header.php");
?>
      <div class="main_content row">

      </div>
      <div class="contact row">
        <div class="columns one-half">
            <form id="contactform" class="contact_form" action="contact.php" method="POST">
              <fieldset>
                <div>
                  <label for="fname">Firstname: </label>
                </div>
                <div>
                  <input class="input" type="text" name="fname" id="fname" placeholder="Ex. Chris" required>
                </div>
                <div>
                  <label class="input" for="lname">Lastname: </label>
                </div>
                <div>
                  <input class="input" type="text" name="lname" id="lname" placeholder="Ex. Hamilton" required>
                </div>
                <div>
                  <label class="input" for="email">Email: </label>
                </div>
                <div>
                  <input class="input" type="email" name="email" id="email" placeholder="iluvrecords4@gmail.com" required>
                </div>
                <div>
                  <label class="input" for="comment">Talk to Us:</label>
                </div>
                <div>
                  <textarea class="input" name="comment" id="comment" rows="10" cols="80" placeholder="Leave a comment..." required></textarea>
                </div>
                <div>
                  <input id="submit_btn" type="submit" value="Submit">
                </div>
              </fieldset>
            </form>
            </div>
            <?php
              if (!empty($_POST)) {

                try {

                  // $db = new PDO("mysql:host=localhost;dbname=chamilton_stockroom;port=8888", "root", "root");
                  $db = new PDO("mysql:host=localhost;dbname=chamilton_stockroom;port=8888", "r2hstudent", "SbFaGzNgGIE8kfP");

                  $insert = "INSERT INTO commentdata (fname, lname, email, comment) VALUES (:fname, :lname, :email, :comment)";

                  $prep = $db->prepare($insert);

                  $prep->bindParam(":fname", strip_tags($_POST["fname"]));
                  $prep->bindParam(":lname", strip_tags($_POST["lname"]));
                  $prep->bindParam(":email", strip_tags($_POST["email"]));
                  $prep->bindParam(":comment", strip_tags($_POST["comment"]));
                  $prep->execute();

                } catch (Exception $e) {
                   $e->getMessage();
                  exit;
                }
                  try {
                        $results = $db->query("SELECT fname, lname, comment FROM commentdata ORDER BY comment_id DESC");

                        $list = $results->fetchAll(PDO::FETCH_ASSOC);

                      } catch (Exception $e) {
                        echo "Bad query";
                      }
                }
            ?>

        <div id="comment_section" class="columns one-half">
          <ul>
            <?php foreach ($list as $comments) {
              echo "<li value=$comments[comments]>$comments[fname] $comments[lname]: $comments[comment]</li>";
            } ?>
          </ul>
        </div>
      </div><!-- contact -->
      <script
        src="http://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
      <script type="text/javascript" src="lib/js/jquery.validate.min.js"></script>
      <script type="text/javascript" src="lib/js/jquery.validate.js"></script>
      <script>
      $("#contactform").validate();
      </script>
<?php
  include ("lib/inc/footer.php");
?>
