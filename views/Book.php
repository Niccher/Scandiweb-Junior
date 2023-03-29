<?php

class Book{

    public static function getUi()
    {
        $regex = 'if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, "")';
        $ui = "<div class='card class-book col-sm-8'>
                    <label class='my-2'>Book Information</label>
                    <div class='row mb-3'>
                        <label for='weight' class='col-sm-3 col-form-label'>Weight (KG)&nbsp;<i class='fas fa-weight-hanging text-muted'></i></label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' id='weight' maxlength='4' placeholder='Book weight (Numbers only)' required onkeyup='".$regex."'>
                            <div id='err_weight' class='text-danger text-end small'></div>
                        </div>
                    </div>
                </div>";

        return $ui;
    }
}

    $book = new Book();
    echo $book->getUi();