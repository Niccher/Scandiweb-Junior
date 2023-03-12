<?php

    define("PROJECT_ROOT_PATH", __DIR__ . "/../");

    // get config file
    require_once PROJECT_ROOT_PATH . "/inc/config.php";

    // get main controller
    require_once PROJECT_ROOT_PATH . "/ControllerS/BaseController.php";

    // get DBInteract model_file
    require_once PROJECT_ROOT_PATH . "/Models/DBInteract.php";

?>
