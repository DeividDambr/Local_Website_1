//Storing common functions here that are used often

function openNav() {
    document.getElementById("myNav").style.width = "100%";
  }

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }

$(document).ready(function(){
  $(".dropdown").hover(function(){
      var dropdownMenu = $(this).children(".dropdown-menu");
      if(dropdownMenu.is(":visible")){
          dropdownMenu.parent().toggleClass("open");
      }
  });
});

