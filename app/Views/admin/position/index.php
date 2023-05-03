<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Positions
<?= $this->endSection() ?>
<?= $this->section("content") ?>

<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Positions</h4>
            <div class="nk-block-des text-soft">
                <p>You have total <?= count($positions) ?> positions.</p>
            </div>
        </div>
        <div class="nk-block-head-content mt-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPosition">Add Position</button>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th width="100%">Name</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($positions as $position) : ?>
                        <tr>
                            <td><?= esc($position->name) ?></td>
                            <td>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="javascript:void(0)" onclick="onclickEdit(<?= $position->id ?>, <?= "'" . $position->name . "'" ?>)"><em class="icon ni ni-pen"></em>Edit<span></span></a></li>
                                            <li><a href="javascript:void(0)" onclick="onclickDelete(<?= $position->id ?>)"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
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
<!-- ADD POSITION MODAL -->
<div class="modal fade" tabindex="-1" id="addPosition">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Position</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="/position/store" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" required />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- EDIT POSITION MODAL -->
<div class="modal fade" tabindex="-1" id="editPosition">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Position</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="/position/update" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="hidden" name="id" id="updateId" />
                        <input type="text" name="name" class="form-control" id="editName" placeholder="Name" required />
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
<form action="/position/delete" method="POST" id="deleteForm">
    <input type="hidden" name="id" id="deleteId" />
</form>
<script>
    function onclickEdit(id, name) {
        console.log(name);
        document.getElementById("updateId").value = id;
        document.getElementById("editName").value = name;
        $("#editPosition").modal("show");
    }

    function onclickDelete(id) {
        document.getElementById("deleteId").value = id;
        $("#deleteForm").submit();
    }
</script>
<?= $this->endSection() ?>