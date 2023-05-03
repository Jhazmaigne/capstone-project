<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Trainings
<?= $this->endSection() ?>
<?= $this->section("content") ?>

<?php
$session = session();
$is_admin = $session->get("isAdmin");
?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Viewing <?= ucfirst($training->topic) ?></h4>
        </div>
    </div>
    <?php if ($is_admin) : ?>
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Code <span class="text-danger"><?= ucfirst($training->code) ?></span></h4>
            </div>
        </div>
        <div class="nk-block-head-content mt-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDefault">Add Topic</button>
        </div>
        <div class="modal fade" tabindex="-1" id="modalDefault">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Topic Form</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form class="row gy-4" action="/training/insert" method="POST">
                            <input type="hidden" name="training_id" value="<?= $training->id ?>" />
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="topic">Topic</label>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-file-code"></em>
                                        </div>
                                        <input type="text" class="form-control" id="topic" name="topic" placeholder="Topic" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="datetime">Date & Time</label>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-calendar"></em>
                                        </div>
                                        <input type="datetime-local" class="form-control" id="datetime" name="datetime" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="speaker_id">Speaker</label>
                                    <div class="form-control-wrap ">
                                        <div class="form-control-select">
                                            <select class="form-control" id="speaker_id" name="speaker_id">
                                                <?php foreach ($personnels as $personnel) : ?>
                                                    <option value="<?= $personnel->id ?>"><?= $personnel->full_name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <!-- <span class="sub-text">Modal Footer Text</span> -->
                        <input class="btn btn-primary" type="submit" value="Save" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="card card-bordered card-preview mt-3">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Training Form</span>
                <div>
                    <form class="row gy-4" action="/training/update" method="POST">
                        <input type="hidden" name="id" value="<?= $training->id ?>" />
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="topic">Topic</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-file-code"></em>
                                    </div>
                                    <input type="text" class="form-control" id="topic" name="topic" placeholder="Topic" value="<?= $training->topic ?>" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="form-label" for="venue">Venue</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-building"></em>
                                    </div>
                                    <input type="text" class="form-control" id="venue" name="venue" value="<?= $training->venue ?>" placeholder="Venue" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="datetime">Date & Time</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-calendar"></em>
                                    </div>
                                    <input type="datetime-local" class="form-control" id="datetime" name="datetime" value="<?= $training->datetime ?>" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="form-label" for="place">Place</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-home"></em>
                                    </div>
                                    <input type="text" class="form-control" id="place" name="place" placeholder="Place" value="<?= $training->place ?>" disabled />
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="speaker_id">Speaker</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="speaker_id" name="speaker_id" disabled>
                                            <?php foreach ($personnels as $personnel) : ?>
                                                <option value="<?= $personnel->id ?>" <?= $personnel->id == $training->speaker_id ? "selected" : "" ?>><?= $personnel->full_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="speaker_id">Speaker</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="speaker_id" name="speaker_id" disabled>
                                            <?php foreach ($personnels as $personnel) : ?>
                                                <option value="<?= $personnel->id ?>" <?= $personnel->id == $training->facilitator_id ? "selected" : "" ?>><?= $personnel->full_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="status">Status</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="status" name="status" disabled>
                                            <option value="draft" <?= $training->status == "draft" ? "selected" : "" ?>>Draft</option>
                                            <option value="ongoing" <?= $training->status == "ongoing" ? "selected" : "" ?>>Ongoing</option>
                                            <option value="done" <?= $training->status == "done" ? "selected" : "" ?>>Done</option>
                                            <option value="cancel" <?= $training->status == "cancel" ? "selected" : "" ?>>Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="form-label">Participants</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" name="participants[]" multiple="multiple" data-placeholder="Select Participants" disabled>
                                        <?php foreach ($personnels as $personnel) : ?>
                                            <option value="<?= $personnel->id ?>" <?= in_array($personnel->id, $training->participants_ids) ? "selected" : "" ?>><?= $personnel->full_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
                        <th width="15%">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($training->topics as $topic) : ?>
                        <tr>
                            <td><?= esc($topic->title) ?></td>
                            <td><?= esc($topic->speaker->full_name) ?></td>
                            <td><?= date_format(date_create($topic->datetime),  "F d, Y h:i A") ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>