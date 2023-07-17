import './bootstrap';
import jQuery from 'jquery';
import Alpine from 'alpinejs';

window.$ = jQuery;
window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
//	$("header").load("./includeHtml/header.html");
//  $("footer").load("./includeHtml/footer.html");
//  $("footer").load("/footer");

  dropDownMenu();
  
});

/* https://codepen.io/feillyne/pen/JLGwap */
// drop down menu has an accordion animation style
function dropDownMenu () {
  $('.menutitle').click(function() { 
    $(this).next('.menucontent').slideToggle();
  });

  $(document).click(function(e) { 
    var target = e.target; 
    if (!$(target).is('.menutitle') && !$(target).parents().is('.menutitle')) { 
      $('.menucontent').slideUp(); 
    }
  });
};
