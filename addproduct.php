<?php
include  "./config/header.php"
?>

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
                    <form class="col-sm-12" id="product_form">
                        <div class="row mb-3">
                            <label for="sku" class="col-sm-2 col-form-label">SKU &nbsp;<i class="fas fa-tag text-muted"></i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="sku" required minlength="3" placeholder="Enter Product SKU here">
                                <div id="err_sku" class="text-danger text-end small"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name &nbsp;<i class="fas fa-tag text-muted"></i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" required minlength="3" placeholder="Enter Product Name here">
                                <div id="err_name" class="text-danger text-end small"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-sm-2 col-form-label">Price &nbsp;<i class="fas fa-dollar-sign text-muted"></i></label>
                            <div class="col-sm-6">
                                <!--<input type="text" class="form-control" id="price" required minlength="1" placeholder="Enter Product Price here (Numbers only)" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"> -->
                                <input type="text" class="form-control" id="price" required minlength="1" placeholder="Enter Product Price here (Numbers only)" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, '')">
                                <div id="err_price" class="text-danger text-end small"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="productType" class="col-sm-2 col-form-label">Type Switcher</label>
                            <div class="col-sm-6">
                                <select class="form-select col-sm-2" id="productType" required>
                                    <option selected disabled value="">Choose product type...</option>
                                    <option value="DVD">DVD</option>
                                    <option value="Book">Book</option>
                                    <option value="Furniture">Furniture</option>
                                </select>
                                <div id="err_productType" class="text-danger text-sm-end small"></div>
                            </div>
                        </div>

                        <div class="card class-dvd d-none col-sm-8">
                            <label class="my-2">DVD Information</label>
                            <div class="row mb-3">
                                <label for="size" class="col-sm-3 col-form-label">Size (MB) &nbsp;<i class="fas fa-database text-muted"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="size" placeholder="Disk Size (Numbers only)" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, '')">
                                    <div id="err_size" class="text-danger text-end small"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card class-book d-none col-sm-8">
                            <label class="my-2">Book Information</label>
                            <div class="row mb-3">
                                <label for="weight" class="col-sm-3 col-form-label">Weight (KG)&nbsp;<i class="fas fa-weight-hanging text-muted"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="weight" placeholder="Book weight (Numbers only)" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, '')">
                                    <div id="err_weight" class="text-danger text-end small"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card class-furniture d-none col-sm-8">
                            <label class="my-2">Furniture Information</label>
                            <div class="row mb-3">
                                <label for="length" class="col-sm-3 col-form-label">Length (CM)&nbsp;<i class="fas fa-ruler-combined text-muted"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="length" placeholder="Furniture length (Numbers only)" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, '')">
                                    <div id="err_length" class="text-danger text-end small"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="width" class="col-sm-3 col-form-label">Width (CM)&nbsp;<i class="fas fa-ruler-combined text-muted"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="width" placeholder="Furniture width (Numbers only)" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, '')">
                                    <div id="err_width" class="text-danger text-end small"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="height" class="col-sm-3 col-form-label">Height (CM) &nbsp;<i class="fas fa-ruler-combined text-muted"></i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="height" placeholder="Furniture height (Numbers only)" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, '')">
                                    <div id="err_height" class="text-danger text-end small"></div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </main>

            <!--footer -->
            <?php
            include  "./config/footer.php"
            ?>


        </div>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/js/jquery3.6.4.js"></script>
        <script src="./assets/js/validator.js"></script>

        <script>
            $(document).ready(function(){

                $("#productType").change(function () {
                    var ui_class = this.value;

                    if (ui_class == 'DVD'){
                        $('.class-dvd').removeClass("d-none");
                        $('.class-book').addClass("d-none");
                        $('.class-furniture').addClass("d-none");
                    }else if (ui_class == 'Book'){
                        $('.class-dvd').addClass("d-none");
                        $('.class-book').removeClass("d-none");
                        $('.class-furniture').addClass("d-none");
                    }else if (ui_class == 'Furniture'){
                        $('.class-dvd').addClass("d-none");
                        $('.class-book').addClass("d-none");
                        $('.class-furniture').removeClass("d-none");
                    }
                    else {
                        $('.class-dvd').addClass("d-none");
                        $('.class-book').addClass("d-none");
                        $('.class-furniture').addClass("d-none");
                    }

                    $("#weight" ).val('');
                    $("#size" ).val('');
                    $("#length" ).val('');
                    $("#width" ).val('');
                    $("#height" ).val('');

                    $("#err_size").html("");
                    $("#err_weight").html("");
                    $("#err_height").html("");
                });

            });

            function pageListing() {
                window.location.href = "index.php";
            }

        </script>

    </body>

</htm>