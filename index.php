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
                <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Product Add</span>
                </a>
            </div>
        </header>

        <main>
            <div class="row mb-3 text-center">
                <div class="row mb-3">
                    <label for="input_sku" class="col-sm-2 col-form-label">Add a product</label>
                    <a href="add.php" class="col-sm-6 btn-outline-primary btn-sm" id="input_sku">
                        <div class="">Add Products</div>
                    </a>
                </div>
                <div class="row mb-3">
                    <label for="input_name" class="col-sm-2 col-form-label">View Product List</label>
                    <a href="listing.php" class="col-sm-6 btn-outline-primary btn-sm" id="input_name">
                        <div class="">List Products</div>
                    </a>
                </div>
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
</body>
<script src="./js/bootstrap.bundle.min.js" />
</htm>