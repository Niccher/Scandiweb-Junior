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
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <a href="#" class="ms-2 ">
                            <div class="btn btn-success class_product_add">Save</div>
                        </a>

                        <div class="btn btn-danger ms-2" onclick="pageListing()">Cancel</div>

                        <a href="listing.php" class="ms-2">
                            <div class="btn btn-primary">List Products</div>
                        </a>
                    </nav>
                </div>
            </header>

            <main>
                <div class="row mb-3 text-center">
                    <form class="col-sm-12" id="product_form">
                        <div class="row mb-3">
                            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="sku">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="price" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="productType" class="col-sm-2 col-form-label">Type Switcher</label>
                            <div class="col-sm-6">
                                <select class="form-select col-sm-2" id="productType" required>
                                    <option selected value="">Choose product type...</option>
                                    <option value="DVD" id="DVD">Disk</option>
                                    <option value="Book" id="Book">Book</option>
                                    <option value="Furniture" id="Furniture">Furniture</option>
                                </select>
                            </div>
                        </div>

                        <div class="card class-dvd d-none col-sm-8">
                            <label class="my-2">DVD Information</label>
                            <div class="row mb-3">
                                <label for="size" class="col-sm-3 col-form-label">Size</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="size" placeholder="Disk Size in MB">
                                </div>
                            </div>
                        </div>

                        <div class="card class-book d-none col-sm-8">
                            <label class="my-2">Book Information</label>
                            <div class="row mb-3">
                                <label for="weight" class="col-sm-3 col-form-label">Weight</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="weight" placeholder="Book weight in Kilograms">
                                </div>
                            </div>
                        </div>

                        <div class="card class-furniture d-none col-sm-8">
                            <label class="my-2">Furniture Information</label>
                            <div class="row mb-3">
                                <label for="length" class="col-sm-3 col-form-label">Furniture</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="length" placeholder="Furniture length in Centimeters">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="width" class="col-sm-3 col-form-label">Furniture</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="width" placeholder="Furniture width in Centimeters">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="height" class="col-sm-3 col-form-label">Furniture</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="height" placeholder="Furniture height in Centimeters">
                                </div>
                            </div>
                        </div>

                    </form>

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
            $(document).ready(function(){
                $("#productType").change(function () {
                    var ui_class = this.value;
                    console.log("Helo "+ ui_class)
                    if (ui_class == 'DVD'){
                        $('.class-dvd').removeClass("d-none");
                        $('.class-book').addClass("d-none");
                        $('.class-furniture').addClass("d-none");
                    }
                    if (ui_class == 'Book'){
                        $('.class-dvd').addClass("d-none");
                        $('.class-book').removeClass("d-none");
                        $('.class-furniture').addClass("d-none");
                    }
                    if (ui_class == 'Furniture'){
                        $('.class-dvd').addClass("d-none");
                        $('.class-book').addClass("d-none");
                        $('.class-furniture').removeClass("d-none");
                    }
                });

                $('.class_product_add').click(function () {
                    sku = $("#sku").val();
                    name = $("#name").val();
                    price = $("#price").val();
                    cat = $( "#productType" ).val();

                    console.log('SKU as '+ sku)
                    console.log('Name as '+ name)
                    console.log('Price as '+ price)
                    console.log('Cat as '+ cat)

                   /* $.ajax({
                        url: '<?php //echo base_url('work/pay'); ?>',
                        type: 'POST',
                        data: { product_name: sku, product_name: name, product_price: price },
                        success: function(response){
                            if(response == 1){
                                alert('Work Marked as complete.');
                            }else{
                                alert('An Error occurred.');
                            }
                        }
                    });*/
                });
            });

            function pageListing() {
                window.location.href = "listing.php";
            }
        </script>

    </body>

</htm>