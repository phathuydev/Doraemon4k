<div class="row m-0 mt-4 p-1 rounded-2">
  <div class="col-md-12 col-lg-10 col-xl-8">
    <div class="card-body">
      <div class="row">
        <div class="col-12 p-0">
          <?php foreach ($getAllComment as $item) { ?>
            <div class="d-flex flex-start mb-3">
              <img class="rounded-2" src="https://vapa.vn/wp-content/uploads/2022/12/avatar-doremon-cute-001.jpg" width="45" height="45" alt="">
              <div class="flex-grow-1 flex-shrink-1">
                <div class="ms-2 bg-primary bg-opacity-25 rounded-2 p-2">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="m-0 __divColorComment">
                      <p><?= $item['user_name'] ?></p>
                    </div>
                  </div>
                  <div class="m-0 __divColorComment">
                    <p><?= $item['content'] ?></p>
                  </div>
                  <?php if (!empty($_SESSION['user_id_client'])) : ?>
                    <?= (!empty($item['user_id'] == $_SESSION['user_id_client'])) ?
                      '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#delete4_' . $item['comment_id'] . '"><i class="fa fa-trash"></i></button>
                        <button class="bg-transparent border-0 p-0 ms-1 me-1" data-bs-toggle="modal" href="#edit4_' . $item['comment_id'] . '"><i class="fa fa-pencil"></i></button>
                        <button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply7_' . $item['comment_id'] . '"><i class="fa fa-reply-all"></i></button>'
                      : '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply8_' . $item['comment_id'] . '"><i class="fa fa-reply-all"></i></button>';
                    ?>
                  <?php endif ?>
                </div>
                <!-- $item -->
                <div class="modal fade" id="reply7_<?= $item['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-end">
                          <form onsubmit="return validateForm14()" action="<?= $current_url ?>" method="post">
                            <textarea name="content_reply" class="w-100 rounded-2 p-2" id="__contentComment14" maxlength="30" placeholder="Thể hiện ý kiến của bạn, tối đa 30 ký tự"></textarea>
                            <div class="text-start">
                              <span id="commentError14" class="text-danger"></span>
                            </div>
                            <input type="hidden" name="parent_id" value="<?= $item['comment_id'] ?>">
                            <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Phản hồi</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="reply8_<?= $item['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-end">
                          <form onsubmit="return validateForm15()" action="<?= $current_url ?>" method="post">
                            <textarea name="content_reply" class="w-100 rounded-2 p-2" id="__contentComment15" maxlength="30" placeholder="Thể hiện ý kiến của bạn, tối đa 30 ký tự"></textarea>
                            <div class="text-start">
                              <span id="commentError15" class="text-danger"></span>
                            </div>
                            <input type="hidden" name="parent_id" value="<?= $item['comment_id'] ?>">
                            <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Phản hồi</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="edit4_<?= $item['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Chỉnh sửa</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-end">
                          <form onsubmit="return validateForm16()" action="<?= $current_url ?>" method="post">
                            <textarea name="content" class="w-100 rounded-2 p-2" id="__contentComment16" maxlength="30" required><?= $item['content'] ?></textarea>
                            <input type="hidden" name="comment_id" value="<?= $item['comment_id'] ?>">
                            <button type="submit" name="edit" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Chỉnh sửa</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="delete4_<?= $item['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Xóa bình luận</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-end">
                          <form action="<?= $current_url ?>" method="post">
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
                    <img class="me-2 rounded-2" src="https://vapa.vn/wp-content/uploads/2022/12/avatar-doremon-cute-001.jpg" width="45" height="45" alt="">
                    <div class="flex-grow-1 flex-shrink-1">
                      <div class="bg-primary bg-opacity-25 rounded-2 p-2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="m-0 __divColorComment">
                            <p><?= $data['user_name'] ?></p>
                          </div>
                        </div>
                        <div class="m-0 __divColorComment">
                          <p><?= $data['content'] ?></p>
                        </div>
                        <?php if (!empty($_SESSION['user_id_client'])) : ?>
                          <?= (!empty($data['user_id'] == $_SESSION['user_id_client'])) ?
                            '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#delete5_' . $data['comment_id'] . '"><i class="fa fa-trash"></i></button>
                          <button class="bg-transparent border-0 p-0 ms-1 me-1" data-bs-toggle="modal" href="#edit5_' . $data['comment_id'] . '"><i class="fa fa-pencil"></i></button>
                          <button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply9_' . $data['comment_id'] . '"><i class="fa fa-reply-all"></i></button>'
                            : '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply10_' . $data['comment_id'] . '"><i class="fa fa-reply-all"></i></button>';
                          ?>
                      </div>
                      <!-- $data -->
                      <div class="modal fade" id="reply9_<?= $data['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="text-end">
                                <form onsubmit="return validateForm17()" action="<?= $current_url ?>" method="post">
                                  <textarea name="content_reply" class="w-100 rounded-2 p-2" id="__contentComment17" maxlength="30" placeholder="Thể hiện ý kiến của bạn, tối đa 30 ký tự"></textarea>
                                  <div class="text-start">
                                    <span id="commentError17" class="text-danger"></span>
                                  </div>
                                  <input type="hidden" name="parent_id" value="<?= $data['parent_id'] ?>">
                                  <input type="hidden" name="grandparent_id" value="<?= $data['comment_id'] ?>">
                                  <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Phản hồi</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="reply10_<?= $data['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="text-end">
                                <form onsubmit="return validateForm18()" action="<?= $current_url ?>" method="post">
                                  <textarea name="content_reply" class="w-100 rounded-2 p-2" id="__contentComment18" maxlength="30" placeholder="Thể hiện ý kiến của bạn, tối đa 30 ký tự"></textarea>
                                  <div class="text-start">
                                    <span id="commentError18" class="text-danger"></span>
                                  </div>
                                  <input type="hidden" name="parent_id" value="<?= $data['parent_id'] ?>">
                                  <input type="hidden" name="grandparent_id" value="<?= $data['comment_id'] ?>">
                                  <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Phản hồi</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="edit5_<?= $data['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Chỉnh sửa</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="text-end">
                                <form onsubmit="return validateForm19()" action="<?= $current_url ?>" method="post">
                                  <textarea name="content" class="w-100 rounded-2 p-2" id="__contentComment19" maxlength="30" required><?= $data['content'] ?></textarea>
                                  <input type="hidden" name="comment_id" value="<?= $data['comment_id'] ?>">
                                  <button type="submit" name="edit" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Chỉnh sửa</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="delete5_<?= $data['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Xóa bình luận</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="text-end">
                                <form action="<?= $current_url ?>" method="post">
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
                        <img class="me-2 rounded-2" src="https://vapa.vn/wp-content/uploads/2022/12/avatar-doremon-cute-001.jpg" width="45" height="45" alt="">
                        <div class="flex-grow-1 flex-shrink-1">
                          <div class="bg-primary bg-opacity-25 rounded-2 p-2">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="m-0 __divColorComment">
                                <p><?= $value['user_name'] ?></p>
                              </div>
                            </div>
                            <div class="m-0 __divColorComment d-flex align-items-center">
                              <?php $getNameReply = $this->province->getNameReply($value['user_id_reply']);
                              foreach ($getNameReply as $name) { ?>
                                <a style="font-size: 14px; font-weight: 500; color: brown; margin-right: 5px;"><?= isset($name['user_name']) ? $name['user_name'] : '' ?></a>
                              <?php } ?>
                              <p><?= $value['content'] ?></p>
                            </div>
                            <?php if (!empty($_SESSION['user_id_client'])) : ?>
                              <?= (!empty($value['user_id'] == $_SESSION['user_id_client'])) ?
                                '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#delete6_' . $value['comment_id'] . '"><i class="fa fa-trash"></i></button>
                          <button class="bg-transparent border-0 p-0 ms-1 me-1" data-bs-toggle="modal" href="#edit6_' . $value['comment_id'] . '"><i class="fa fa-pencil"></i></button>
                          <button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply11_' . $value['comment_id'] . '"><i class="fa fa-reply-all"></i></button>'
                                : '<button class="bg-transparent border-0 p-0" data-bs-toggle="modal" href="#reply12_' . $value['comment_id'] . '"><i class="fa fa-reply-all"></i></button>';
                              ?>
                            <?php endif ?>
                          </div>
                        </div>
                      </div>
                      <!-- $value -->
                      <div class="modal fade" id="reply11_<?= $value['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="text-end">
                                <form onsubmit="return validateForm20()" action="<?= $current_url ?>" method="post">
                                  <textarea name="content_reply" class="w-100 rounded-2 p-2" id="__contentComment20" maxlength="30" placeholder="Thể hiện ý kiến của bạn, tối đa 30 ký tự"></textarea>
                                  <div class="text-start">
                                    <span id="commentError20" class="text-danger"></span>
                                  </div>
                                  <input type="hidden" name="parent_id" value="<?= $value['parent_id'] ?>">
                                  <input type="hidden" name="grandparent_id" value="<?= $value['grandParent_id'] ?>">
                                  <input type="hidden" name="user_id_reply" value="<?= $value['user_id'] ?>">
                                  <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Phản hồi</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="reply12_<?= $value['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Phản hồi</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="text-end">
                                <form onsubmit="return validateForm21()" action="<?= $current_url ?>" method="post">
                                  <textarea name="content_reply" class="w-100 rounded-2 p-2" id="__contentComment21" maxlength="30" placeholder="Thể hiện ý kiến của bạn, tối đa 30 ký tự"></textarea>
                                  <div class="text-start">
                                    <span id="commentError21" class="text-danger"></span>
                                  </div>
                                  <input type="hidden" name="parent_id" value="<?= $value['parent_id'] ?>">
                                  <input type="hidden" name="grandparent_id" value="<?= $value['grandParent_id'] ?>">
                                  <input type="hidden" name="user_id_reply" value="<?= $value['user_id'] ?>">
                                  <button type="submit" name="reply" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Phản hồi</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="edit6_<?= $value['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Chỉnh sửa</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="text-end">
                                <form onsubmit="return validateForm22()" action="<?= $current_url ?>" method="post">
                                  <textarea name="content" class="w-100 rounded-2 p-2" id="__contentComment22" maxlength="30" required><?= $value['content'] ?></textarea>
                                  <input type="hidden" name="comment_id" value="<?= $value['comment_id'] ?>">
                                  <button type="submit" name="edit" class="btn btn-dark text-white p-1 border-0 mt-2 rounded-1">Chỉnh sửa</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="delete6_<?= $value['comment_id'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <p class="modal-title" id="exampleModalToggleLabel" style="color: black;">Xóa bình luận</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="text-end">
                                <form action="<?= $current_url ?>" method="post">
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