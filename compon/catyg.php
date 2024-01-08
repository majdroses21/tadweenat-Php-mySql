 <!--Start catagories -->
 <div class="catagories">
            <h4 class="text-center"> التصنيفات </h4>
            <?php 
          $query = "SELECT*  FROM categories ORDER BY cat_id DESC";
          $res = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <ul>
              <li>
                <a href="sections.php?secId=<?php echo $row['cat_name'] ?>">
                  <span><i class="fa fa-solid fa-tags"></i></span>
                  <span> <?php echo $row['cat_name'] ?>  </span>
                </a>
              </li>
            </ul>
            <?php }?>
          </div>

          <!--End catagories -->