(function ($) {
  "use strict";
  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
    return false;
  });
})(jQuery);

document.addEventListener("DOMContentLoaded", function () {
  var longText = document.getElementById("longText");
  var toggleButton = document.getElementById("toggleButton");

  toggleButton.addEventListener("click", function () {
    // Toggle the max-height property to show/hide text
    if (longText.style.maxHeight) {
      longText.style.maxHeight = null;
      toggleButton.textContent = "Xem thêm";
    } else {
      longText.style.maxHeight = longText.scrollHeight + "px";
      toggleButton.textContent = "Thu gọn";
    }
  });
});

function inupcmt() {
  let cmtList = document.querySelectorAll('.cmt');
  let sendList = document.querySelectorAll('.send');

  for (let i = 0; i < cmtList.length; i++) {
    let cmt = cmtList[i];
    let send = sendList[i];

    cmt.addEventListener('input', function () {
      send.disabled = cmt.value.length === 0;
    });
  }
}

document.addEventListener('DOMContentLoaded', function () {
  var playlistContainer = document.getElementById('vli-videos');
  var chevronIcon = document.getElementById('chevron-down');

  chevronIcon.addEventListener('click', function () {
    playlistContainer.classList.toggle('hidden');
    toggleChevronIcon();
  });

  function toggleChevronIcon() {
    if (playlistContainer.classList.contains('hidden')) {
      chevronIcon.innerHTML = '<i class="fa fa-chevron-down"></i>';
    } else {
      chevronIcon.innerHTML = '<i class="fa fa-chevron-up"></i>';
    }
  }
});

document.addEventListener('DOMContentLoaded', function () {
  var navbarNav = document.getElementById('navbarNav');
  var navbarToggler = document.querySelector('.navbar-toggler');

  navbarToggler.addEventListener('click', function () {
    // Toggle the 'show' class on the collapsible element
    navbarNav.classList.toggle('show');

    // Check if the navbar is currently shown
    var isNavbarShown = navbarNav.classList.contains('show');

    // Update the data-bs-target attribute based on the show/hide state
    if (isNavbarShown) {
      navbarToggler.setAttribute('aria-expanded', 'true');
      navbarToggler.setAttribute('data-bs-target', '');
      navbarToggler.setAttribute('data-bs-dismiss', 'modal');
    } else {
      navbarToggler.setAttribute('aria-expanded', 'false');
      navbarToggler.setAttribute('aria-expanded', 'false');
      navbarToggler.setAttribute('data-bs-target', '#navbarNav');
      navbarToggler.removeAttribute('data-bs-dismiss');
    }
  });
});
