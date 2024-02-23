// DisLike
function disLike() {
  var form = $('#deleteDisLikeForm')[0];
  var formData = new FormData(form);
  var url = $('#dislike').data('href');
  var isLiked = $('#thumbs_like').hasClass('bi-hand-thumbs-up-fill');
  var isLiked2 = $('#thumbs_like_2').hasClass('bi-hand-thumbs-up-fill');
  $.ajax({
    url: url,
    type: 'post',
    data: formData,
    contentType: false,
    processData: false,
    success: function () {
      var likeCountElement = $('#number_like');
      var likeCountElement2 = $('#number_like_2');
      var currentLikeCount = parseInt(likeCountElement.text(), 10) || 0;
      var currentLikeCount2 = parseInt(likeCountElement2.text(), 10) || 0;
      if (isLiked) {
        likeCountElement.text(currentLikeCount - 1);
        $('#thumbs_like').removeClass('bi-hand-thumbs-up-fill');
        $('#thumbs_like').addClass('bi-hand-thumbs-up');
      } else if (isLiked2) {
        likeCountElement2.text(currentLikeCount2 - 1);
        $('#thumbs_like_2').removeClass('bi-hand-thumbs-up-fill');
        $('#thumbs_like_2').addClass('bi-hand-thumbs-up');
      }
    }
  });
}

// Like
function insertLike() {
  var form = $('#insertLikeForm')[0];
  var formData = new FormData(form);
  var url = $('#ilike').data('href');
  var isLiked = $('#thumbs_like').hasClass('bi-hand-thumbs-up-fill');
  $.ajax({
    url: url,
    type: 'post',
    data: formData,
    contentType: false,
    processData: false,
    success: function () {
      var likeCountElement = $('#number_like');
      var currentLikeCount = parseInt(likeCountElement.text(), 10) || 0;
      if (!isLiked) {
        likeCountElement.text(currentLikeCount + 1);
        $('#thumbs_like').removeClass('bi-hand-thumbs-up');
        $('#thumbs_like').addClass('bi-hand-thumbs-up-fill');
      } else {
        likeCountElement.text(currentLikeCount - 1);
        $('#thumbs_like').removeClass('bi-hand-thumbs-up-fill');
        $('#thumbs_like').addClass('bi-hand-thumbs-up');
      }
    }
  });
}


function signupClient() {
  var form = $("#signupClientForm")[0];
  var formData = new FormData(form);
  var name = $("#nameSignup").val();
  var email = $("#emailSignup").val();
  var password = $("#passwordSignup").val();
  var cpassword = $("#cpasswordSignup").val();
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var err_name = $("#err_name");
  var err_email = $("#err_email");
  var err_password = $("#err_password");
  var err_cpassword = $("#err_cpassword");
  var url = $("#signupClientId").data('href');
  var urlLogin = $("#signupClientId").data('login');

  function setErrorMessage(field, message) {
    field.html(message);
  }

  // Clear existing error messages
  err_name.html('');
  err_email.html('');
  err_password.html('');
  err_cpassword.html('');

  if (!name || !email || !password || !cpassword) {
    if (!name) setErrorMessage(err_name, 'Vui lòng nhập họ tên của bạn');
    if (!email) setErrorMessage(err_email, 'Vui lòng nhập vào email của bạn');
    if (!password) setErrorMessage(err_password, 'Vui lòng nhập mật khẩu');
    if (!cpassword) setErrorMessage(err_cpassword, 'Vui lòng nhập lại mật khẩu');
    return false;
  } else if (!emailRegex.test(email)) {
    setErrorMessage(err_email, 'Email không đúng định dạng');
    return false;
  } else if (name.length > 30) {
    setErrorMessage(err_name, 'Họ tên không được vượt quá 20 ký tự');
    return false;
  } else if (password.length < 6) {
    setErrorMessage(err_password, 'Mật Khẩu Quá Ngắn');
    return false;
  } else if (cpassword !== password) {
    setErrorMessage(err_cpassword, 'Mật khẩu nhập lại chưa khớp');
    return false;
  }

  $.ajax({
    url: url,
    type: 'post',
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.includes('Tài Khoản Đã Tồn Tại!')) {
        Swal.fire({
          icon: "error",
          title: "Đăng ký thất bại",
          text: "Tài Khoản Đã Tồn Tại!"
        });
      } else if (response.includes('Đăng Ký Thành Công!')) {
        loadPage(urlLogin);
      }
    },
  });
  return false;
}

function signinClient() {
  var form = $("#signinClientForm")[0];
  var formData = new FormData(form);
  var email = $("#emailSignin").val();
  var password = $("#passwordSignin").val();
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var err_email = $("#err_email_signin");
  var err_password = $("#err_password_signin");
  var url = $("#signinClientId").data('href');
  var urlHome = $("#signinClientId").data('home');

  function setErrorMessage(field, message) {
    field.html(message);
  }

  err_email.html('');
  err_password.html('');

  if (!email || !password) {
    if (!email) setErrorMessage(err_email, 'Vui lòng nhập email');
    if (!password) setErrorMessage(err_password, 'Vui lòng nhập mật khẩu');
    return false;
  } else if (!emailRegex.test(email)) {
    setErrorMessage(err_email, 'Email sai định dạng');
    return false;
  }

  $.ajax({
    url: url,
    type: 'post',
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.includes('Email hoặc mật khẩu không chính xác!')) {
        Swal.fire({
          icon: "error",
          title: "Đăng nhập thất bại",
          text: "Email hoặc mật khẩu không chính xác!"
        });
      } else if (response.includes('Đăng nhập thành công!')) {
        loadPage(urlHome);
      }
    },
  });

  return false;
}

function forgotClient() {
  var form = $("#forgotClientForm")[0];
  var formData = new FormData(form);
  var email = $("#emailForgot").val();
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var err_email = $("#err_email_forgot");
  var url = $("#forgotClientId").data('href');

  function setErrorMessage(field, message) {
    field.html(message);
  }

  err_email.html('');

  if (!email) {
    if (!email) setErrorMessage(err_email, 'Vui lòng nhập email');
    return false;
  } else if (!emailRegex.test(email)) {
    setErrorMessage(err_email, 'Email sai định dạng');
    return false;
  }


  $.ajax({
    url: url,
    type: 'post',
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.includes('Không Tìm Thấy Email!')) {
        Swal.fire({
          icon: "error",
          title: "Gửi Yêu Cầu Thất Bại",
          text: "Không Tìm Thấy Email!",
        });
      } else if (response.includes('Đường dẫn đổi mật khẩu đã gửi đến Email của bạn, vui lòng kiểm tra!')) {
        Swal.fire({
          title: "Gửi Yêu Cầu Thành Công",
          icon: "success",
          text: 'Đường dẫn đổi mật khẩu đã gửi đến Email của bạn, vui lòng kiểm tra!',
        });
      }
    },
  });
  return false;
}

function resetPass() {
  var form = $("#resetPassForm")[0];
  var formData = new FormData(form);
  var password_new = $("#password_new").val();
  var cpassword_new = $("#cpassword_new").val();
  var err_password_reset = $("#err_password_reset");
  var err_cpassword_reset = $("#err_cpassword_reset");
  var url = $("#resetPassId").data('href');
  var urlLogin = $("#resetPassId").data('login');

  function setErrorMessage(field, message) {
    field.html(message);
  }

  err_password_reset.html('');
  err_cpassword_reset.html('');

  if (!password_new || !cpassword_new) {
    if (!password_new) setErrorMessage(err_password_reset, 'Vui lòng nhập mật khẩu mới');
    if (!cpassword_new) setErrorMessage(err_cpassword_reset, 'Vui lòng nhập lại mật khẩu mới');
    return false;
  } else if (password_new.length < 6) {
    setErrorMessage(err_password_reset, 'Mật Khẩu Quá Ngắn');
    return false;
  } else if (cpassword_new !== password_new) {
    setErrorMessage(err_cpassword_reset, 'Mật khẩu nhập lại chưa khớp');
    return false;
  }

  $.ajax({
    url: url,
    type: 'post',
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.includes('Mật khẩu đã được thay đổi')) {
        loadPage(urlLogin);
      }
    },
  });
  return false;
}

// Load Trang
function loadPage(page) {
  $.ajax({
    url: page,
    type: 'GET',
    success: function (data) {
      // Cập nhật giao diện trang
      $('#cont').html(data);

      // Cập nhật địa chỉ thanh url
      history.pushState({
        page: page
      }, '', page);
    }
  });
}

// Load lại trang trước
window.onpopstate = function (event) {
  if (event.state && event.state.page) {
    loadPage(event.state.page);
  } else {
    loadPage('home');
  }
};