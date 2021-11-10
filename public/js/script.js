function Loading() {
    setTimeout(function(){
      document.getElementById("loading").style.display = "none";
      document.getElementById("page").style.display = "block";
    }, 700);
  }
  window.onload = Loading;

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

function Buying_function(){
  document.getElementById("darkest_div").style.display = "block";
  document.getElementById("PopUpContent").style.display = "block";
  document.getElementById("ConfirmationGIF").style.display = "none";
  setTimeout(function(){
    document.getElementById("Buyying_setting_container").style.transform = "translateY(0%)";
  },100);
}

function Confirm_Buying_function(){
  document.getElementById("PopUpContent").style.display = "none";
  document.getElementById("ConfirmationGIF").style.display = "block";
  setTimeout(function(){
    document.getElementById("Buyying_setting_container").style.transform = "translateY(500%)";
    setTimeout(function(){
      document.getElementById("darkest_div").style.display = "none";
    },500);
  },1850);
}

function Cancel_Buying_function(){
  document.getElementById("Buyying_setting_container").style.transform = "translateY(500%)";
  setTimeout(function(){
    document.getElementById("darkest_div").style.display = "none";
  },500);
}

