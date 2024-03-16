<section class="latest-podcast-section section-padding" style="margin-bottom: 100px;" id="section_2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="section-title-wrap mb-5 text-center">
          <h4 class="section-title">Phim Nổi Bật</h4>
        </div>
      </div>
      <?php foreach ($getAllVideoNewLitmit40 as $item) {
        extract($item); ?>
        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
          <div class="custom-block custom-block-full rounded-0 mb-4">
            <div class="custom-block-image-wrap">
              <a href="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $video_id ?>&slug=<?= $video_slug ?>&epi=1">
                <img src="<?= $video_image ?>" class="custom-block-image img-fluid" alt="">
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
      <?php } ?>
    </div>
  </div>
</section>