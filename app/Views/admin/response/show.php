<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Response
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title"><?= $questionnaire->is_evaluation ? "Evaluation " : "Assessment " ?> <?= ucfirst($questionnaire->training->topic) ?></h4>
            <div class="nk-block-des text-soft">
                Total number of items <?= count($questionnaire->questions) ?>
            </div>
        </div>
    </div>
    <?php $count = 1 ?>
    <form class="row" method="POST" action="/response/submit">
        <input type="hidden" name="id" value="<?= $questionnaire->id ?>" />
        <?php foreach ($questionnaire->questions as $question) : ?>
            <div class="col-6 mt-2">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <div class="preview-block">
                            <span class="preview-title-lg overline-title">QUESTION # <?= $count ?></span>
                            <div>
                                <p><?= $question->description ?></p>
                                <div class="form-group">
                                    <label class="form-label" for="choice_id">Response</label>
                                    <div class="form-control-wrap ">
                                        <div class="form-control-select">
                                            <select class="form-control" id="choice_id" name="choice_id_<?= $question->id ?>">
                                                <?php foreach ($question->choices as $choice) : ?>
                                                    <option value="<?= $choice->id ?>"><?= $choice->description ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $count++; ?>
        <?php endforeach ?>
        <div class="mt-2">
            <input type="submit" value="Submit Response" class="btn btn-primary" />
        </div>
    </form>

</div>
<?= $this->endSection() ?>