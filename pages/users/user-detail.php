<?php
include('./core/DAL/database.php');
?>
<!-- ======= User-detail Section ======= -->
<section id="services" class="services section-bg">
    <div class="container">

        <div class="section-title">
            <?php foreach (getUserDetails() as $user) : ?>
                <span><?= $user['firstname'] ?> <?= $user['lastname'] ?></span>
                <h2><?= $user['firstname'] ?> <?= $user['lastname'] ?></h2>
            <?php endforeach ?>

        </div>
        <div class="row">

            <div class="col-lg-6 col-md-4 mb-5 justify-content-around align-self-end">
                <div class="icon-box">
                    <div class="icon">
                        <h3>Projects</h3>
                    </div>
                    <?php foreach (getUserProjects() as $user) : ?>
                        <h4><a href=""><?= $user['project_name'] ?></a></h4>
                        <p>Start date: <?= $user['start_date'] ?></p>
                        <p><?= $user['description'] ?></p><br>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 mb-5 d-flex justify-content-around">
                <div class="icon-box">
                    <div class="icon">
                        <h3>Tickets</h3>
                    </div>
                    <?php foreach (getUserTickets() as $user) : ?>
                        <h5><a href="">Tickets #<?= $user['tag'] ?></a></h5>
                        <p>Status: <?= $user['ticket_status'] ?></p>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 mb-5 d-flex justify-content-around align-self-end">
                <div class="icon-box">
                    <div class="icon">
                        <h3>Friends :</h3>
                    </div>
                    <!---->
                        <p><a href=""><?= $user['firstname'] ?></a></p>
                    <!---->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 col-md-10 justify-content-around">
                <div class="icon-box">
                    <div class="icon">
                        <h3>Messages with XXX</h3>
                    </div>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 d-flex justify-content-around mt-5">
                <button type="button" class="btn btn-primary">Join XXX</button>
            </div>

            <div class="col-lg-6 col-md-6 d-flex justify-content-around mt-5">
                <button type="button" class="btn btn-primary">Leave XXX</button>
            </div>
        </div>

    </div>


    </div>
</section>
<!-- End User-detail Section -->