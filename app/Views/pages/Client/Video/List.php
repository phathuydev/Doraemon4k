<?php
ob_start();
?>
<section class="trending-podcast-section mb-5" style="margin-bottom: 180px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="section-title-wrap mb-5 text-center mt-5">
          <h4 class="section-title">Phim Doraemon</h4>
        </div>
      </div>
      <div class="text-end">
        <div class="filter__sort mb-5">
          <select onchange="loadPage(this.value)">
            <option value="<?= _WEB_ROOT ?>/video?pages=1&sort=desc" <?= !empty($_GET['sort'] == 'desc') ? 'selected' : '' ?>>Mới Nhất</option>
            <option value="<?= _WEB_ROOT ?>/video?pages=1&sort=asc" <?= !empty($_GET['sort'] == 'asc') ? 'selected' : '' ?>>Cũ Nhất</option>
          </select>
        </div>
      </div>
      <?php foreach ($getAllVideo as $item) {
        extract($item); ?>
        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
          <div class="custom-block custom-block-full mb-4">
            <div class="custom-block-image-wrap">
              <a href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $video_id ?>&cate=<?= $category_id ?>">
                <img src="<?= $video_image ?>" class="custom-block-image img-fluid" alt="">
              </a>
            </div>
            <div class="custom-block-info text-center">
              <p class="mb-2" style="font-weight: bold;">
                <a href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $video_id ?>&cate=<?= $category_id ?>" class="truncate-text-1">
                  <?= $video_title ?>
                </a>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="d-flex justify-content-center align-items-center mt-5">
      <nav aria-label="Page navigation example">
        <div class="d-flex justify-content-between align-items-center">
          <ul class="product__pagination pagination pagination-sm">
            <li class="page-perpage <?= $page < 3 ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/video?pages=<?= 1; ?>&sort=<?= $_GET['sort']; ?>')" tabindex="-1"><i class="fa fa-arrow-left"></i></a></li>
            <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
              <li class="page-perpage <?= $num == $page ? 'bg-danger' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/video?pages=<?= $num; ?>&sort=<?= $_GET['sort']; ?>')"><?= $num; ?></a>
              </li>
            <?php } ?>
            <li class="page-perpage <?= $page > ($totalPage - 1) ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/video?pages=<?= $page + 1; ?>&sort=<?= $_GET['sort']; ?>')"><i class="fa fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</section>
<?php
ob_end_flush();
?>