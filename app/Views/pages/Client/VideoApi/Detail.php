<?php

use Core\Form;
use App\Core\AppServiceProvider;

$form = new Form();
$asp = new AppServiceProvider();

$item = $getVideoDetail; {
  extract($item);
?>
  <section class="trending-podcast-section container-video mt-lg-5" style="margin-bottom: 180px;">
    <div class="row m-0">
      <div class="col-12 mt-1 p-0">
        <?php $value = $episodes; { ?>
          <iframe src="<?= $value[$_GET['epi'] - 1]['link_embed'] ?>" width="100%" class="embed-responsive-item" frameborder="0" allowfullscreen playsinline></iframe>
        <?php } ?>
        <p class="text-dark mt-2 h5 font-weight-bold ps-2 pe-2 mb-2"><?= $video_title ?></p>
        <div class="p-3 bg-primary bg-opacity-25 rounded-2 mt-2 ms-1 me-1">
          <div class="d-flex align-items-center">
            <span class="me-2" style="font-size: 14px;"><?= $data['view'] ?> lượt xem</span>
            <span style="font-size: 14px;"><?= $asp->formatTimeAgo(strtotime($created_at)) ?></span>
          </div>
          <div class="mt-2" id="longText">
            <?= $data['content'] ?>
          </div>
          <button id="toggleButton" class="border-0 text-primary bg-transparent mt-1 p-0 small">Xem thêm...</button>
        </div>
        <div class="text-lg-start ms-1 me-1">
          <div class="mt-2">
            <?php if (!empty($episodes[0]['name'] == 1)) : ?>
              <label for="" class="form-label" style="font-weight: 500;">Xem Tiếp</label>
              <select class="form-select form-control-sm bg-dark text-white small mb-1 rounded-2 border-dark" onchange="loadPage(this.value)">
                <?php foreach ($episodes as $items) {
                  if (!empty($items['name']) && $items['name'] !== 'full' && $items['name'] !== 'Full') : ?>
                    <option value="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $items['name'] ?>" <?= (!empty($_GET['epi']) && $_GET['epi'] == $items['name']) ? 'selected' : ''; ?>>Tập <?= $items['name'] ?></option>
                <?php endif;
                } ?>
              </select>
            <?php endif ?>
          </div>
        </div>
      </div>
      <?php foreach ($getAllVideo as $key => $data) { ?>
        <div class="col-lg-6 col-sm-12 p-0 mt-1">
          <div class="video-con <?= $data['video_id'] == $_GET['vdId'] ? 'active-con' : '' ?> rounded-2 d-flex align-items-center mt-1 ms-1 me-1">
            <div class="thumb d-flex align-items-center">
              <a href="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $data['video_id'] ?>&slug=<?= $data['video_slug'] ?>&epi=1">
                <img class="rounded-2" src="<?= $data['video_image'] ?>" alt="">
              </a>
            </div>
            <div class="v-titles ms-2">
              <div class="title text-dark truncate-text-1"><?= $data['video_title'] ?></div>
              <div class="sub-title mt-0">
                <span class="truncate-text-1"><?= $data['video_describe'] ?></span>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-12 p-0 border-top mt-3 pt-2 p-0">
        <div class="ms-1 me-1">
          <p class="text-dark m-0" style="font-weight: 400; font-size: 18px;">Bình luận (<?= $countCommentVideo['count'] ?>)</p>
          <div class="mt-2 mb-1 text-end">
            <form action="<?= $current_url ?>" method="post">
              <textarea name="content" class="w-100 rounded-2 p-2" id="__contentComment" maxlength="30" placeholder="Thể hiện ý kiến của bạn, tối đa 30 ký tự"></textarea>
              <div class="text-start">
                <span id="commentError" class="text-danger"></span>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <div class="filter__sort p-0">
                  <select onchange="loadPage(this.value)" class="form-control-sm bg-dark text-white small">
                    <option value="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" <?= (empty($_GET['sort']) ? 'selected' : '') ?>>Mới Nhất</option>
                    <option value="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>&sort=asc" <?= (!empty($_GET['sort']) == 'asc' ? 'selected' : '') ?>>Cũ Nhất</option>
                  </select>
                </div>
                <?= (!empty($_SESSION['user_id_client']) ? '<button type="submit" name="comment" onclick="return validateForm()" class="btn btn-dark text-white p-1 border-0 rounded-1">Đăng</button>' :
                  '<a href="' . _WEB_ROOT . '/signin" class="btn btn-dark text-white p-1 border-0 rounded-1"><i class="fa fa-warning text-danger"></i> Đăng Nhập Để Bình Luận</a>') ?>
              </div>
            </form>
          </div>
          <?php include './app/Views/inc/Client/comment.php'; ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<script>
  function validateForm() {
    var content = document.getElementById("__contentComment").value.trim();
    var errorSpan = document.getElementById("commentError");

    if (content === "") {
      errorSpan.innerText = "Vui lòng nhập nội dung bình luận.";
      return false; // Ngăn form được gửi đi
    } else {
      errorSpan.innerText = ""; // Xóa thông báo lỗi nếu có
      return true; // Cho phép form được gửi đi
    }
  }
</script>