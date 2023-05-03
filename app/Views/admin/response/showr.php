<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Response
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title"><?= $response->questionnaire->is_evaluation ? "Evaluation Result - " : "Assessment Result - " ?> <?= ucfirst($response->questionnaire->training->topic) ?></h4>
            <div class="nk-block-des text-soft">
                Total number of items <?= count($response->questionnaire->questions) ?>
            </div>
        </div>
    </div>
    <?php if (!$response->questionnaire->is_evaluation) : ?>
        <a href="/response/showcert/<?= $response->id ?>" class="btn btn-success">Show Certificate</a>
        <div class="card card-bordered card-preview mt-2">
            <div class="card-inner">
                <span class="preview-title-lg overline-title">Summary</span>
                <ul class="preview-list">
                    <li class="preview-item">
                        <span class="badge badge-dot bg-success"><?= count($response->correct_answers) ?> Correct Answers</span>
                    </li>
                    <li class="preview-item">
                        <span class="badge badge-dot bg-danger"><?= count($response->incorrect_answers) ?> Incorrect Answers</span>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <?php $count = 1 ?>
    <form class="row">
        <?php foreach ($response->answers as $answer) : ?>
            <div class="col-6 mt-2">
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <div class="preview-block">
                            <span class="preview-title-lg overline-title">QUESTION # <?= $count ?></span>
                            <div>
                                <p><?= $answer->question->description ?></p>
                                <p class="lead">RESPONSE: </p>
                                <?php if (!$response->questionnaire->is_evaluation) : ?>
                                    <h5 class="<?= $answer->choice->is_correct ? 'text-success' : 'text-danger'  ?>"><?= $answer->choice->description ?></h5>
                                <?php else : ?>
                                    <h5><?= $answer->choice->description ?></h5>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
        <?php endforeach ?>


</div>
<?= $this->endSection() ?>