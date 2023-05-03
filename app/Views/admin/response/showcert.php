<?= $this->extend("layout\master") ?>
<?= $this->section("title") ?>
Response
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<style type='text/css'>
    /* body, */
    /* html {
        margin: 0;
        padding: 0;
    } */

    #body {
        color: black;
        display: table;
        font-family: Georgia, serif;
        font-size: 24px;
        text-align: center;
    }

    .container {
        border: 20px solid tan;
        width: 750px;
        height: 563px;
        display: table-cell;
        vertical-align: middle;
    }

    .logo {
        color: tan;
    }

    .marquee {
        color: tan;
        font-size: 48px;
        margin: 20px;
    }

    .assignment {
        margin: 20px;
    }

    .person {
        border-bottom: 2px solid black;
        font-size: 32px;
        font-style: italic;
        margin: 20px auto;
        width: 400px;
    }

    .reason {
        margin: 20px;
    }
</style>
<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h4 class="nk-block-title">Certificate of completion</h4>
    </div>
    <div class="nk-block-head-content mt-2">
        <button class="btn btn-primary" onclick="download()">Download</button>
    </div>
</div>
<div class="container mt-2" id="body">
    <div class="logo mt-5">
        DEPED
    </div>

    <div class="marquee">
        Certificate of Completion
    </div>

    <div class="assignment">
        This certificate is presented to
    </div>

    <div class="person">
        <?= $response->personnel->full_name ?>
    </div>

    <div class="reason">
        For the completion of <br />
        <?= $response->questionnaire->training->topic ?> Training
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<script>
    function download() {
        var canvas = document.getElementById("body");
        html2canvas(document.querySelector("#body")).then(canvas => {
            const createEl = document.createElement('a');
            createEl.href = canvas.toDataURL();
            createEl.download = "download-this-canvas";
            createEl.click();
            createEl.remove();
        });
    }
</script>
<?= $this->endSection() ?>