class Products{
    constructor(...args){
        this.attr = args;
    }
}

class Dvd extends Products{
    constructor(...args) {
        super(...args);
        this.attrs = args;
    }

    getAttr() {
        if (this.attrs == "" || this.attrs == undefined){
            return ""
        }else{
            return "Size: " + this.attrs + " MB";
        }
    }
}

class Book extends Products{
    constructor(...args) {
        super(...args);
        this.attrs = args;
    }

    getAttr() {
        if (this.attrs == "" || this.attrs == undefined){
            return ""
        }else{
            return "Weight: " + this.attrs + " KG";
        }
    }
}

class Furniture extends Products{
    constructor(...args) {
        super(...args)
        this.attrs = args;
    }

    getAttr(){
        var arr = this.attrs
        if (arr[0] == "" || arr[1] == "" || arr[2] == "" || arr[0] == undefined || arr[1] == undefined || arr[2] == undefined ){
            return ""
        }else{
            return "Dimension: " + this.attrs[0]  + " x " + this.attrs[1] + " x " + this.attrs[2]
        }
    }
}

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
            let valid = "";
            $.ajax({
                url: './../controller/Home.php',
                type: 'POST',
                async: false,
                data: { action: "sku_valid", product_sku: val_sku },
                success: function(response){
                    valid = response;
                }
            });
            if (valid == 'Valid'){
                $("#err_sku").addClass("text-success");
                $("#err_sku").removeClass("text-danger");
                $("#err_sku").html('SKU is valid');
                return true;
            }else {
                $("#err_sku").addClass("text-danger");
                $("#err_sku").removeClass("text-success");
                $("#err_sku").html('SKU is already in use, Use a different one');
                return false;
            }
            //return true;
        }
    }

    function validatePrice() {
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

        if (val_category === null){
            err_cat_len = "A valid category is needed"
            $("#err_productType").html(err_cat_len);
            return false;
        }else if (val_category.length >= 2) {
            $("#err_productType").html("");
            return true;
        }
    }

    function validateSubCategory() {
        let val_category = $( "#productType" ).val();

        if(val_category === null){
            return false
        }else {
            return true
        }
    }

    function isInputsEmpty() {
        var isEmpty = 0;
        $('#product_form input, #product_form select').each(
            function(){
                if (this.value == ""){
                    //console.log('Input Id: ' + this.id + ' is null.');
                    isEmpty = isEmpty + 1;
                    this.focus()
                    $("#err_" + this.id).html("Value is needed");
                }else{
                    $("#err_" + this.id).html("");
                }
            }
        );
        return isEmpty;
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

            let val_book_weight     = $("#weight").val();
            let val_dvd_size        = $("#size").val();
            let val_furn_length     = $("#length").val();
            let val_furn_width      = $("#width").val();
            let val_furn_height     = $("#height").val();
            let val_product_attrib  = {};

            var book = new Book(val_book_weight);
            var dvd = new Dvd(val_dvd_size);
            var furn = new Furniture(val_furn_height,val_furn_width,val_furn_length);

            val_product_attrib = {
                product_attrib: book.getAttr() + dvd.getAttr() + furn.getAttr()
            }
            console.log(val_product_attrib);

            let empty = isInputsEmpty()
            if (empty > 0){
                //console.log("An empty field is present " + empty)
            }else {

                sku = $("#sku").val();
                name = $("#name").val();
                price = $("#price").val();
                cat = $("#productType").val();

                product_data = {product_sku: sku, product_name: name, product_price: price, product_type: cat}
                product_info = Object.assign({}, product_data, val_product_attrib);

                $.ajax({
                    url: './../controller/Home.php',
                    type: 'POST',
                    data: { product_info },
                    success: function(response){
                        window.location.replace("./../index.php");
                    }
                });

            }

        }

    });

});