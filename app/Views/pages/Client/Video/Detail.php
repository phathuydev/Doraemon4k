<?php
use Core\Form;
use App\Core\AppServiceProvider;

$form = new Form();
$asp = new AppServiceProvider();

$item = $getVideoDetail; {
  extract($item);
?>
  <section class="trending-podcast-section container-video mt-5" style="margin-bottom: 180px;">
    <div class="row m-0">
      <div class="col-lg-8 col-sm-12 mt-2 p-0">
        <video id="video_controls" width="100%" class="__rd2" controls playsinline>
          <source src="<?= $video_path ?>" type="video/mp4">
        </video>
        <p class="text-dark mt-2 h5 font-weight-bold ps-2 pe-2"><?= $video_title ?></p>
        <div class="d-flex justify-content-between align-items-center ps-2 pe-2">
          <div class="d-flex justify-content-center align-items-center">
            <a href="https://www.facebook.com/anhzachdeptrainhatthegioi/"><img src="https://2.bp.blogspot.com/-5JzRsh0gSWw/Wx9cHZPmGtI/AAAAAAAABmQ/jfEbb9kGrdEwVHLisW1pIv7ezPbekJ9BwCLcBGAs/s640/17_tactics_that_made_doraemon_so_popular2.png" width="100" alt=""></a>
            <span class="ms-2 text-dark"><img src="<?= _WEB_ROOT ?>/public/client/images/verified.png" class="owl-carousel-verified-image img-fluid" width="20" alt=""></span>
          </div>
          <div class="d-flex justify-content-center align-items-center bg-black bg-opacity-75 rounded-5 p-2 text-white">
            <?php
            if (!empty($_SESSION['user_id_client'])) :
              if (!empty($countLikeVideoWhereUserAndVideo) == 0) : ?>
                <form method="post" id="insertLikeForm">
                  <input type="hidden" name="like" value="like">
                  <button class="bg-transparent border-0" type="button" id="ilike" data-href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $_GET['vdId'] ?>&cate=<?= $category_id ?>" onclick="insertLike()">
                    <div class="d-flex">
                      <div class="bi-hand-thumbs-up text-white m-0" id="thumbs_like"></div>
                      <div class="ms-1 text-white" id="number_like"><?= $countLikeVideo ?></div>
                    </div>
                  </button>
                </form>
              <?php else : ?>
                <form method="post" id="insertLikeForm">
                  <input type="hidden" name="like" value="like">
                  <button class="bg-transparent border-0" type="button" id="ilike" data-href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $_GET['vdId'] ?>&cate=<?= $category_id ?>" onclick="insertLike()">
                    <div class="d-flex">
                      <div class="bi-hand-thumbs-up-fill text-white m-0" id="thumbs_like"></div>
                      <div class="ms-1 text-white" id="number_like"><?= $countLikeVideo ?></div>
                    </div>
                  </button>
                </form>
              <?php endif ?>
            <?php else : ?>
              <button class="bg-transparent border-0 text-dark" data-bs-toggle="modal" href="#like_login">
                <div class="d-flex">
                  <div class="bi-hand-thumbs-up text-white m-0"></div>
                  <div class="ms-1 text-white" id="number_like"><?= $countLikeVideo ?></div>
                </div>
              </button>
              <div class="modal fade" id="like_login" aria-hidden="true" aria-labelledby="like_loginLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <p class="modal-title text-danger" id="like_loginLabel" style="font-weight: bold;"><i class="fa fa-exclamation me-2"></i>Lưu ý</p>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="model-body">
                      <p class="m-3 text-dark" style="font-weight: bold;">Đăng nhập để thích video này</p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary small" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                      <a href="<?= _WEB_ROOT ?>/signin" class="btn btn-primary small">Đăng Nhập</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif ?>
            <span class="ms-1 me-1">|</span>
            <?php if (!empty($_SESSION['user_id_client'])) : ?>
              <form method="post" id="deleteDisLikeForm">
                <input type="hidden" name="dislike" value="dislike">
                <button class="bg-transparent border-0" type="button" id="dislike" data-href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $_GET['vdId'] ?>&cate=<?= $category_id ?>" onclick="disLike()">
                  <div class="bi-hand-thumbs-down text-white m-0" id="thumbs_like_3"></div>
                </button>
              </form>
            <?php else : ?>
              <button type="button" data-bs-toggle="modal" href="#dislike_signin" class="bg-transparent border-0 text-dark">
                <div class="bi-hand-thumbs-down text-white m-0"></div>
              </button>
              <div class="modal fade" id="dislike_signin" aria-hidden="true" aria-labelledby="like_loginLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <p class="modal-title text-danger" id="like_loginLabel" style="font-weight: bold;"><i class="fa fa-exclamation me-2"></i>Lưu ý</p>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="model-body">
                      <p class="m-3 text-dark" style="font-weight: bold;">Đăng nhập để không thích video này</p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary small" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                      <a href="<?= _WEB_ROOT ?>/signin" class="btn btn-primary small">Đăng Nhập</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="p-3 bg-primary bg-opacity-25 rounded-2 mt-2 ms-1 me-1 mb-md-2">
          <div class="d-flex align-items-center">
            <span class="me-2" style="font-size: 14px;"><?= !empty($countViewVideo) ? $asp->formatView($countViewVideo) : 0 ?> lượt xem</span>
            <span style="font-size: 14px;"><?= $asp->formatTimeAgo(strtotime($created_at_video)) ?></span>
          </div>
          <div class="mt-2" id="longText">
            <?= $video_describe ?>
          </div>
          <button id="toggleButton" class="border-0 text-primary bg-transparent mt-1 p-0 small">Xem thêm...</button>
        </div>
        <div class="ms-1 me-1 __computerComment">
          <p class="text-dark m-0" style="font-weight: 400; font-size: 18px;">Bình luận (<?= $countCommentVideo['count'] ?>)</p>
          <div class="mt-2 text-end">
            <form onsubmit="return validateForm3()" action="<?= $current_url ?>" method="post">
              <textarea name="content" class="w-100 rounded-2 p-2" id="__contentComment3" maxlength="30" placeholder="Thể hiện ý kiến của bạn, tối đa 30 ký tự"></textarea>
              <div class="text-start">
                <span id="commentError3" class="text-danger"></span>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <div class="filter__sort p-0">
                  <select onchange="loadPage(this.value)" class="form-control-sm bg-dark text-white small">
                    <option value="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $_GET['vdId'] ?>&cate=<?= $_GET['cate'] ?>" <?= (empty($_GET['sort']) ? 'selected' : '') ?>>Mới Nhất</option>
                    <option value="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $_GET['vdId'] ?>&cate=<?= $_GET['cate'] ?>&sort=asc" <?= (!empty($_GET['sort']) == 'asc' ? 'selected' : '') ?>>Cũ Nhất</option>
                  </select>
                </div>
                <?= (!empty($_SESSION['user_id_client']) ? '<button type="submit" name="comment" class="btn btn-dark text-white p-1 border-0 rounded-1">Đăng</button>' :
                  '<a href="' . _WEB_ROOT . '/signin" class="btn btn-dark text-white p-1 border-0 rounded-1"><i class="fa fa-warning text-danger"></i> Đăng Nhập Để Bình Luận</a>') ?>
              </div>
            </form>
          </div>
          <?php include './app/Views/inc/Client/comment_computer.php'; ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 p-0 mb-2">
        <div class="row m-0">
          <div class="col-lg-12 col-md-12 col-sm-12 mt-2 mb-1 p-0">
            <div class="bg-black bg-opacity-10 pt-2 pb-2 ms-1 me-1 rounded-2">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="title ms-2">Danh Sách Phát</div>
                <div class="me-3" id="chevron-down"><i class="fa fa-chevron-up"></i></div>
              </div>
              <div id="vli-videos">
                <?php foreach ($getVideoCategory as $key => $data) { ?>
                  <div class="video-con <?= $data['video_id'] == $_GET['vdId'] ? 'active-con' : '' ?> rounded-2 d-flex align-items-center mb-2">
                    <div class="thumb d-flex align-items-center">
                      <a href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $data['video_id'] ?>&cate=<?= $data['category_id'] ?>">
                        <img src="<?= $data['video_image'] ?>" alt="">
                      </a>
                    </div>
                    <div class="v-titles ms-2">
                      <div class="title text-dark truncate-text-1"><?= $data['video_title'] ?></div>
                      <div class="sub-title mt-0">
                        <span class="truncate-text-1"><?= $data['video_describe'] ?></span>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-12 mt-2 mb-1 p-0">
            <div class="title ms-2">Phim Khác</div>
            <?php foreach ($getAllVideo as $key => $data) { ?>
              <div class="video-con d-flex align-items-center mt-2 ms-1 me-1 rounded-2">
                <div class="thumb d-flex align-items-center">
                  <a href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $data['video_id'] ?>&cate=<?= $data['category_id'] ?>">
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
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-12 p-0 __phoneComment border-top pt-2 p-0">
        <div class="ms-1 me-1">
          <p class="text-dark m-0" style="font-weight: 400; font-size: 18px;">Bình luận (<?= $countCommentVideo['count'] ?>)</p>
          <div class="mt-2 mb-1 text-end">
            <form onsubmit="return validateForm4()" action="<?= $current_url ?>" method="post">
              <textarea name="content" class="w-100 rounded-2 p-2" id="__contentComment4" maxlength="30" placeholder="Thể hiện ý kiến của bạn, tối đa 30 ký tự"></textarea>
              <div class="text-start">
                <span id="commentError4" class="text-danger"></span>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <div class="filter__sort p-0">
                  <select onchange="loadPage(this.value)" class="form-control-sm bg-dark text-white small">
                    <option value="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $_GET['vdId'] ?>&cate=<?= $_GET['cate'] ?>" <?= (empty($_GET['sort']) ? 'selected' : '') ?>>Mới Nhất</option>
                    <option value="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $_GET['vdId'] ?>&cate=<?= $_GET['cate'] ?>&sort=asc" <?= (!empty($_GET['sort']) == 'asc' ? 'selected' : '') ?>>Cũ Nhất</option>
                  </select>
                </div>
                <?= (!empty($_SESSION['user_id_client']) ? '<button type="submit" name="comment" class="btn btn-dark text-white p-1 border-0 rounded-1">Đăng</button>' :
                  '<a href="' . _WEB_ROOT . '/signin" class="btn btn-dark text-white p-1 border-0 rounded-1"><i class="fa fa-warning text-danger"></i> Đăng Nhập Để Bình Luận</a>') ?>
              </div>
            </form>
          </div>
          <?php include './app/Views/inc/Client/comment_phone.php'; ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>