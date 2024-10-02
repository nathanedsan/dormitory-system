var script1 = document.createElement('script');
script1.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js';

var link = document.createElement('link');
link.rel = 'stylesheet';
link.href = 'https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css';

var script2 = document.createElement('script');
script2.src = 'https://unpkg.com/sweetalert/dist/sweetalert.min.js';

document.head.appendChild(script1);
document.head.appendChild(link);
document.head.appendChild(script2);


var timeout = 24 * 30 * 60 * 1000;  //30分鐘 * 60秒 * 1000毫秒

var timer;

function resetTimer() {
  clearTimeout(timer);
  timer = setTimeout(logout, timeout);
}

function logout() {
  swal({
    title: "逾時登出",
    text: "你已經閒置過久，系統自動登出",
    icon: "info",
    allowOutsideClick: false,
    showCancelButton: false,
    showConfirmButton: false
  }).then((confirmValue) => {
    window.location.href = "logout.php";
  });
}


window.addEventListener("load", resetTimer);
window.addEventListener("click", resetTimer);
window.addEventListener("mousemove", resetTimer);
window.addEventListener("keypress", resetTimer);