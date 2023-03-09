<?php

    define("PROJECT_ROOT_PATH", __DIR__ . "/../");

    // get config file
    require_once PROJECT_ROOT_PATH . "/inc/config.php";

    // get main controller
    require_once PROJECT_ROOT_PATH . "/Controller/Api/BaseController.php";

    // get DBInteract model_file
    require_once PROJECT_ROOT_PATH . "/Model/UserModel.php";

?>
