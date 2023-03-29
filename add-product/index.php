<?php
include  "./../config/header.php";
?>

    <link href="./../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <body>
        <div class="container py-3">
            <header>
                <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                        <span class="fs-4">Product Add</span>
                    </a>
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <a href="#" class="ms-2 ">
                            <div class="btn btn-success class_product_add"><i class="fas fa-save"></i> &nbsp;Save</div>
                        </a>
                        <button class="btn btn-danger ms-2" onclick="pageListing()">
                            <i class="fas fa-window-close"></i> &nbsp;Cancel
                        </button>
                    </nav>
                </div>
            </header>

            <main>
                <div class="row mb-3 text-center">
                    <form class="col-sm-12 prod_form" id="product_form">
                        <div class="row mb-3">
                            <label for="sku" class="col-sm-2 col-form-label">SKU &nbsp;<i class="fas fa-tag text-muted"></i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="sku" required minlength="3" placeholder="Product SKU">
                                <div id="err_sku" class="text-danger text-end small"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name &nbsp;<i class="fas fa-tag text-muted"></i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" required minlength="3" placeholder="Product Name">
                                <div id="err_name" class="text-danger text-end small"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-sm-2 col-form-label">Price &nbsp;<i class="fas fa-dollar-sign text-muted"></i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="price" required minlength="1" maxlength="4" placeholder="Product Price (Numbers only)" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, '')">
                                <div id="err_price" class="text-danger text-end small"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="productType" class="col-sm-2 col-form-label">Type Switcher</label>
                            <div class="col-sm-6">
                                <select class="form-select col-sm-2" id="productType" required>
                                    <option selected disabled value="">Choose product type...</option>
                                    <option value="Dvd">DVD</option>
                                    <option value="Book">Book</option>
                                    <option value="Furniture">Furniture</option>
                                </select>
                                <div id="err_productType" class="text-danger text-sm-end small"></div>
                            </div>
                        </div>

                        <div class="ui_category_here"></div>

                    </form>

                </div>
            </main>

            <!--footer -->
            <?php
            include  "./../config/footer.php";
            ?>


        </div>
        <script src="./../assets/js/bootstrap.bundle.min.js"></script>
        <script src="./../assets/js/jquery3.6.4.js"></script>
        <script src="./../assets/js/validator.js"></script>

        <script>
            $(document).ready(function(){

                $("#productType").change(function () {
                    var ui_class = this.value;

                    $.ajax({
                        url: './../views/' + ui_class + '.php',
                        type: 'POST',
                        data: { category: ui_class },
                        success: function(response){
                            $('.ui_category_here').html(response)
                        }
                    })
                });

            });

            function pageListing() {
                window.location.href = "./../index.php";
            }

        </script>

    </body>

</htm>