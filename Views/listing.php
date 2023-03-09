<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <link href="./css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>

    <body>
        <div class="container py-3">
            <header>
                <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                        <span class="fs-4">Product List</span>
                    </a>
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <a href="add.php" class="ms-2">
                            <div class="btn btn-primary">Add</div>
                        </a>
                        <div class="ms-2 btn btn-warning" id="delete-product-btn">Mass Delete</div>
                    </nav>
                </div>
            </header>

            <main>
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                        <?php
                        $count = 10;

                        for ($i = 0; $i < 10; $i++){ ?>

                        <div class="col-md-3 col-sm-6">
                            <div class="card mb-3 rounded-3">
                                <div class="card-body">
                                    <div class="form-check checkbox-class">
                                        <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox-delete[]" value="del_<?php echo $i;?>">
                                    </div>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>Product ID</li>
                                        <li>Product Name</li>
                                        <li>$12.00</li>
                                        <li>Product Attribute</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                        ?>

                </div>
            </main>

            <footer class="fixed-bottom border-top bg-light">
                <div class="text-center pt-2 mt-2">
                    <p class="col-md-12 text-muted ">
                        <strong>Scandiweb Web Test</strong>
                    </p>
                </div>
            </footer>
        </div>

        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./js/jquery3.6.4.js"></script>

        <script>
            $("#delete-product-btn").click(function(){
                console.log('Hello Remove')
                $('.checkbox-class').removeClass("d-none");
            });
            $("#delete-product-btn-apply").click(function(){
                console.log('Hello Add')
                $('.checkbox-class').addClass("d-none");
            });
        </script>

    </body>

</htm
