<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body>
        <div class="container py-3">
            <header>
                <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                        <span class="fs-4">Product List</span>
                    </a>
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <a href="addproduct.php" class="ms-2">
                            <div class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp;Add</div>
                        </a>
                        <div class="ms-2 btn btn-warning" id="delete-product-btn">
                            <i class="fas fa-trash"></i> &nbsp; Mass Delete
                        </div>
                        <small class="btn-link btn-sm text-danger fst-italic del_error"></small>
                    </nav>
                </div>
            </header>

            <main>
                <form id="product_list_form">
                    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center products_list"></div>
                </form>
                <div class="text-center text-danger fw-bold counted_now"></div>
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
                const selected_skus = [];
                $('input:checkbox[name=checkbox-delete]').each(function(){
                    if($(this).is(':checked')){
                        selected_skus.push(''+$(this).val()+'');
                    }
                });
                if (selected_skus.length !== 0) {
                    $('.del_error').html('')
                    delProducts(selected_skus);
                }else {
                    $('.del_error').html('Select at least one product to proceed.')
                }
            });

            var getChecked = function() {
                var n = $( "input:checked" ).length;
                if (n >= 1){
                    $('.del_error').html('')
                }
            };
            getChecked();

            function getList(){
                $.ajax({
                    url: './../Controllers/Base.php',
                    type: 'POST',
                    data: { action: "get_products" },
                    success: function(response){
                        $('.products_list').html(response);
                        if (response){
                            $( "input[type=checkbox]" ).on( "click", getChecked );
                        }
                    }
                });
            }

            function delProducts(product_ids){
                $.ajax({
                    url: './../Controllers/Base.php',
                    type: 'POST',
                    data: { action: "del_products", prod_ids: product_ids },
                    success: function(response){
                        console.log(response)
                        getList();
                    }
                });
            }

            $(document).ready(function () {
                getList();
            });
        </script>

    </body>

</htm
