
$(document).ready(function () {
      $(".menu-icon").on("click", function () {
            $("nav ul").toggleClass("showing");
      });

      $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: 0,
            fitWidth: true
      });

      
      
});

// Scrolling Effect
$(window).on("scroll", function () {
      if ($(window).scrollTop()) {
            $('nav').addClass('black');
      }
      else {
            $('nav').removeClass('black');
      }
})



// LANGUARE TANSLATOR
function googleTranslateElementInit() {
      new google.translate.TranslateElement({
            pageLanguage: 'pt',
            includedLanguages: 'en,ja'
      }, 'google_translate_element');
}

function triggerHtmlEvent(element, eventName) {
      var event;
      if (document.createEvent) {
            event = document.createEvent('HTMLEvents');
            event.initEvent(eventName, true, true);
            element.dispatchEvent(event);
      } else {
            event = document.createEventObject();
            event.eventType = eventName;
            element.fireEvent('on' + event.eventType, event);
      }
}

// var jq = $.noConflict();
$('.translation-links a').click(function (e) {

      e.preventDefault();
      var lang = $(this).data('lang');
      // alert(lang);
      $('#google_translate_element select option').each(function () {

            // alert($(this).text().indexOf(lang));

            if ($(this).val().indexOf(lang) > -1) {
                  $(this).parent().val($(this).val());

                  var container = document.getElementById('google_translate_element');
                  var select = container.getElementsByTagName('select')[0];
                  triggerHtmlEvent(select, 'change');
            }
      });
});

// SMOOTH SCROLL

var scroll = new SmoothScroll('a[href*="#"]');