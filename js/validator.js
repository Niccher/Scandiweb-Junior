$(document).ready(function () {

    function validateSku() {
        let val_sku = $("#sku").val();
        let err_sku_len = "";

        if (val_sku.length ==  ""){
            err_sku_len = "Product SKU is a needed"
            $("#err_sku").html(err_sku_len);
            return false;
        }else if (val_sku.length < 3){
            err_sku_len = "Product SKU needs to be 3 characters or longer"
            $("#err_sku").html(err_sku_len);
            return false;
        }else if (val_sku.length >= 3) {
            $("#err_sku").html("");
            return true;
        }
    }

    function validatePrice() {
        $('#price').keypress(function (e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (String.fromCharCode(charCode).match(/[^0-9]/g))
                return false;
        });

        let val_price = $("#price").val();
        let err_price_len = "";

        if (val_price.length ==  ""){
            err_price_len = "Product Price is needed"
            $("#err_price").html(err_price_len);
            return false;
        }else {
            $("#err_price").html("");
            return true;
        }
    }

    function validateName() {
        let val_name = $("#name").val();
        let err_name_len = "";

        if (val_name.length ==  ""){
            err_name_len = "Product Name is a needed"
            $("#err_name").html(err_name_len);
            return false;
        }else if (val_name.length < 3){
            err_name_len = "Product Name needs to be 3 characters or longer"
            $("#err_name").html(err_name_len);
            return false;
        }else if (val_name.length >= 3) {
            $("#err_name").html("");
            return true;
        }
    }

    function validateCategory() {
        let val_category = $( "#productType" ).val();
        let err_cat_len = "";

        if (val_category.length >= 2) {
            $("#err_productType").html("");
            return true;
        }else {
            err_cat_len = "A valid category is needed"
            $("#err_productType").html(err_cat_len);
            return false;
        }
    }

    function validateSubCategory() {
        let val_category = $( "#productType" ).val();

        let val_book_weight = $( "#weight" ).val();
        let val_dvd_size = $( "#size" ).val();
        let val_furn_length = $( "#length" ).val();
        let val_furn_width = $( "#width" ).val();
        let val_furn_height = $( "#height" ).val();

        if(val_category.length == ""){
            return false
        }

        if (val_category == "DVD") {
            if (val_dvd_size.length == ""){
                $("#err_size").html("DVD size is needed");
                $("#size").focus();
                return false
            }else {
                $("#err_size").html("");
                return true
            }
        }

        if (val_category == "Book") {
            if (val_book_weight.length == ""){
                $("#err_weight").html("Book weight is needed");
                $("#weight").focus();
                return false
            }else {
                $("#err_weight").html("");
                return true
            }
        }

        if (val_category == "Furniture" ) {
            if (val_furn_length.length == ""){
                $("#err_length").html("Furniture length is needed");
                $("#err_width").html("");
                $("#err_height").html("");
                $("#length").focus();
                return false
            }else if (val_furn_width.length == ""){
                $("#err_width").html("Furniture width is needed");
                $("#err_length").html("");
                $("#err_height").html("");
                $("#width").focus();
                return false
            } else if (val_furn_height.length == ""){
                $("#err_height").html("Furniture height is needed");
                $("#err_length").html("");
                $("#err_width").html("");
                $("#height").focus();
                return false
            }else{
                $("#err_length").html("");
                $("#err_width").html("");
                $("#err_height").html("");
                return true;
            }
        }
    }

    $("#sku").keyup(function () {
        validateSku();
    });

    $("#price").keyup(function () {
        validatePrice();
    });

    $("#name").keyup(function () {
        validateName();
    });

    $("#productType").change(function () {
        validateCategory();
    });



    $('.class_product_add').click(function(){
        if (!validateSku()){
            $("#sku").focus();
        } else if (!validateName()){
            $("#name").focus();
        }else if (!validatePrice()){
            $("#price").focus();
        }else if (!validateCategory()){
            $("#productType").focus();
        }else if(validateSubCategory()){

            let val_category = $( "#productType" ).val();

            let val_book_weight = $( "#weight" ).val();
            let val_dvd_size = $( "#size" ).val();
            let val_furn_length = $( "#length" ).val();
            let val_furn_width = $( "#width" ).val();
            let val_furn_height = $( "#height" ).val();
            let val_product_attrib = {};

            if (val_category == "DVD") {
                val_product_attrib = {
                    product_attrib: val_dvd_size  + ' MB'
                }
            }
            if (val_category == "Book") {
                val_product_attrib = {
                    product_attrib: val_book_weight  + ' KG'
                }
            }
            if (val_category == "Furniture") {
                val_product_attrib = {
                    product_attrib: val_furn_length + 'x' + val_furn_width + 'x' + val_furn_height
                }
            }

            sku = $("#sku").val();
            name = $("#name").val();
            price = $("#price").val();
            cat = $( "#productType" ).val();

            product_data = {product_sku: sku, product_name: name, product_price: price, product_type: cat}
            product_info = Object.assign({}, product_data, val_product_attrib);

            $.ajax({
                url: './../Controllers/Base.php',
                type: 'POST',
                data: { product_info },
                success: function(response){
                    window.location.replace("./listing.php");
                }
            });
        }

    });

});