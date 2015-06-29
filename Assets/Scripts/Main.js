/*  Main.js
    Sunday, June 28, 2015
    Haus of Alexander
    Alexander Rhett Crammer  */

$(document).ready(function () {
  
  /* Properties */
  var visible = {
    "display":"block",
    "visibility":"visible"
  };
  var hidden = {
    "display":"none",
    "visibility":"hidden"
  };
  var thin;
  
  /* Methods */
  function getViewportSize() {
    thin = $(window).width() <= 700 ? true : false;
    return thin;
  }
  
  function setNavigationBarVisibility() {
    // Show or hide the navigation bar
    if (!thin && $(window).scrollTop() > 150) {
      // The viewport is wide and the header image is not in the view
      $("nav ul").css(visible);
    } else if (!thin && $(window).scrollTop() <= 150) {
      // The viewport is wide and the header image is in the view
      $("nav ul").css(hidden);      
    } else if (thin && $(window).scrollTop() > 150) {
      // The view is thin and the header image is not in the view
      $("nav").css("overflow","auto");
      // Show the hidden pancake button so the user can show the menu
      $(".pancake-button").css(visible);
      // The navigation list should not be visible but hidden then made visible by a button tap
      $("nav ul").css(hidden);
    } else if (thin && $(window).scrollTop() <= 150) {
      // The view is thin and the header image is in the viewport
      $(".pancake-button").css(hidden);
    }
  }
  
  function setNavigationBarStyle() {
    // Determine whether the navigation bar should adapt for thin (mobile) widths or wide (desktop) widths
    if (!thin) {
      // The viewport is wide
      $("nav ul").removeClass("stack");
    } else {
      // The viewport is thin
      $("nav ul").addClass("stack");
    }
  }
  
  // Hide the pancake-button
  $(".pancake-button").css(hidden);
  
  getViewportSize();
  $(window).resize(function () {
    getViewportSize();
  });
  
  setNavigationBarVisibility(); // Determine whether the navigation list should show before the user scrolls
  $(window).scroll(function () {
    // Determine whether the navigation bar should show based on the current position from the top of the viewport
    getViewportSize();
    setNavigationBarVisibility();
  });
  
  setNavigationBarStyle();
  $(window).resize(function () {
    getViewportSize();
    setNavigationBarStyle();
  });
  
  $(".pancake-button").click(function () {
    if ($("nav ul").css("visibility") == "hidden") {
      $("nav ul").css(visible);
    } else {
      $("nav ul").css(hidden);
    }
  });
  
  $("nav ul").click(function () {
    $("nav ul").css(hidden);
  });
});