<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Evaluation
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Evaluation Result</h4>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Your submission</span>
                <div class="row">
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <h6><?= $evaluation["name"] ?></h6>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">Sex</label>
                            <h6><?= ucfirst($evaluation["gender"]) ?></h6>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">Position</label>
                            <h6><?= ucfirst($evaluation["position"]) ?></h6>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">School</label>
                            <h6><?= $schools[intval($evaluation["school"])] ?></h6>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">District</label>
                            <h6><?= $districts[intval($evaluation["district"])] ?></h6>
                        </div>
                    </div>

                </div>

                <span class="preview-title-lg overline-title mt-5">Questionnaires</span>
                <div class="row">
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">Facilitator managed efficiently and well structured conference was delivered as planned.</label>
                            <h6><?= $ans[intval($evaluation["first"]) - 1] ?></h6>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">Facilitator were sensitive to the mood of the participant.</label>
                            <h6><?= $ans[intval($evaluation["second"]) - 1] ?></h6>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">The session was well planned and topics were relevant to the participant work.</label>
                            <h6><?= $ans[intval($evaluation["third"]) - 1] ?></h6>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">Time allotment for the topic was adequate.</label>
                            <h6><?= $ans[intval($evaluation["fourth"]) - 1] ?></h6>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="name">Speaker topic/presentation was short and to the point.</label>
                            <h6><?= $ans[intval($evaluation["fifth"]) - 1] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>