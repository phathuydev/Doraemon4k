<?php
ob_start();
?>
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4"><?= isset($pages_title) ? $pages_title : 'Bảng chưa có tên' ?></h6>
        <?php $item = $data; {
          extract($item);
          $getVideoSlug = $this->province->getVideoSlug($slug);
        ?>
          <div class="mb-3">
            <p>
              <?php $value = $episodes; { ?>
                <iframe src="<?= $value[$_GET['epi'] - 1]['link_embed'] ?>" class="embed-responsive-item" frameborder="0" allowfullscreen></iframe>
              <?php } ?>
            </p>
            <p>Xem trước</p>
            <p>
              <?php foreach ($episodes as $items) {
                if (isset($items['slug']) && $items['slug'] !== 'full') : ?>
                  <a href="<?= _WEB_ROOT ?>/videoApiManageDetail?slug=<?= isset($_GET['slug']) ? $_GET['slug'] : '' ?>&pages=<?= $_GET['pages'] ?>&epi=<?= $items['name'] ?>" class="btn btn-dark text-white me-1 mb-2 <?= (isset($_GET['epi']) && $_GET['epi'] == $items['slug']) ? 'selected' : ''; ?>">Tập <?= $items['name'] ?></a>
              <?php endif;
              } ?>
            </p>
            <p>Cập Nhật: <?= date('H:i:s d-m-Y', strtotime($modified['time'])); ?></p>
            <p>Danh Mục: <?= $type ?></p>
            <p>Thời Lượng: <?= $time ?></p>
            <p>Tập Phim: <?= preg_replace('/Tập (\d+)/', '$1 Tập', $episode_current); ?></p>
            <p>Chất Lượng: <?= $quality ?></p>
            <p>Thuyết Minh: <?= ($lang == 'Vietsub') ? 'Có' : 'Không' ?></p>
            <p>Thể Loại Phim: <?= $category[0]['name'] ?></p>
            <p>Quốc Gia: <?= $country[0]['name'] ?></p>
          </div>
        <?php } ?>
        <div class="text-end">
          <a href="<?= _WEB_ROOT ?>/videoApiManage?pages=<?= $_GET['pages'] ?>" class="btn btn-outline-light text-white">Trở Lại</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
ob_end_flush();
?>