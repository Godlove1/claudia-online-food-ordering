<div class="my-8 lg:mt-12 lg:text-2xl">
  <nav aria-label="Page navigation">
    <ul class="flex justify-center gap-1 text-xs font-medium">
      <li>
        <button class="<?= ($page_no <= 1) ? 'disabled' : '' ?> inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
          <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>
            <span class="sr-only">Prev Page</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
          </a>
        </button>
      </li>

      <?php
      if ($total_no_of_pages <= 10) {
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
            echo "<li>
                    <button class='block h-8 w-8 rounded border-black bg-black text-white text-center leading-8'>
                      <a>$counter</a>
                    </button>
                  </li>";
          } else {
            echo "<li>
                    <button class='hvr-wobble-top block h-8 w-8 rounded border hover:bg-black hover:text-white border-gray-100 bg-white text-center leading-8 text-gray-900'>
                      <a href='?page_no=$counter'>$counter</a>
                    </button>
                  </li>";
          }
        }
      } elseif ($total_no_of_pages > 10) {

        if ($page_no <= 4) {
          for ($counter = 1; $counter < 8; $counter++) {
            if ($counter == $page_no) {
              echo "<li>
                      <button class='block h-8 w-8 rounded border-black bg-black text-white text-center leading-8'>
                        <a>$counter</a>
                      </button>
                    </li>";
            } else {
              echo "<li>
                      <button class='hvr-wobble-top block h-8 w-8 hover:bg-black hover:text-white rounded border border-gray-100 bg-white text-center leading-8 text-gray-900'>
                        <a href='?page_no=$counter'>$counter</a>
                      </button>
                    </li>";
            }
          }
          echo "<li><button class='h-8 w-8 rounded hover:bg-black hover:text-white border border-gray-100 bg-white text-center leading-8'>...</button></li>";
          echo "<li><button class='block h-8 w-8 hover:bg-black hover:text-white rounded border border-gray-100 bg-white text-center leading-8'><a href='?page_no=$second_last'>$second_last</a></button></li>";
          echo "<li><button class='block hover:bg-black hover:text-white h-8 w-8 rounded border border-gray-100 bg-white text-center leading-8'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></button></li>";

        } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
          echo "<li><button class='block h-8 w-8 rounded hover:bg-black hover:text-white border border-gray-100 bg-white text-center leading-8'><a href='?page_no=1'>1</a></button></li>";
          echo "<li><button class='block h-8 w-8 hover:bg-black hover:text-white rounded border border-gray-100 bg-white text-center leading-8'><a href='?page_no=2'>2</a></button></li>";
          echo "<li><button class='h-8 w-8 rounded hover:bg-black hover:text-white border border-gray-100 bg-white text-center leading-8'>...</button></li>";

          for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
            if ($counter == $page_no) {
              echo "<li>
                      <button class='block h-8 w-8 rounded border-black bg-black text-white text-center leading-8'>
                        <a>$counter</a>
                      </button>
                    </li>";
            } else {
              echo "<li>
                      <buttonclass='hvr-wobble-top block h-8 w-8 hover:bg-black hover:text-white rounded border border-gray-100 bg-white text-center leading-8 text-gray-900'>
                        <a href='?page_no=$counter'>$counter</a>
                      </button>
                    </li>";
            }
          }

          echo "<li><button class='h-8 w-8 rounded border border-gray-100 bg-white text-center leading-8'>...</button></li>";
          echo "<li><button class='block h-8 w-8 rounded border hover:bg-black hover:text-white border-gray-100 bg-white text-center leading-8'><a href='?page_no=$second_last'>$second_last</a></button></li>";
          echo "<li><button class='block h-8 w-8 rounded border hover:bg-black hover:text-white border-gray-100 bg-white text-center leading-8'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></button></li>";

        } else {
          echo "<li><button class='block h-8 w-8 rounded hover:bg-black hover:text-white border border-gray-100 bg-white text-center leading-8'><a href='?page_no=1'>1</a></button></li>";
          echo "<li><button class='block h-8 w-8 hover:bg-black hover:text-white rounded border border-gray-100 bg-white text-center leading-8'><a href='?page_no=2'>2</a></button></li>";
          echo "<li><button class='h-8 w-8 rounded border hover:bg-black hover:text-white border-gray-100 bg-white text-center leading-8'>...</button></li>";

          for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
            if ($counter == $page_no) {
              echo "<li>
                      <button class='block h-8 w-8 rounded border-black bg-black text-white text-center leading-8'>
                        <a>$counter</a>
                      </button>
                    </li>";
            } else {
              echo "<li>
                      <button class='block h-8 w-8 rounded border hover:bg-black hover:text-white border-gray-100 bg-white text-center leading-8 text-gray-900'>
                        <a href='?page_no=$counter'>$counter</a>
                      </button>
                    </li>";
            }
          }
        }
      }
      ?>

      <li>
        <button class="<?= ($page_no >= $total_no_of_pages) ? 'disabled' : '' ?> inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
          <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>
            <span class="sr-only">Next Page</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
          </a>
        </button>
      </li>
    </ul>
  </nav>
</div>