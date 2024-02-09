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
    }
};

// Thêm danh mục
function addCategory() {
    var form = $('#addCategoryForm')[0];
    var formData = new FormData(form);
    var image = $("#image").val();
    var name = $("#name").val();
    var err_image = $("#err_image");
    var err_name = $("#err_name");
    var url = $('#addCate').data('href');

    // Helper function to set error messages
    function setErrorMessage(field, message) {
        field.html(message);
    }

    // Clear error messages
    err_image.html('');
    err_name.html('');

    // Check for empty fields
    if (!image || !name) {
        if (!image) setErrorMessage(err_image, 'Vui lòng thêm ảnh');
        if (!name) setErrorMessage(err_name, 'Vui lòng nhập tên danh sách phát');
        return false;
    }

    $.ajax({
        url: url,
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.includes('Danh mục đã tồn tại!')) {
                Swal.fire({
                    icon: "error",
                    title: "Thất Bại",
                    text: "Tên Danh Mục Đã Tồn Tại!"
                });
            } else if (response.includes('Thêm thành công!')) {
                Swal.fire({
                    title: "Thành Công",
                    icon: "success"
                });
            }
        }
    });

    return false; // Prevent form submission
}


// Sửa danh mục
function editCategory() {
    var form = $('#editCategoryForm')[0];
    var formData = new FormData(form);
    var name = $("#name").val();
    var err_name = $("#err_name");
    var url = $('#editCate').data('href');

    // Helper function to set error messages
    function setErrorMessage(field, message) {
        field.html(message);
    }

    // Clear error messages
    err_name.html('');

    // Check for empty field
    if (!name) {
        setErrorMessage(err_name, 'Vui lòng nhập tên danh sách phát');
        return false;
    }

    $.ajax({
        url: url,
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.includes('Danh mục đã tồn tại!')) {
                Swal.fire({
                    icon: "error",
                    title: "Thất Bại",
                    text: "Tên Danh Mục Đã Tồn Tại!"
                });
            } else if (response.includes('Đã lưu thông tin chỉnh sửa!!')) {
                Swal.fire({
                    title: "Thành Công",
                    icon: "success"
                });
            }
        }
    });

    return false;
}

// Thêm video
function AddVideo() {
    var form = $('#addVideoForm')[0];
    var formData = new FormData(form);
    var image = $("#image").val();
    var video = $("#video").val();
    var title = $("#title").val();
    var describe = $("#describe").val();
    var err_image = $("#err_image");
    var err_video = $("#err_video");
    var err_title = $("#err_title");
    var err_describe = $("#err_describe");
    var url = $('#addVd').data('href');

    // Helper function to set error messages
    function setErrorMessage(field, message) {
        field.html(message);
    }

    err_image.html('');
    err_video.html('');
    err_title.html('');
    err_describe.html('');

    if (!image || !video || !title || !describe) {
        if (!image) setErrorMessage(err_image, 'Vui lòng thêm ảnh nhỏ');
        if (!video) setErrorMessage(err_video, 'Vui lòng thêm video');
        if (!title) setErrorMessage(err_title, 'Vui lòng nhập tiêu đề');
        if (!describe) setErrorMessage(err_describe, 'Vui lòng thêm mô tả cho video');
        return false;
    }

    $.ajax({
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                    $("#progress-bar").css("width", percentComplete + "%");
                    $("#progress-text").text((percentComplete < 100) ? "Đang Tải Lên: " + percentComplete + "% (Vui lòng không tắt màn hình trong quá trình tải)" : "Đang xử lí.......");
                }
            }, false);
            return xhr;
        },
        url: url,
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.includes('Thêm video thành công!')) {
                Swal.fire({
                    title: "Thêm Thành Công",
                    icon: "success"
                });
            }
        }
    });
    return false;
}


// Sửa video
function editVideo() {
    var form = $('#editVideoForm')[0];
    var formData = new FormData(form);
    var title = $("#title").val();
    var describe = $("#describe").val();
    var err_title = $("#err_title");
    var err_describe = $("#err_describe");
    var url = $('#editVd').data('href');

    function setErrorMessage(field, message) {
        field.html(message);
    }
    err_title.html('');
    err_describe.html('');

    if (!title || !describe) {
        if (!title) setErrorMessage(err_title, 'Vui lòng nhập tiêu đề');
        if (!describe) setErrorMessage(err_describe, 'Vui lòng thêm mô tả cho video');
        return false;
    }

    $.ajax({
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                    $("#progress-bar").css("width", percentComplete + "%");
                    $("#progress-text").text((percentComplete < 100) ? "Đang Tải Lên: " + percentComplete + "% (Vui lòng không tắt màn hình trong quá trình tải)" : "Đang xử lí.......");
                }
            }, false);
            return xhr;
        },
        url: url,
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.includes('Đã lưu chỉnh sửa!')) {
                Swal.fire({
                    title: "Chỉnh Sửa Thành Công",
                    icon: "success"
                });
            }
        }
    });

    return false;
}