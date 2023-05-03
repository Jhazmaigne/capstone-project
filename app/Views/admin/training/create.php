<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Trainings
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">New</h4>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Training Form</span>
                <div>
                    <form class="row gy-4" action="/training/store" method="POST">
                        <div class="col-sm-4">
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
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="form-label" for="venue">Venue</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-building"></em>
                                    </div>
                                    <input type="text" class="form-control" id="venue" name="venue" placeholder="Venue" required />
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
                                    <input type="datetime-local" class="form-control" id="datetime" name="datetime" required />
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
                                    <input type="text" class="form-control" id="place" name="place" placeholder="Place" required />
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="speaker_id">Facilitator</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="facilitator_id" name="facilitator_id">
                                            <?php foreach ($personnels as $personnel) : ?>
                                                <option value="<?= $personnel->id ?>"><?= $personnel->full_name ?></option>
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
                                        <select class="form-control" id="status" name="status">
                                            <option value="draft">Draft</option>
                                            <option value="ongoing">Ongoing</option>
                                            <option value="done">Done</option>
                                            <option value="cancel">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="form-label">Participants</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" name="participants[]" multiple="multiple" data-placeholder="Select Participants">
                                        <?php foreach ($personnels as $personnel) : ?>
                                            <option value="<?= $personnel->id ?>"><?= $personnel->full_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-primary" value="Save" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>