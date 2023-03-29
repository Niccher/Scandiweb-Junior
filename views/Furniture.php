<?php

class Furniture{

    public static function getUi()
    {
        $regex = 'if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, "")';
        $ui = "<div class='card class-furniture col-sm-8'>
                    <label class='my-2'>Furniture Information</label>
                    <div class='row mb-3'>
                        <label for='length' class='col-sm-3 col-form-label'>Length (CM)&nbsp;<i class='fas fa-ruler text-muted'></i></label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' id='length' maxlength='4' required placeholder='Furniture length (Numbers only)' onkeyup='".$regex."'>
                            <div id='err_length' class='text-danger text-end small'></div>
                        </div>
                    </div>
                    <div class='row mb-3'>
                        <label for='width' class='col-sm-3 col-form-label'>Width (CM)&nbsp;<i class='fas fa-ruler-horizontal text-muted'></i></label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' id='width' maxlength='4' required placeholder='Furniture width (Numbers only)' onkeyup='".$regex."'>
                            <div id='err_width' class='text-danger text-end small'></div>
                        </div>
                    </div>
                    <div class='row mb-3'>
                        <label for='height' class='col-sm-3 col-form-label'>Height (CM) &nbsp;<i class='fas fa-ruler-vertical text-muted'></i></label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' id='height' maxlength='4' required placeholder='Furniture height (Numbers only)' onkeyup='".$regex."'>
                            <div id='err_height' class='text-danger text-end small'></div>
                        </div>
                    </div>
                </div>";

        return $ui;
    }
}

    $furn = new Furniture();
    echo $furn->getUi();