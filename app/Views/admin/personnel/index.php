<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Personnels
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Personnels</h4>
            <div class="nk-block-des text-soft">
                <p>You have total <?= count($personnels) ?> personnels.</p>
            </div>
        </div>
        <div class="nk-block-head-content mt-2">
            <a href="/personnel/create" class="btn btn-primary">Add Personnel</a>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th width="40%">Username</th>
                        <th width="30%">Name</th>
                        <th width="30%">Position</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($personnels as $personnel) : ?>
                        <tr>
                            <td><?= ucfirst(esc($personnel->user->username)) ?></td>
                            <td><?= esc($personnel->full_name) ?></td>
                            <td><?= esc($personnel->position->name) ?></td>
                            <td>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="/personnel/show/<?= $personnel->id ?>"><em class="icon ni ni-eye"></em>Show<span></span></a></li>
                                            <li><a href="/personnel/edit/<?= $personnel->id ?>"><em class="icon ni ni-pen"></em>Edit<span></span></a></li>
                                            <li><a href="javascript:void(0)" onclick="onclickDelete(<?= $personnel->user->id ?>)"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
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
<form action="/personnel/delete" method="POST" id="deleteForm">
    <input type="hidden" name="id" id="deleteId" />
</form>
<script>
    function onclickDelete(id) {
        document.getElementById("deleteId").value = id;
        $("#deleteForm").submit();
    }
</script>
<?= $this->endSection() ?>