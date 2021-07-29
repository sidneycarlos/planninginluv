<?php
include('./core/DAL/database.php');
?>
<!-- ======= Project-detail Section ======= -->
<section id="services" class="services section-bg">
    <div class="container">

        <div class="section-title">
            <?php foreach (getProjectDetail() as $project) : ?>
                <span><?= $project['project_name'] ?></span>
                <h2><?= $project['project_name'] ?></h2>
            <?php endforeach ?>
            <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
        </div>

        <div class="col-12">


        </div>



        <div class="row pb-5">
            <div class="col-lg-8 col-md-8 justify-content-around align-self-end">
                <div class="icon-box">
                    <?php foreach (getProjectDetail() as $project) : ?>
                        <div class="icon"><img src="<?= $project['logo'] ?>" alt="logo projet"></div>
                        <h4>Project: <?= $project['project_name'] ?></h4>
                        <h5>Team:</h5>
                        <p><?= $project['name'] ?></p><br>
                        <h5>Description:</h5>
                        <p><?= $project['description'] ?></p><br>
                        <h5>Start Date:</h5>
                        <p><?= $project['start_date'] ?></p><br>
                    <?php endforeach ?>
                    <button type="button" class="btn btn-primary">Join Project</button>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 justify-content-around">
                <div class="icon-box">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <?php foreach (getProjectTicket($project['project_id']) as $ticket) : ?>
                        <h4><a href="http://localhost:944/?page=ticket-detail&id=<?= $ticket['id'] ?>">Ticket tag #<?= $ticket['tag'] ?></a> <br>Status: <?= $ticket['ticket_status'] ?></h4>
                        <p></p>
                    <?php endforeach ?>
                    <button type="button" class="btn btn-primary">New Ticket</button>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 justify-content-around">
                <div class="icon-box">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4><a href="">Messages</a></h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
            </div>

        </div>


    </div>
</section>
<!-- End Project-detail Section -->