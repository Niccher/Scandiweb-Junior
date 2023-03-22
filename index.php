<?php
include  "./config/header.php";
include  "./config/config.php";
?>
    <body>
        <div class="container py-3">
            <header>
                <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                        <span class="fs-4">Product List</span>
                    </a>
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <li class="btn btn-primary">
                            <a class="nav-link text-white" href="add-product/">
                                <i class="fas fa-plus"></i>
                                ADD
                            </a>
                        </li>
                        <li class="btn btn-warning ms-2">
                            <a class="nav-link text-dark" href="#" id="delete-product-btn">
                                <i class="fas fa-trash"></i>
                                MASS DELETE
                            </a>
                        </li>
                        <small class="btn-link btn-sm text-danger fst-italic del_error"></small>
                    </nav>
                </div>
            </header>

            <main>
                <form id="product_list_form">
                    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center products_list"></div>
                </form>
            </main>

            <!--footer -->
            <?php
            include  "./config/footer.php";
            ?>
        </div>

        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/js/jquery3.6.4.js"></script>

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
                    url: './controller/home.php',
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
                    url: './controller/home.php',
                    type: 'POST',
                    data: { action: "del_products", prod_ids: product_ids },
                    success: function(response){
                        getList();
                    }
                });
            }

            $(document).ready(function () {
                getList();
            });
        </script>

    </body>

</html>
