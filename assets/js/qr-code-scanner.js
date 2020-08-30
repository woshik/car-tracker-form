'use strict';

var html5QrCodeObj;

function startCam(e) {
  Html5Qrcode.getCameras()
    .then(function (devices) {
      if (devices && devices.length) {
        html5QrCodeObj = new Html5Qrcode('qr-reader');
        var cameraId;

        if (devices.length > 1) {
          for (var index = 0; index < devices.length; index++) {
            if (devices[index].label.match(/back/gi)) {
              cameraId = devices[index].id;
              break;
            } else {
              cameraId = devices[devices.length - 1].id;
            }
          }
        } else {
          cameraId = devices[0].id;
        }

        document.getElementById('qrcode-wrapper').style.display = 'flex';
        document.getElementById('content-wrapper').style.display = 'none';
        html5QrCodeObj
          .start(
            cameraId,
            {
              fps: 30,
              // Optional frame per seconds for qr code scanning
              qrbox: 300, // Optional if you want bounded box UI
            },
            function (qrCodeMessage) {
              e.parentElement.children[2].value = qrCodeMessage;
              stopCam();
            }
          )
          .catch(function (err) {});
      } else {
        alert('No device found');
      }
    })
    .catch(function (err) {
      alert('Camera not found or Please update your browser.');
    });
}

function stopCam() {
  if (html5QrCodeObj) {
    html5QrCodeObj
      .stop()
      .then(function (ignore) {
        hideCanvas();
      })
      .catch(function (err) {
        alert(err.message || err);
      });
  } else {
    hideCanvas();
  }
}

function hideCanvas() {
  document.getElementById('qrcode-wrapper').style.display = 'none';
  document.getElementById('content-wrapper').style.display = 'block';
  html5QrCodeObj = null;
}
