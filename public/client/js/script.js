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

function validateForm1() {
  var commentField1 = document.getElementById("__contentComment1");
  var commentError1 = document.getElementById("commentError1");

  if (commentField1.value.trim() === "") {
    commentError1.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm2() {
  var commentField2 = document.getElementById("__contentComment2");
  var commentError2 = document.getElementById("commentError2");

  if (commentField2.value.trim() === "") {
    commentError2.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm3() {
  var commentField3 = document.getElementById("__contentComment3");
  var commentError3 = document.getElementById("commentError3");

  if (commentField3.value.trim() === "") {
    commentError3.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm4() {
  var commentField4 = document.getElementById("__contentComment4");
  var commentError4 = document.getElementById("commentError4");

  if (commentField4.value.trim() === "") {
    commentError4.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm5() {
  var commentField5 = document.getElementById("__contentComment5");
  var commentError5 = document.getElementById("commentError5");

  if (commentField5.value.trim() === "") {
    commentError5.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm6() {
  var commentField6 = document.getElementById("__contentComment6");
  var commentError6 = document.getElementById("commentError6");

  if (commentField6.value.trim() === "") {
    commentError6.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm8() {
  var commentField8 = document.getElementById("__contentComment8");
  var commentError8 = document.getElementById("commentError8");

  if (commentField8.value.trim() === "") {
    commentError8.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm9() {
  var commentField9 = document.getElementById("__contentComment9");
  var commentError9 = document.getElementById("commentError9");

  if (commentField9.value.trim() === "") {
    commentError9.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm11() {
  var commentField11 = document.getElementById("__contentComment11");
  var commentError11 = document.getElementById("commentError11");

  if (commentField11.value.trim() === "") {
    commentError11.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm12() {
  var commentField12 = document.getElementById("__contentComment12");
  var commentError12 = document.getElementById("commentError12");

  if (commentField12.value.trim() === "") {
    commentError12.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm14() {
  var commentField14 = document.getElementById("__contentComment14");
  var commentError14 = document.getElementById("commentError14");

  if (commentField14.value.trim() === "") {
    commentError14.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm15() {
  var commentField15 = document.getElementById("__contentComment15");
  var commentError15 = document.getElementById("commentError15");

  if (commentField15.value.trim() === "") {
    commentError15.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm17() {
  var commentField17 = document.getElementById("__contentComment17");
  var commentError17 = document.getElementById("commentError17");

  if (commentField17.value.trim() === "") {
    commentError17.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm18() {
  var commentField18 = document.getElementById("__contentComment18");
  var commentError18 = document.getElementById("commentError18");

  if (commentField18.value.trim() === "") {
    commentError18.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm20() {
  var commentField20 = document.getElementById("__contentComment20");
  var commentError20 = document.getElementById("commentError20");

  if (commentField20.value.trim() === "") {
    commentError20.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

function validateForm21() {
  var commentField21 = document.getElementById("__contentComment21");
  var commentError21 = document.getElementById("commentError21");

  if (commentField21.value.trim() === "") {
    commentError21.textContent = "Vui lòng nhập nội dung bình luận.";
    return false;
  }
  return true;
}

