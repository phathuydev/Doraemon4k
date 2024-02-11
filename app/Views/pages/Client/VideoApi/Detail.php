<?php
ob_start();

use Core\Form;

$form = new Form();

$item = $getVideoDetail; {
  extract($item);
?>
  <section class="trending-podcast-section container-video mt-5" style="margin-bottom: 180px;">
    <div class="row m-0">
      <div class="col-lg-8 col-sm-12 mt-2 p-0">
        <?php $value = $episodes; { ?>
          <iframe src="<?= $value[$_GET['epi'] - 1]['link_embed'] ?>" width="100%" class="embed-responsive-item rounded-2" frameborder="0" allowfullscreen playsinline></iframe>
        <?php } ?>
        <p class="text-dark mt-2 mb-3 h5 font-weight-bold ps-2 pe-2 ps-md-0 pe-md-0 ps-lg-0 pe-lg-0"><?= $video_title ?></p>
        <div class="d-flex justify-content-between align-items-center ps-2 pe-2 ps-md-0 pe-md-0 ps-lg-0 pe-lg-0">
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
                      <p class="modal-title text-danger" id="like_loginLabel" style="font-weight: bold;"><i class="fa fa-warning text-danger"></i> Lưu ý</p>
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
                      <p class="modal-title text-danger" id="like_loginLabel" style="font-weight: bold;"><i class="fa fa-warning text-danger"></i> Lưu ý</p>
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
        <div class="p-3 bg-black bg-opacity-75 rounded-2 mt-3 ms-1 me-1">
          <div class="d-flex align-items-center">
            <span class="text-white me-2" style="font-size: 14px;"><?= $data['view'] ?> lượt xem</span>
            <span class="text-white" style="font-size: 14px;"><?= formatTimeAgo(strtotime($created_at_video)) ?></span>
          </div>
          <div class="mt-2" id="longText">
            <p class="m-0" style="font-size: 14px;"><?= $data['content'] ?></p>
          </div>
          <button id="toggleButton" class="bg-white text-dark border-0 h6 mt-2">Xem thêm</button>
        </div>
        <div class="mt-3 text-center text-lg-start">
          <?php foreach ($episodes as $items) {
            if (isset($items['slug']) && $items['slug'] !== 'full') : ?>
              <a href="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= isset($_GET['vdId']) ? $_GET['vdId'] : '' ?>&slug=<?= isset($_GET['slug']) ? $_GET['slug'] : '' ?>&epi=<?= $items['slug'] ?>" class="p-2 rounded-1 text-white mb-1 <?= (isset($_GET['epi']) && $_GET['epi'] == $items['slug']) ? 'selected' : 'bg-dark'; ?>">Tập <?= $items['slug'] ?></a>
          <?php endif;
          } ?>
        </div>
        <div class="mt-3 ms-1 me-1" id="__computerComment">
          <p class="text-dark m-0" style="font-weight: 400; font-size: 18px;">Bình luận</p>
          <div class="mt-2 text-end">
            <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
              <textarea id="editor" name="content"></textarea>
              <?= (!empty($_SESSION['user_id_client']) ? '<button type="submit" name="comment" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Đăng</button>' :
                '<a href="' . _WEB_ROOT . '/signin" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1"><i class="fa fa-warning text-danger"></i> Đăng Nhập Để Bình Luận</a>') ?>
            </form>
          </div>
          <script>
            ClassicEditor
              .create(document.querySelector('#editor'))
              .catch(error => {
                console.error(error);
              });
          </script>
          <?php include './app/Views/inc/Client/comment.php'; ?>
        </div>

        <div class="mt-3 rounded-2 ms-1 me-1" id="__phoneComment">
          <a class="btn btn-light w-100 " data-bs-toggle="modal" href="#exampleModalToggle" role="button">
            <div class="text-start text-dark">
              Bình luận 555
            </div>
            <div class="text-start mt-2 mb-1">
              <img src="https://yt3.ggpht.com/a/default-user=s48-c-k-c0x00ffffff-no-rj" width="30" alt="">
              <span class="ms-2 text-dark">Xin chào</span>
            </div>
          </a>
          <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="modal-title text-dark" style="font-weight: bold;" id="exampleModalToggleLabel">Bình luận</p>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                      <div class="card-body p-4">
                        <div class="row">
                          <div class="col">
                            <div class="d-flex flex-start">
                              <img style="margin-top: 6px;" src="https://yt3.ggpht.com/a/default-user=s48-c-k-c0x00ffffff-no-rj" width="35" height="35" alt="">
                              <div class="flex-grow-1 flex-shrink-1">
                                <div class="ms-2">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-1 text-dark">
                                      Thảo
                                    </p>
                                  </div>
                                  <p class="small mb-0 text-dark">
                                    Hi
                                  </p>
                                </div>
                                <div class="d-flex flex-start mt-3">
                                  <img style="margin-top: 6px;" class="me-2" src="https://yt3.ggpht.com/a/default-user=s48-c-k-c0x00ffffff-no-rj" width="35" height="35" alt="">
                                  <div class="flex-grow-1 flex-shrink-1">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <p class="mb-1 text-dark">
                                        Huy
                                      </p>
                                    </div>
                                    <p class="small mb-0 text-dark">
                                      Hi
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 p-0">
        <div class="col-12 mt-2 mb-1">
          <?php foreach ($getAllVideo as $key => $data) { ?>
            <div class="video-con <?= $data['video_id'] == $_GET['vdId'] ? 'active-con' : '' ?> d-flex align-items-center mt-2 ms-1 me-1">
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
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
<?php }
ob_end_flush();
?>