<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Personnels
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title"><?= "Viewing " . ucfirst($personnel->user->username)   ?></h4>
        </div>
        <?php if (isset($success)) : ?>
            <div class="alert alert-fill alert-success alert-icon mt-2">
                <em class="icon ni ni-check-circle"></em> <strong>Success!</strong>. Your changes has been updated accordingly.
            </div>
        <?php endif; ?>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Personnel Form</span>
                <div>
                    <form class="row gy-4" action="/personnel/update" method="POST">
                        <input type="hidden" name="id" id="updateId" value="<?= $personnel->id ?>" />
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="first_name">First Name</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?= $personnel->first_name ?>" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="last_name">Last Name</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?= $personnel->last_name ?>" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="middle_name">Middle Name</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?= $personnel->middle_name ?>" placeholder="Middle Name" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="username">Username</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $personnel->user->username ?>" placeholder="Middle Name" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="position_id">Position</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="position_id" name="position_id" disabled>
                                            <option><?= $personnel->position->name ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>