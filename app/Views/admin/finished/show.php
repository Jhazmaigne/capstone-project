<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Trainings
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Viewing <?= ucfirst($training->topic) ?></h4>
        </div>
        <?php if (session()->getFlashData("success")) : ?>
            <div class="alert alert-fill alert-success alert-icon mt-2">
                <em class="icon ni ni-check-circle"></em> <strong>Success!</strong>. Your response has been submitted successfuly.
            </div>
        <?php endif; ?>
        <div class="nk-block-head-content mt-2">
            <?php if (!$userHasEval) : ?>
                <a href="/examination/form/<?= $training->id ?>" class="btn btn-primary">Submit Evaluation</a>
            <?php endif ?>
            <?php if ($training->has_assessment && !$userHasAssess) : ?>
                <a href="/response/show/<?= $training->id ?>/0" class="btn btn-primary">Submit Assessment</a>
            <?php endif ?>
            <?php if ($userHasEval) : ?>
                <a href="/examination/show/<?= $evalId ?>" class="btn btn-success">Show Evaluation Result</a>
            <?php endif ?>
            <?php if ($userHasAssess) : ?>
                <a href="/response/showr/<?= $training->id ?>/0" class="btn btn-success">Show Assessment Result</a>
            <?php endif ?>
        </div>
    </div>
    <div class="card card-bordered card-preview">
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
                                <label class="form-label" for="facilitator_id">Facilitator</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="facilitator_id" name="facilitator_id" disabled>
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