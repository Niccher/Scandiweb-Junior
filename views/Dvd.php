<?php

class Dvd{

    public static function getUi()
    {
        $regex = 'if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9\.]/g, "")';
        $ui = "<div class='card class-dvd col-sm-8'>
                    <label class='my-2'>DVD Information</label>
                    <div class='row mb-3'>
                        <label for='size' class='col-sm-3 col-form-label'>Size (MB)&nbsp;<i class='fas fa-database text-muted'></i></label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' id='size' maxlength='4' required placeholder='Disk Size (Numbers only)' onkeyup='".$regex."'>
                            <div id='err_size' class='text-danger text-end small'></div>
                        </div>
                    </div>

                </div>";

        return $ui;
    }
}

    $dvd = new Dvd();
    echo $dvd->getUi();