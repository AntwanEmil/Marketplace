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

function forSaleproductsFunction(){
  const ForSaleButton = document.getElementById("ForSaleButton");
  const PurchasedButton = document.getElementById("PurchasedButton");
  const Added2ProfileButton = document.getElementById("Added2ProfileButton");
  const AddProductButton = document.getElementById("addProduct");
  
  const ForSaleClass = document.getElementById("ForSaleClass");
  const PurchasedClass = document.getElementById("PurchasedClass");
  const Added2profileClass = document.getElementById("Added2profileClass");

  ForSaleButton.classList.remove("btn-outline-dark");
  ForSaleButton.classList.add("btn-dark");
  ForSaleButton.disabled = true; 
  ForSaleClass.style.display = "flex"
  AddProductButton.style.visibility = "visible"

  PurchasedButton.classList.remove("btn-dark");
  PurchasedButton.classList.add("btn-outline-dark");
  PurchasedButton.disabled = false;
  PurchasedClass.style.display = "none"
  
  Added2ProfileButton.classList.remove("btn-dark");
  Added2ProfileButton.classList.add("btn-outline-dark");
  Added2ProfileButton.disabled = false; 
  Added2profileClass.style.display = "none"
}

function purchasedproductsFunction(){
  const ForSaleButton = document.getElementById("ForSaleButton");
  const PurchasedButton = document.getElementById("PurchasedButton");
  const Added2ProfileButton = document.getElementById("Added2ProfileButton");
  const AddProductButton = document.getElementById("addProduct");
  
  const ForSaleClass = document.getElementById("ForSaleClass");
  const PurchasedClass = document.getElementById("PurchasedClass");
  const Added2profileClass = document.getElementById("Added2profileClass");

  PurchasedButton.classList.remove("btn-outline-dark");
  PurchasedButton.classList.add("btn-dark");
  PurchasedButton.disabled = true; 
  PurchasedClass.style.display = "flex"
  AddProductButton.style.visibility = "hidden"

  ForSaleButton.classList.remove("btn-dark");
  ForSaleButton.classList.add("btn-outline-dark");
  ForSaleButton.disabled = false;
  ForSaleClass.style.display = "none";
  
  Added2ProfileButton.classList.remove("btn-dark");
  Added2ProfileButton.classList.add("btn-outline-dark");
  Added2ProfileButton.disabled = false; 
  Added2profileClass.style.display = "none";
}

function Added2ProfileproductsFunction(){
  const ForSaleButton = document.getElementById("ForSaleButton");
  const PurchasedButton = document.getElementById("PurchasedButton");
  const Added2ProfileButton = document.getElementById("Added2ProfileButton");
  const AddProductButton = document.getElementById("addProduct");

  const ForSaleClass = document.getElementById("ForSaleClass");
  const PurchasedClass = document.getElementById("PurchasedClass");
  const Added2profileClass = document.getElementById("Added2profileClass");
  

  Added2ProfileButton.classList.remove("btn-outline-dark");
  Added2ProfileButton.classList.add("btn-dark");
  Added2ProfileButton.disabled = true; 
  Added2profileClass.style.display = "flex"
  AddProductButton.style.visibility = "hidden"

  ForSaleButton.classList.remove("btn-dark");
  ForSaleButton.classList.add("btn-outline-dark");
  ForSaleButton.disabled = false;
  ForSaleClass.style.display = "none"
  
  PurchasedButton.classList.remove("btn-dark");
  PurchasedButton.classList.add("btn-outline-dark");
  PurchasedButton.disabled = false; 
  PurchasedClass.style.display = "none"
}