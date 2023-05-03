<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Evaluations
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Evaluations</h4>
        </div>
        <div class="nk-block-des text-soft">
            <p>You have total <?= count($evaluations) ?> evaluations.</p>
        </div>
        <?php if ($is_admin) : ?>
            <div class="nk-block-head-content mt-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEvaluation">Add Evaluation</button>
            </div>
        <?php endif ?>

    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th width="50%">Title</th>
                        <th width="50%">Training</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($evaluations as $evaluation) : ?>
                        <tr>
                            <td><?= esc($evaluation->title) ?></td>
                            <td><?= esc($evaluation->training->topic) ?></td>
                            <td>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="/evaluation/show/<?= $evaluation->id ?>"><em class="icon ni ni-eye"></em>Show<span></span></a></li>
                                            <!-- <li><a href="/evaluation/edit/<?= $evaluation->id ?>"><em class="icon ni ni-pen"></em>Edit<span></span></a></li> -->
                                            <?php if ($is_admin) : ?>
                                                <li><a href="javascript:void(0)" onclick="onclickDelete(<?= $evaluation->id ?>)"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ADD EVALUATION MODAL -->
<div class="modal fade" tabindex="-1" id="addEvaluation">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Evaluation</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="/evaluation/store" method="POST">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title" required />
                    </div>
                    <div class="form-group">
                        <label for="training">Training</label>
                        <select name="training_id" class="form-control" id="training" required>
                            <?php foreach ($trainings as $training) : ?>
                                <?php if (!$training->has_evaluation) : ?>
                                    <option value="<?= $training->id ?>"><?= esc($training->topic) ?></option>
                                <?php endif; ?>
                            <?php endforeach ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- DELETE FORM -->
<form action="/evaluation/delete" method="POST" id="deleteForm">
    <input type="hidden" name="id" id="deleteId" />
</form>
<script>
    function onclickDelete(id) {
        document.getElementById("deleteId").value = id;
        $("#deleteForm").submit();
    }
</script>
<?= $this->endSection() ?>