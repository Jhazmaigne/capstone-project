<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Evaluation
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Evaluation for <?= $training->topic ?></h4>
        </div>
    </div>

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Evaluation Form</span>
                <div>
                    <form class="row gy-4" action="/examination/store" method="POST">
                        <input type="hidden" name="training_id" value="<?= $training->id ?>" />
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-file-code"></em>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="sex">Sex</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="position">Position</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-file-code"></em>
                                    </div>
                                    <input type="text" class="form-control" id="position" name="position" placeholder="Position" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="district">District</label>
                            <?php $idx = 0; ?>
                            <?php foreach ($districts as $district) : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="district" id="district<?= $idx ?>" value="<?= $idx ?>" <?= $idx == 0 ? "checked" : "" ?>>
                                    <label class="form-check-label" for="district<?= $idx ?>">
                                        <?= $district ?>
                                    </label>
                                </div>
                                <?php $idx++; ?>
                            <?php endforeach ?>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="district">School</label>
                            <?php $idx = 0; ?>
                            <?php foreach ($schools as $school) : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="school" id="school<?= $idx ?>" value="<?= $idx ?>" <?= $idx == 0 ? "checked" : "" ?>>
                                    <label class="form-check-label" for="school<?= $idx ?>">
                                        <?= $school ?>
                                    </label>
                                </div>
                                <?php $idx++; ?>
                            <?php endforeach ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-6">
                                <h6>Session and Facilitator</h6>
                                <label class="form-label" for="first">Facilitator managed efficiently and well structured conference was delivered as planned.</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="first" id="first_1" value="1" checked>
                                    <label class="form-check-label" for="first_1">
                                        Strongly Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="first" id="first_2" value="2">
                                    <label class="form-check-label" for="first_2">
                                        Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="first" id="first_3" value="3">
                                    <label class="form-check-label" for="first_3">
                                        Agree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="first" id="first_4" value="4">
                                    <label class="form-check-label" for="first_4">
                                        Strongly Agree
                                    </label>
                                </div>

                                <label class="form-label" for="first">Facilitator were sensitive to the mood of the participant.</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="second" id="second_1" value="1" checked>
                                    <label class="form-check-label" for="second_1">
                                        Strongly Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="second" id="second_2" value="2">
                                    <label class="form-check-label" for="second_2">
                                        Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="second" id="second_3" value="3">
                                    <label class="form-check-label" for="second_3">
                                        Agree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="second" id="second_4" value="4">
                                    <label class="form-check-label" for="second_4">
                                        Strongly Agree
                                    </label>
                                </div>
                                <label class="form-label" for="first">The session was well planned and topics were relevant to the participant work.</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="third" id="third_1" value="1" checked>
                                    <label class="form-check-label" for="third_1">
                                        Strongly Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="third" id="third_2" value="2">
                                    <label class="form-check-label" for="third_2">
                                        Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="third" id="third_3" value="3">
                                    <label class="form-check-label" for="third_3">
                                        Agree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="third" id="third_4" value="4">
                                    <label class="form-check-label" for="third_4">
                                        Strongly Agree
                                    </label>
                                </div>
                                <label class="form-label" for="first">Time allotment for the topic was adequate.</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fourth" id="fourth_1" value="1" checked>
                                    <label class="form-check-label" for="fourth_1">
                                        Strongly Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fourth" id="fourth_2" value="2">
                                    <label class="form-check-label" for="fourth_2">
                                        Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fourth" id="fourth_3" value="3">
                                    <label class="form-check-label" for="fourth_3">
                                        Agree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fourth" id="fourth_4" value="4">
                                    <label class="form-check-label" for="fourth_4">
                                        Strongly Agree
                                    </label>
                                </div>
                                <label class="form-label" for="first">Speaker topic/presentation was short and to the point.</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fifth" id="fifth_1" value="1" checked>
                                    <label class="form-check-label" for="fifth_1">
                                        Strongly Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fifth" id="fifth_2" value="2">
                                    <label class="form-check-label" for="fifth_2">
                                        Disagree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fifth" id="fifth_3" value="3">
                                    <label class="form-check-label" for="fifth_3">
                                        Agree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fifth" id="fifth_4" value="4">
                                    <label class="form-check-label" for="fifth_4">
                                        Strongly Agree
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!-- <center> -->
                            <input type="submit" value="Submit" class="btn btn-lg btn-primary" />
                            <!-- </center> -->

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>