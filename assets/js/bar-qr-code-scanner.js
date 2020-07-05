var decoder,
  codeInputField,
  QuaggaStart = false;

window.addEventListener('DOMContentLoaded', function () {
  // jQuery QR code reader
  var options = {
    DecodeQRCodeRate: 10, // null to disable OR int > 0 !
    DecodeBarCodeRate: null, // null to disable OR int > 0 !
    successTimeout: 500, // delay time when decoding is succeed
    codeRepetition: false, // accept code repetition true or false
    frameRate: 25, // 1 - 25
    flipVertical: false, // boolean
    flipHorizontal: false, // boolean
    zoom: -1, // if zoom = -1, auto zoom for optimal resolution else int
    beep: './assets/js/audio/beep.mp3', // string, audio file location
    decoderWorker: './assets/js/lib/DecoderWorker.js', // string, DecoderWorker file location
    brightness: 0, // int
    autoBrightnessValue: false, // functional when value autoBrightnessValue is int
    grayScale: false, // boolean
    contrast: 0, // int
    threshold: 0, // int
    sharpness: [], // to On declare matrix, example for sharpness ->  [0, -1, 0, -1, 5, -1, 0, -1, 0]
    resultFunction: function (result) {
      codeInputField.value = result.code;
      stopCam();
    },
    cameraSuccess: function (stream) {},
    canPlayFunction: function () {
      alert('canPlayFunction');
      stopCam();
    },
    getDevicesError: function (error) {
      alert('getDevicesError : ', error);
      stopCam();
    },
    getUserMediaError: function (error) {
      alert("Sorry, Browser doesn't support this feature. Please, use google chrome updated version.");
      stopCam();
    },
    cameraError: function (error) {
      alert('Requested camera device not found');
      stopCam();
    },
  };

  decoder = new WebCodeCamJS('#qrcode-canvas').buildSelectMenu('#camera-select', 'environment|back').init(options);
});

function startCam(e) {
  if (navigator.mediaDevices && typeof navigator.mediaDevices.getUserMedia === 'function') {
    codeInputField = e.parentElement.children[2];
    document.getElementById('qrcode-barcode-wrapper').style.display = 'flex';
    document.body.style.overflow = 'hidden';
    window.scrollTo(0, 1);
  } else {
    alert("Sorry, Browser doesn't support this feature. Please, use google chrome updated version.");
  }
}

function stopCam() {
  document.getElementById('qrcode-barcode-wrapper').style.display = 'none';

  document.getElementById('barcode-canvas').style.display = 'none';
  document.getElementById('qrcode-canvas').style.display = 'none';

  document.getElementById('select-code-wrapper').style.display = 'block';

  document.getElementById('select-code-option').value = '0';

  document.body.style.overflow = 'auto';

  decoder.stop();

  QuaggaStart && Quagga.stop();
  QuaggaStart = false;
}

document.getElementById('select-code-option').addEventListener('change', function (e) {
  var n = parseInt(e.target.value);

  document.getElementById('select-code-wrapper').style.display = 'none';

  if (n === 1) {
    document.getElementById('barcode-canvas').style.display = 'block';
    runQuagga();
  } else if (n === 2) {
    document.getElementById('qrcode-canvas').style.display = 'block';

    var selectOptionEle = document.getElementById('camera-select').children;

    if (selectOptionEle.length > 1) {
      selectOptionEle[selectOptionEle.length - 1].setAttribute('selected', 'selected');
    }

    decoder.play();
  }
});

function runQuagga() {
  Quagga.init(
    {
      inputStream: {
        name: 'Live',
        type: 'LiveStream',
        numOfWorkers: navigator.hardwareConcurrency,
        target: document.querySelector('#barcode-canvas'), // Or '#yourElement' (optional)
      },
      decoder: {
        readers: ['code_128_reader', 'upc_reader'],
      },
    },
    function (err) {
      if (err) {
        alert('Requested camera device not found');
        stopCam();
        return;
      }
      QuaggaStart = true;
      Quagga.start();
    }
  );
}

Quagga.onDetected(function (data) {
  codeInputField.value = data.codeResult.code;
  stopCam();
});
