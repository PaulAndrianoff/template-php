<?php 

displayPart($wantedPage, 'worker');

include_once PATH_VIEW . '/partials/partialBase/header.php';

displayPart($wantedPage, 'header');

displayPart($wantedPage, 'template');

displayPart($wantedPage, 'footer');

include_once PATH_VIEW . '/partials/partialBase/footer.php';

?>