<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['lang'] = "de";
$lang['title'] = "Schnell Installationsformular - Rental Tracker";
$lang['installation_form'] = "Schnell Installationsformular";
$lang['required'] = "Obligatorisch";
$lang['scan_your_imei_code'] = "Scannen Sie Ihren IMEI-Code";
$lang['imei_code'] = "IMEI-Code";
$lang['car_brand'] = "Automarke";
$lang['type_of_car'] = "Art von Auto";
$lang['license_plate'] = "Nummernschild";
$lang['email_address'] = "E-Mail-Adresse";
$lang['mileage'] = "Kilometerstand";
$lang['working_hours'] = "Arbeitszeit";
$lang['imei_picture'] = "Bild des IMEI-Codes hochladen";
$lang['placement_picture'] = "Bild der Platzierung hochladen";
$lang['license_plate_picture'] = "Bild des Nummernschilds hochladen";
$lang['send_copy_of_installation_form_to_email_address'] = "Senden Sie eine Kopie des Installationsformulars an die E-Mail-Adresse";
$lang['send_copy_of_installation_form_to_second'] = "Kopie des Installationsformulars an die zweite E-Mail-Adresse senden";
$lang['important'] = "Hinweis: 5 MB PNG- und JPG-Datei für diese Felder zulässig";
$lang['submit'] = "EINREICHEN";
$lang['is_required'] = "Feld ist erforderlich";
$lang['submit_successful'] = "Das Formular wurde erfolgreich eingereicht";
$lang['server_error'] = "Serverfehler, bitte versuchen Sie es erneut";
$lang['select_bar_qr_scanner'] = "Wählen Sie Barcode / QR-Code-Scanner";
$lang['select'] = "Wählen";
$lang['is_not_valid'] = "ist nicht gültig";
$lang['email_subject'] = "Neues Installationsformular - IMEI-(%IMEI%) - (%LICENSE%)";
$lang['email_body'] = "
    Hallo,\n\n
    Ein eingebautes Formular wurde unter ausgefüllt. In dieser E-Mail senden wir Ihnen das Installationsformular im PDF-Format.\n\n
    Mit freundlichen Grüßen,\n
    Vermietung Tracker\n
    https://rentaltracker.de\n\n
    (%LANG_car_brand%)         : (%car_brand%)\n
    (%LANG_type_of_car%)       : (%type_of_car%)\n
    (%LANG_license_plate%)     : (%license_plate%)\n
    (%LANG_email_address%)     : (%email_address%)\n
    (%LANG_email_address_2%)   : (%email_address_2%)\n
    (%LANG_mileage%)           : (%mileage%)\n
    (%LANG_working_hours%)     : (%working_hours%)\n
    (%LANG_imei_code%)         : (%imei_code%)\n
";

$lang['upload_jpg_or_png_file'] = "Der Upload eines IMEI-Codes ist 5 MB vereist";
$lang['picture_of_imei_code'] = "Bild des IMEI-Codes";
$lang['picture_of_placement'] = "Bild der Platzierung";
$lang['picture_of_license_plate'] = "Bild des Nummernschildes";
$lang['form_submit_message'] = "Ihr vorheriges Formular wurde erfolgreich gesendet.";