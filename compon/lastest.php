<div class="last-posts">
            <h4> أحدث المنشورات</h4>
            <?php
            $query = "SELECT * FROM post ORDER BY id DESC LIMIT 5";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <ul>
              <li class="mt-3 mb-3">
                <a href="thePost.php?id=<?php echo $row['id']; ?>">
                <!-- <br> -->
                  <span> <img class="last-post-img"  src="uplodes/post_images/<?php echo $row['post_img']; ?>" alt=" هذا المنشور لايحتوي على صورة"></span>
                  <span> <?php echo $row['post_title']; ?> </span>
                </a>
              </li>
            </ul>
            <?php }?>
            
          </div>