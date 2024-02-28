<section class="trending-podcast-section mb-5" style="margin-bottom: 180px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="section-title-wrap mb-5 text-center mt-5">
          <h4 class="section-title">Từ Khóa: <span class="text-info"><?= $_GET['kw'] ?></span></h4>
        </div>
      </div>
      <div class="text-end">
        <div class="filter__sort mb-5">
          <select onchange="loadPage(this.value)" class="form-control-sm bg-dark text-white small">
            <option value="<?= _WEB_ROOT ?>/videoSearch?pages=<?= $_GET['pages'] ?>&sort=desc&kw=<?= $_GET['kw'] ?>" <?= !empty($_GET['sort'] == 'desc') ? 'selected' : '' ?>>Mới Nhất</option>
            <option value="<?= _WEB_ROOT ?>/videoSearch?pages=<?= $_GET['pages'] ?>&sort=asc&kw=<?= $_GET['kw'] ?>" <?= !empty($_GET['sort'] == 'asc') ? 'selected' : '' ?>>Cũ Nhất</option>
          </select>
        </div>
      </div>
      <?php if ($countVideoWhereSearch > 0) : ?>
        <?php foreach ($getVideoSearch as $item) {
          extract($item); ?>
          <?php if (!empty($video_slug)) : ?>
            <div class="col-lg-3 col-12 mb-4 mb-lg-0">
              <div class="custom-block custom-block-full bn5 mb-4">
                <div class="custom-block-image-wrap">
                  <a href="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $video_id ?>&slug=<?= $video_slug ?>&epi=1">
                    <img src="<?= $video_image ?>" class="custom-block-image img-fluid rounded-4" alt="">
                  </a>
                </div>
                <div class="custom-block-info text-center">
                  <p class="mb-2" style="font-weight: bold;">
                    <a href="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $video_id ?>&slug=<?= $video_slug ?>&epi=1" class="truncate-text-1">
                      <?= $video_title ?>
                    </a>
                  </p>
                </div>
              </div>
            </div>
          <?php else : ?>
            <div class="col-lg-3 col-12 mb-4 mb-lg-0">
              <div class="custom-block custom-block-full mb-4">
                <div class="custom-block-image-wrap">
                  <a href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $video_id ?>&cate=<?= $category_id ?>">
                    <img src="<?= $video_image ?>" class="custom-block-image img-fluid" alt="">
                  </a>
                </div>
                <div class="custom-block-info text-center">
                  <p class="mb-2" style="font-weight: bold;">
                    <a href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $video_id ?>&cate=<?= $category_id ?>" class="truncate-text-2">
                      <?= $video_title ?>
                    </a>
                  </p>
                </div>
              </div>
            </div>
          <?php endif ?>
        <?php } ?>
      <?php else : ?>
        <div class="text-danger text-center">
          Không tìm thấy!
        </div>
      <?php endif ?>
    </div>
    <div class="d-flex justify-content-center align-items-center mt-5">
      <nav aria-label="Page navigation example">
        <div class="d-flex justify-content-between align-items-center">
          <ul class="product__pagination pagination pagination-sm">
            <li class="page-perpage <?= $page < 3 ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/videoSearch?pages=<?= 1 ?>&sort=<?= $_GET['sort'] ?>&kw=<?= $_GET['kw'] ?>')" tabindex="-1"><i class="fa fa-arrow-left"></i></a></li>
            <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
              <li class="page-perpage <?= $num == $page ? 'bg-danger' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/videoSearch?pages=<?= $num ?>&sort=<?= $_GET['sort'] ?>&kw=<?= $_GET['kw'] ?>')"><?= $num; ?></a>
              </li>
            <?php } ?>
            <li class="page-perpage <?= $page > ($totalPage - 1) ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/videoSearch?pages=<?= $page + 1 ?>&sort=<?= $_GET['sort'] ?>&kw=<?= $_GET['kw'] ?>')"><i class="fa fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</section>