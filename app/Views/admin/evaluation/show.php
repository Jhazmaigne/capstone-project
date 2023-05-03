<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Evaluations
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Viewing <?= ucfirst($evaluation->title) ?></h4>
        </div>
        <div class="nk-block-des text-soft mt-1">
            <p>Evaluation for <?= ucfirst($evaluation->training->topic) ?></p>
        </div>
        <div class="nk-block-head-content mt-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQuestion">Add Question</button>
        </div>
    </div>
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-xxl-6 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Total number of Questions</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <!-- DATA -->
                                    <div class="amount"><?= count($evaluation->questions) ?></div>
                                    <div class="nk-ecwg6-ck">
                                        <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Total number of Responses</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <!-- DATA -->
                                    <div class="amount"><?= count($evaluation->responses) ?></div>
                                    <div class="nk-ecwg6-ck">
                                        <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <span class="preview-title-lg overline-title">Questions</span>
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th width="20%">Description</th>
                        <th width="20%">Choice 1</th>
                        <th width="20%">Choice 2</th>
                        <th width="20%">Choice 3</th>
                        <th width="20%">Choice 4</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($evaluation->questions as $question) : ?>
                        <tr>
                            <td><?= $question->description ?></td>
                            <td><?= $question->choices[0]->description ?></td>
                            <td><?= $question->choices[1]->description ?></td>
                            <td><?= $question->choices[2]->description ?></td>
                            <td><?= $question->choices[3]->description ?></td>
                            <td>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <!-- <li><a href="/question/show/<?= $question->id ?>"><em class="icon ni ni-eye"></em>Show<span></span></a></li> -->
                                            <!-- <li><a href="/question/edit/<?= $question->id ?>"><em class="icon ni ni-pen"></em>Edit<span></span></a></li> -->
                                            <li><a href="javascript:void(0)" onclick="onclickDelete(<?= $question->id ?>)"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
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
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <span class="preview-title-lg overline-title">Responses</span>
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th width="100%">Personnel</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($evaluation->responses as $response) : ?>
                        <tr>
                            <td><?= $response->personnel->full_name ?></td>
                            <td>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="/response/showra/<?= $response->id ?>"><em class="icon ni ni-eye"></em>Show<span></span></a></li>
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
<div class="modal fade" tabindex="-1" id="addQuestion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Question</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="/question/store" method="POST">
                    <input type="hidden" name="id" value="<?= $evaluation->id ?>">
                    <div class="form-group">
                        <label for="name">Question</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Description" required />
                    </div>
                    <div class="form-group">
                        <label for="name">Choice 1</label>
                        <input type="text" name="description_1" class="form-control" id="description_1" placeholder="Description" required />
                    </div>
                    <div class="form-group">
                        <label for="name">Choice 2</label>
                        <input type="text" name="description_2" class="form-control" id="description_2" placeholder="Description" required />
                    </div>
                    <div class="form-group">
                        <label for="name">Choice 3</label>
                        <input type="text" name="description_3" class="form-control" id="description_3" placeholder="Description" required />
                    </div>
                    <div class="form-group">
                        <label for="name">Choice 4</label>
                        <input type="text" name="description_4" class="form-control" id="description_4" placeholder="Description" required />
                    </div>
                    <!-- <div class="form-group">
                        <label for="name">Correct Answer</label>
                        <select name="correct_answer" class="form-control" id="correct_answer" required>
                            <option value="1">Choice 1</option>
                            <option value="2">Choice 2</option>
                            <option value="3">Choice 3</option>
                            <option value="4">Choice 4</option>
                        </select>
                    </div> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- DELETE FORM -->
<form action="/question/delete" method="POST" id="deleteForm">
    <input type="hidden" name="id" id="deleteId" />
    <input type="hidden" name="questionnaire_id" value="<?= $evaluation->id ?>" />
</form>
<script>
    function onclickDelete(id) {
        document.getElementById("deleteId").value = id;
        $("#deleteForm").submit();
    }
</script>
<?= $this->endSection() ?>