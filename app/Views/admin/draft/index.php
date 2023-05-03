<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Trainings
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Trainings</h4>
            <div class="nk-block-des text-soft">
                <p>You have total <?= count($trainings) ?> draft training records.</p>
            </div>
        </div>
    </div>
    <div class="card card-bordered card-preview">
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
                                            <li><a href="/draft/show/<?= $training->id ?>"><em class="icon ni ni-eye"></em>Show<span></span></a></li>
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