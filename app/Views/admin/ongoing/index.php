<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Trainings
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<?php
$session = session();
$is_admin = $session->get("isAdmin");
$success = $session->getFlashdata("foo");
?>



<div class="nk-block nk-block-lg">

    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Trainings</h4>
            <div class="nk-block-des text-soft">
                <p>You have total <?= count($trainings) ?> ongoing training records.</p>
            </div>
        </div>
    </div>
    <?php if (!$is_admin) : ?>
        <?php if ($success == "failed") : ?>
            <h6 class="text-danger">Code does not belong to any training</h6>
        <?php endif; ?>
        <?php if ($success == "success") : ?>
            <h6 class="text-success">Successfuly enrolled!</h6>
        <?php endif; ?>
        <?php if ($success == "unable") : ?>
            <h6 class="text-warning">You are already enrolled in this training!</h6>
        <?php endif; ?>
        <div class="nk-block-head-content ">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDefault">Enroll</button>
        </div>
        <div class="modal fade" tabindex="-1" id="modalDefault">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Enroll</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form class="row gy-4" action="/training/enroll" method="POST">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="topic">Code</label>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-file-code"></em>
                                        </div>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Code" required />
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <!-- <span class="sub-text">Modal Footer Text</span> -->
                        <input class="btn btn-primary" type="submit" value="Enroll" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th width="35%">Topic</th>
                        <th width="15%">Speaker</th>
                        <th width="15%">Facilitator</th>
                        <th width="15%">Date & Time</th>
                        <th width="10%">Status</th>
                        <th width="10%">Participants</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trainings as $training) : ?>
                        <tr>
                            <td><?= esc($training->topic) ?></td>
                            <td><?= esc($training->speaker->full_name) ?></td>
                            <td><?= esc($training->facilitator->full_name) ?></td>
                            <td><?= date_format(date_create($training->datetime),  "F d, Y h:i A") ?></td>
                            <td>
                                <?php if ($training->status == "draft") : ?>
                                    <span class="badge bg-secondary">Draft</span>
                                <?php elseif ($training->status == "ongoing") : ?>
                                    <span class="badge bg-info">Ongoing</span>
                                <?php elseif ($training->status == "done") : ?>
                                    <span class="badge bg-success">Done</span>
                                <?php else : ?>
                                    <span class="badge bg-danger">Cancelled</span>
                                <?php endif; ?>
                            </td>
                            <td><?= count($training->participants) ?></td>
                            <td>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="/ongoing/show/<?= $training->id ?>"><em class="icon ni ni-eye"></em>Show<span></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- DELETE FORM -->
<form action="/training/delete" method="POST" id="deleteForm">
    <input type="hidden" name="id" id="deleteId" />
</form>
<script>
    function onclickDelete(id) {
        document.getElementById("deleteId").value = id;
        $("#deleteForm").submit();
    }
</script>
<?= $this->endSection() ?>