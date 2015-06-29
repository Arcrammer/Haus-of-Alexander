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
  
  function initialiseThinView() {
    // Everything needed to accomodate a thin viewport
    $("nav").css("overflow","auto");
    // Show the hidden pancake button so the user can show the menu
    $(".pancake-button").css(visible);
    // Stack the navigation list
    $("nav ul").addClass("stack");
  }
  
  function deinitialiseThinView() {
    // Reversing everything needed to accomodate a thin viewport
    $("nav").css("overflow","visible");
    // Show the hidden pancake button so the user can show the menu
    $(".pancake-button").css(hidden);
    // Don't stack the navigation list items
    $("nav ul").removeClass("stack");
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
      // The viewport is thin and the header image is not in the view
      $("nav ul").css(hidden); // The navigation list should not be visible but hidden then made visible by a button tap
    } else if (thin && $(window).scrollTop() <= 150) {
      // The viewport is thin and the header image is in the view
      $(".pancake-button").css(hidden);
    }
  }
  
  function setNavigationBarStyle() {
    // Determine whether the navigation bar should adapt for thin (mobile) widths or wide (desktop) widths
    if (!thin) {
      // The viewport is wide
      deinitialiseThinView();
    } else {
      // The viewport is thin
      initialiseThinView();
    }
  }
  
  // Hide the pancake-button
  $(".pancake-button").css(hidden);
  
  $(window).scroll(function () {
    // Determine whether the navigation bar should show based on the current position from the top of the viewport
    getViewportSize();
    setNavigationBarVisibility();
    setNavigationBarStyle();
  });
  
  getViewportSize();
  setNavigationBarVisibility(); // Determine whether the navigation list should show before the user scrolls
  setNavigationBarStyle();
  $(window).resize(function () {
    getViewportSize();
    setNavigationBarVisibility();
    setNavigationBarStyle();
  });
  
  $(".pancake-button").click(function () {
    ($("nav ul").css("visibility") == "hidden") ? $("nav ul").css(visible) : $("nav ul").css(hidden);
  });
  
  $("nav ul").click(function () {
    (thin) ? $("nav ul").css(hidden) : null;
  });
});