//STREAMING MJPEG

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


//
// Pantalla completa
//
function toggle_fullscreen(e) {

  var background = document.getElementById("background");

  if(!background) {
    background = document.createElement("div");
    background.id = "background";
    document.body.appendChild(background);
  }
  
  if(e.className == "fullscreen") {
    e.className = "zoom-imagen responsive-img";
    background.style.display = "none";
  }
  else {
    e.className = "fullscreen";
    background.style.display = "block";
  }

}


//
// ESTADO ARCHIVO STATUS_MJPEG.TXT
//
var ajax_status;

if(window.XMLHttpRequest) {
  ajax_status = new XMLHttpRequest();
}
else {
  ajax_status = new ActiveXObject("Microsoft.XMLHTTP");
}

ajax_status.onreadystatechange = function() {
  if(ajax_status.readyState == 4 && ajax_status.status == 200) {

    if(ajax_status.responseText == "ready") {
		$("#texto-estado").text("Streaming");
    }
    else if(ajax_status.responseText == "md_ready") {
      $("#texto-estado").text("Detección de movimiento activada");
    }
    else if(ajax_status.responseText == "video") {
      $("#texto-estado").text("Grabando video...");
    }
    else if(ajax_status.responseText == "timelapse") {
      $("#texto-estado").text("Streaming");
    }
    else if(ajax_status.responseText == "md_video") {
      $("#texto-estado").text("Grabando video por movimiento");
    }
    else if(ajax_status.responseText == "image") {
      $("#texto-estado").text("Capturando imagen...");
    }
    else if(ajax_status.responseText == "boxing") {
      $("#texto-estado").text("Empaquetando video...");
    }
    else if(ajax_status.responseText == "md_boxing") {
      $("#texto-estado").text("Empaquetando video por movimiento");
    }
    else if(ajax_status.responseText == "halted") {
      $("#texto-estado").text("Streaming caido");
    }
    else if(ajax_status.responseText.substr(0,5) == "Error") alert("Error en RaspiMJPEG: Reinicie el sistema");
    
    reload_ajax(ajax_status.responseText);

  }
}

function reload_ajax (last) {
  ajax_status.open("GET","status_mjpeg.php?last=" + last,true);
  ajax_status.send();
}