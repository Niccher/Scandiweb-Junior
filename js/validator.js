$(document).ready(function () {
    function validateSku() {
        let val_sku = $("#sku").val();
        let err_sku_len = "";

        if (val_sku.length ==  ""){
            err_sku_len = "Product SKU is a needed"
            $("#err_sku").html(err_sku_len);
            return false;
        }else if (val_sku.length < 4) {
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
        }else if (val_price.length <= 1) {
            $("#err_price").html("");
            return true;
        }
    }
    function validateName() {
        let val_name = $("#name").val();
        let err_namee_len = "";

        if (val_name.length ==  ""){
            err_name_len = "Product Name is a needed"
            $("#err_name").html(err_name_len);
            return false;
        }else if (val_name.length <= 5) {
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
});