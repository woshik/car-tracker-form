<!DOCTYPE html>
<html lang="<?= $lang ?>">

<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="theme-color" content="#4285F4">
    <meta name="msapplication-navbutton-color" content="#4285F4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="description" content="Rental Tracker Installation Form" />
    <meta name="keywords" content="rental, tracker, tracker installation" />
    <meta name="author" content="Rental Tracker" />
    <link rel="icon" type="image/png" href="<?= base_url('/assets/images/icon.png') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custom.css') ?>">
</head>

<body>
    <div id="qrcode-barcode-wrapper">

        <button class="close" onclick="stopCam()">X</button>

        <div id="select-code-wrapper">
            <label for="select-code-option"><?= $select_bar_qr_scanner ?></label>
            <select id="select-code-option">
                <option value="0">Select</option>
                <option value="1">Bar Code</option>
                <option value="2">QR Code</option>
            </select>
        </div>

        <div id="barcode-canvas"></div>
        <canvas id="qrcode-canvas"></canvas>
    </div>

    <div id="content-wrapper">
        <header>
            <nav>
                <a href="<?= base_url($lang) ?>"><img src="<?= base_url('/assets/images/Rental-Tracker-logo.png') ?>"></a>
            </nav>
        </header>
        <div id="server-message" style="-webkit-transform: translateX(300px);-moz-transform: translateX(300px);-ms-transform: translateX(300px);-o-transform: translateX(300px);transform: translateX(300px);"></div>
        <div class="container-contact100">
            <div class="wrap-contact100">
                <?= form_open($lang . '/form/submit', ['class' => 'contact100-form', 'id' => 'installation-form']); ?>
                <span class="contact100-form-title ">
                    <?= $installation_form ?>
                </span>

                <div class="wrap-input100 validate-input" data-validate="Name is required">
                    <label class="label-input100" for="car_brand"><?= $car_brand ?></label>
                    <input class="input100" type="text" name="car_brand" id="car_brand" autocomplete="off">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="label-input100" for="type_of_car"><?= $type_of_car ?></label>
                    <input class="input100" type="text" name="type_of_car" id="type_of_car" autocomplete="off">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="label-input100" for="license_plate"><?= $license_plate ?> (<?= $required ?>)</label>
                    <input class="input100" type="text" name="license_plate" id="license_plate" autocomplete="off">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="label-input100" for="email_address"><?= $email_address ?> (<?= $required ?>)</label>
                    <input class="input100" type="text" name="email_address" id="email_address" placeholder="<?= $send_copy_of_installation_form_to_email_address ?>" autocomplete="off">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="label-input100" for="email_address_2"><?= $email_address ?> 2</label>
                    <input class="input100" type="text" name="email_address_2" id="email_address_2" placeholder="<?= $send_copy_of_installation_form_to_second ?>" autocomplete="off">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="label-input100" for="mileage"><?= $mileage ?></label>
                    <input class="input100" type="text" name="mileage" id="mileage" autocomplete="off">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="label-input100" for="working_hours"><?= $working_hours ?></label>
                    <input class="input100" type="text" name="working_hours" id="working_hours" autocomplete="off">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="label-input100" for="imei_code"><?= $scan_your_imei_code ?> (<?= $required ?>)</label>
                    <img src="<?= base_url('/assets/images/qr-code.svg') ?>" alt="scanner" class="qr-image" onclick="startCam(this)" />
                    <input class="input100" type="text" name="imei_code" id="imei_code" autocomplete="off">
                    <span class="focus-input100"></span>
                </div>


                <p class="text-important"><?= $important ?></p>
                <div class="wrap-input100 validate-input file-wrap">
                    <label class="label-input100 file-input-label" id="for_imei_picture" for="imei_picture"><?= $imei_picture ?> (<?= $required ?>)</label>
                    <input class="input100" type="file" name="imei_picture" accept=".png,.jpg,.jpeg" id="imei_picture" autocomplete="off">
                </div>

                <div class="wrap-input100 validate-input file-wrap">
                    <label class="label-input100 file-input-label" id="for_placement_picture" for="placement_picture"><?= $placement_picture ?></label>
                    <input class="input100" type="file" name="placement_picture" accept=".png,.jpg,.jpeg" id="placement_picture" autocomplete="off">
                </div>

                <div class="wrap-input100 validate-input file-wrap">
                    <label class="label-input100 file-input-label" id="for_license_plate_picture" for="license_plate_picture"><?= $license_plate_picture ?></label>
                    <input class="input100" type="file" name="license_plate_picture" accept=".png,.jpg,.jpeg" id="license_plate_picture" autocomplete="off">
                </div>

                <div class="button-wrap">
                    <button class="submit-button" type="submit"><?= $submit ?></button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <select style="display: none;" id="camera-select"></select>

    <script src="<?= base_url('/assets/js/jquery-3.5.1.min.js') ?>" defer></script>
    <script src="<?= base_url('/assets/js/lib/qrcodelib.js') ?>" defer></script>
    <script src="<?= base_url('/assets/js/lib/webcodecamjs.js') ?>" defer></script>
    <script src="<?= base_url('/assets/js/lib/quagga.min.js') ?>" defer></script>
    <script src="<?= base_url('/assets/js/main.js') ?>" defer></script>
    <script src="<?= base_url('/assets/js/bar-qr-code-scanner.js') ?>" defer></script>
</body>

</html>