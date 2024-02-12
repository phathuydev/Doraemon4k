<div class="row m-0 mt-md-3 bg-light p-3 rounded-2">
  <div class="col-md-12 col-lg-10 col-xl-8">
    <div class="card-body">
      <div class="row">
        <div class="col-12 p-0">
          <?php foreach ($getAllComment as $item) { ?>
            <div class="d-flex flex-start mb-3">
              <img style="margin-top: 5px;" src="https://yt3.ggpht.com/a/default-user=s48-c-k-c0x00ffffff-no-rj" width="35" height="35" alt="">
              <div class="flex-grow-1 flex-shrink-1">
                <div class="ms-2">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="m-0 __divColorComment">
                      <p><?= $item['user_name'] ?></p>
                    </div>
                  </div>
                  <div class="m-0 __divColorComment">
                    <?= $item['content'] ?>
                  </div>
                  <?php if (!empty($_SESSION['user_id_client'])) : ?>
                    <?= (!empty($item['user_id'] == $_SESSION['user_id_client'])) ?
                      '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#deleteP_' . $item['comment_id'] . '"><i class="fa fa-trash"></i></button>
                        <button class="bg-transparent border-0 p-0 ms-1 me-1" data-bs-toggle="modal" href="#editP_' . $item['comment_id'] . '"><i class="fa fa-pencil"></i></button>
                        <button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#replyP_' . $item['comment_id'] . '"><i class="fa fa-reply-all"></i></button>'
                      : '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply2P_' . $item['comment_id'] . '"><i class="fa fa-reply-all"></i></button>';
                    ?>
                  <?php endif ?>
                </div>
                <!-- $item -->
                <div class="modal fade" id="replyP_<?= $item['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-end">
                          <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                            <textarea id="replyP__<?= $item['comment_id'] ?>" name="content_reply"></textarea>
                            <input type="hidden" name="parent_id" value="<?= $item['comment_id'] ?>">
                            <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-3 rounded-1">Phản hồi</button>
                          </form>
                        </div>
                        <script>
                          ClassicEditor
                            .create(document.querySelector("#replyP__<?= $item['comment_id'] ?>"))
                            .catch(error => {
                              console.error(error);
                            });
                        </script>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="reply2P_<?= $item['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-end">
                          <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                            <textarea id="reply2P__<?= $item['comment_id'] ?>" name="content_reply"></textarea>
                            <input type="hidden" name="parent_id" value="<?= $item['comment_id'] ?>">
                            <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-3 rounded-1">Phản hồi</button>
                          </form>
                        </div>
                        <script>
                          ClassicEditor
                            .create(document.querySelector("#reply2P__<?= $item['comment_id'] ?>"))
                            .catch(error => {
                              console.error(error);
                            });
                        </script>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="editP_<?= $item['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Chỉnh sửa</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-end">
                          <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                            <textarea id="editP__<?= $item['comment_id'] ?>" name="content"><?= $item['content'] ?></textarea>
                            <input type="hidden" name="comment_id" value="<?= $item['comment_id'] ?>">
                            <button type="submit" name="edit" class="btn btn-dark text-white p-1 border-0 mt-3 rounded-1">Chỉnh sửa</button>
                          </form>
                        </div>
                        <script>
                          ClassicEditor
                            .create(document.querySelector("#editP__<?= $item['comment_id'] ?>"))
                            .catch(error => {
                              console.error(error);
                            });
                        </script>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="deleteP_<?= $item['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Xóa bình luận</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-end">
                          <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                            <input type="hidden" name="comment_id" value="<?= $item['comment_id'] ?>">
                            <button type="button" class="btn btn-danger text-white p-1 border-0 rounded-1" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                            <button type="submit" name="delete" class="btn btn-dark text-white p-1 border-0 rounded-1">Xóa</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $getCommentReply = $this->province->getCommentReply($_GET['vdId'], $item['comment_id']);
                foreach ($getCommentReply as $data) {
                ?>
                  <div class="d-flex flex-start mt-2">
                    <img style="margin-top: 5px;" class="me-2" src="https://yt3.ggpht.com/a/default-user=s48-c-k-c0x00ffffff-no-rj" width="35" height="35" alt="">
                    <div class="flex-grow-1 flex-shrink-1">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="m-0 __divColorComment">
                          <?= $data['user_name'] ?>
                        </div>
                      </div>
                      <div class="m-0 __divColorComment">
                        <?= $data['content'] ?>
                      </div>
                      <?php if (!empty($_SESSION['user_id_client'])) : ?>
                        <?= (!empty($data['user_id'] == $_SESSION['user_id_client'])) ?
                          '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#delete2P_' . $data['comment_id'] . '"><i class="fa fa-trash"></i></button>
                          <button class="bg-transparent border-0 p-0 ms-1 me-1" data-bs-toggle="modal" href="#edit2P_' . $data['comment_id'] . '"><i class="fa fa-pencil"></i></button>
                          <button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply3P_' . $data['comment_id'] . '"><i class="fa fa-reply-all"></i></button>'
                          : '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply4P_' . $data['comment_id'] . '"><i class="fa fa-reply-all"></i></button>';
                        ?>
                        <!-- $data -->
                        <div class="modal fade" id="reply3P_<?= $data['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="text-end">
                                  <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                                    <textarea id="reply3P__<?= $data['comment_id'] ?>" name="content_reply"></textarea>
                                    <input type="hidden" name="parent_id" value="<?= $data['parent_id'] ?>">
                                    <input type="hidden" name="grandparent_id" value="<?= $data['comment_id'] ?>">
                                    <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-3 rounded-1">Phản hồi</button>
                                  </form>
                                </div>
                                <script>
                                  ClassicEditor
                                    .create(document.querySelector("#reply3P__<?= $data['comment_id'] ?>"))
                                    .catch(error => {
                                      console.error(error);
                                    });
                                </script>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="reply4P_<?= $data['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="text-end">
                                  <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                                    <textarea id="reply4P__<?= $data['comment_id'] ?>" name="content_reply"></textarea>
                                    <input type="hidden" name="parent_id" value="<?= $data['parent_id'] ?>">
                                    <input type="hidden" name="grandparent_id" value="<?= $data['comment_id'] ?>">
                                    <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-3 rounded-1">Phản hồi</button>
                                  </form>
                                </div>
                                <script>
                                  ClassicEditor
                                    .create(document.querySelector("#reply4P__<?= $data['comment_id'] ?>"))
                                    .catch(error => {
                                      console.error(error);
                                    });
                                </script>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="edit2P_<?= $data['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Chỉnh sửa</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="text-end">
                                  <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                                    <textarea id="edit2P__<?= $data['comment_id'] ?>" name="content"><?= $data['content'] ?></textarea>
                                    <input type="hidden" name="comment_id" value="<?= $data['comment_id'] ?>">
                                    <button type="submit" name="edit" class="btn btn-dark text-white p-1 border-0 mt-3 rounded-1">Chỉnh sửa</button>
                                  </form>
                                </div>
                                <script>
                                  ClassicEditor
                                    .create(document.querySelector("#edit2P__<?= $data['comment_id'] ?>"))
                                    .catch(error => {
                                      console.error(error);
                                    });
                                </script>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="delete2P_<?= $data['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Xóa bình luận</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="text-end">
                                  <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                                    <input type="hidden" name="comment_id" value="<?= $data['comment_id'] ?>">
                                    <button type="button" class="btn btn-danger text-white p-1 border-0 rounded-1" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                                    <button type="submit" name="delete" class="btn btn-dark text-white p-1 border-0 rounded-1">Xóa</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endif ?>
                      <?php $getGrandParentComment = $this->province->getGrandParentComment($_GET['vdId'], $data['comment_id']);
                      foreach ($getGrandParentComment as $value) {
                      ?>
                        <div class="d-flex flex-start mt-2">
                          <img style="margin-top: 5px;" class="me-2" src="https://yt3.ggpht.com/a/default-user=s48-c-k-c0x00ffffff-no-rj" width="35" height="35" alt="">
                          <div class="flex-grow-1 flex-shrink-1">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="m-0 __divColorComment">
                                <?= $value['user_name'] ?>
                              </div>
                            </div>
                            <div class="m-0 __divColorComment d-flex align-items-center">
                              <?php $getNameReply = $this->province->getNameReply($value['user_id_reply']);
                              foreach ($getNameReply as $name) { ?>
                                <a style="font-size: 14px; font-weight: 500; color: brown; margin-right: 5px;"><?= isset($name['user_name']) ? $name['user_name'] : '' ?></a>
                              <?php } ?>
                              <?= $value['content'] ?>
                            </div>
                            <?php if (!empty($_SESSION['user_id_client'])) : ?>
                              <?= (!empty($value['user_id'] == $_SESSION['user_id_client'])) ?
                                '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#delete3P_' . $value['comment_id'] . '"><i class="fa fa-trash"></i></button>
                          <button class="bg-transparent border-0 p-0 ms-1 me-1" data-bs-toggle="modal" href="#edit3P_' . $value['comment_id'] . '"><i class="fa fa-pencil"></i></button>
                          <button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply5P_' . $value['comment_id'] . '"><i class="fa fa-reply-all"></i></button>'
                                : '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply6P_' . $value['comment_id'] . '"><i class="fa fa-reply-all"></i></button>';
                              ?>
                            <?php endif ?>
                          </div>
                        </div>
                        <!-- $value -->
                        <div class="modal fade" id="reply5P_<?= $value['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="text-end">
                                  <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                                    <textarea id="reply5P__<?= $value['comment_id'] ?>" name="content_reply"></textarea>
                                    <input type="hidden" name="parent_id" value="<?= $value['parent_id'] ?>">
                                    <input type="hidden" name="grandparent_id" value="<?= $value['grandParent_id'] ?>">
                                    <input type="hidden" name="user_id_reply" value="<?= $value['user_id'] ?>">
                                    <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-3 rounded-1">Phản hồi</button>
                                  </form>
                                </div>
                                <script>
                                  ClassicEditor
                                    .create(document.querySelector("#reply5P__<?= $value['comment_id'] ?>"))
                                    .catch(error => {
                                      console.error(error);
                                    });
                                </script>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="reply6P_<?= $value['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="text-end">
                                  <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                                    <textarea id="reply6P__<?= $value['comment_id'] ?>" name="content_reply"></textarea>
                                    <input type="hidden" name="parent_id" value="<?= $value['parent_id'] ?>">
                                    <input type="hidden" name="grandparent_id" value="<?= $value['grandParent_id'] ?>">
                                    <input type="hidden" name="user_id_reply" value="<?= $value['user_id'] ?>">
                                    <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-3 rounded-1">Phản hồi</button>
                                  </form>
                                </div>
                                <script>
                                  ClassicEditor
                                    .create(document.querySelector("#reply6__<?= $value['comment_id'] ?>"))
                                    .catch(error => {
                                      console.error(error);
                                    });
                                </script>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="edit3P_<?= $value['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Chỉnh sửa</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="text-end">
                                  <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                                    <textarea id="edit3P__<?= $value['comment_id'] ?>" name="content"><?= $value['content'] ?></textarea>
                                    <input type="hidden" name="comment_id" value="<?= $value['comment_id'] ?>">
                                    <button type="submit" name="edit" class="btn btn-dark text-white p-1 border-0 mt-3 rounded-1">Chỉnh sửa</button>
                                  </form>
                                </div>
                                <script>
                                  ClassicEditor
                                    .create(document.querySelector("#edit3P__<?= $value['comment_id'] ?>"))
                                    .catch(error => {
                                      console.error(error);
                                    });
                                </script>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="delete3P_<?= $value['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Xóa bình luận</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="text-end">
                                  <form action="/videoApiDetail?vdId=<?= $_GET['vdId'] ?>&slug=<?= $_GET['slug'] ?>&epi=<?= $_GET['epi'] ?>" method="post">
                                    <input type="hidden" name="comment_id" value="<?= $value['comment_id'] ?>">
                                    <button type="button" class="btn btn-danger text-white p-1 border-0 rounded-1" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                                    <button type="submit" name="delete" class="btn btn-dark text-white p-1 border-0 rounded-1">Xóa</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>