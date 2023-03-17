<?php
include  "./config/header.php"
?>
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
                        <button class="ms-2 btn btn-warning" id="delete-product-btn">
                            <i class="fas fa-trash"></i> &nbsp; Mass Delete
                        </button>
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
            include  "./config/footer.php"
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
                    url: './Controllers/Base.php',
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
                    url: './Controllers/Base.php',
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

</htm
