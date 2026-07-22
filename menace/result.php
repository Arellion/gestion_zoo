<?php
require_once "../header.php";
?>
<?php
if (!empty ($_POST['action'])) :
    switch ($_POST['action']) :
        case 'create' :
            echo "creation";
            break;
        case 'update' :
            echo "Modification";
            break;
        case 'delete' :
            echo "Supression";
            break;
        default :
            echo "Action inconnue";
            break;
    endswitch;
endif
?>
<?php
require_once "../footer.php";
?>
