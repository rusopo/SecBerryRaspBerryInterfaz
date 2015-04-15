var mjpeg_img;
var mjpeg_imgRespo;
 
function reload_img () {
  mjpeg_img.src = "cam_pic.php?time=" + new Date().getTime();
}
function error_img () {
  setTimeout("mjpeg_img.src = 'cam_pic.php?time=' + new Date().getTime();", 100);
}
function init() {
  mjpeg_img = document.getElementById("mjpeg_dest");
  mjpeg_img.onload = reload_img;
  mjpeg_img.onerror = error_img;
  reload_img();
  mjpeg_imgRespo = document.getElementById("mjpeg_dest2");
  mjpeg_imgRespo.onload = reload_img_respo;
  mjpeg_imgRespo.onerror = error_img_respo;
  reload_img_respo();
}

function reload_img_respo () {
  mjpeg_imgRespo.src = "cam_pic.php?time=" + new Date().getTime();
}
function error_img_respo(){
  setTimeout("mjpeg_imgRespo.src = 'cam_pic.php?time' + new Date().getTime();" , 100);
}
