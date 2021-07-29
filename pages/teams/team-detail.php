<?php
include('./core/DAL/database.php');
?>
<!-- ======= Team-detail Section ======= -->
<section id="services" class="services section-bg">
    <div class="container">

        <div class="section-title">
            <?php foreach (getTeamDetail() as $team) : ?>
                <span><?= $team['name'] ?></span>
                <h2><?= $team['name'] ?></h2>
            <?php endforeach ?>
            <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
        </div>
        <div class="row">

            <div class="col-lg-6 col-md-4 mb-5 justify-content-around align-self-end">
                <div class="icon-box">
                    <div class="icon">
                        <h3>Projects</h3>
                    </div>
                    <?php foreach (getTeamProject() as $teamId) : ?>
                        <h4><a href=""><?= $teamId['project_name'] ?></a></h4>
                        <p>Start date: <?= $teamId['start_date'] ?></p>
                        <p><?= $teamId['description'] ?></p><br>
                    <?php endforeach ?>
                </div>
            </div>
<!--
            <?//php foreach (getTeamProject() as $teamId) : ?>
                        <h4>
                            <?php //foreach (getProjectCards() as $project) : ?>
                                <a href="http://localhost:3009/?page=project-detail&id=<?//= $teamId['project_id'] ?>&project-id=<?//= $project['project_id'] ?>">
                            <?php //endforeach ?>
                                <?//= $teamId['project_name'] ?>
                                </a>
                        </h4>
                        <p>Start date: <?//= $teamId['start_date'] ?></p>
                        <p><?//= $teamId['description'] ?></p><br>
                    <?php //endforeach ?>
-->
            <div class="col-lg-4 col-md-4 mb-5 d-flex justify-content-around">
                <div class="icon-box">
                    <div class="icon">
                        <h3>Tickets</h3>
                    </div>
                    <?php foreach (getTeamProject() as $teamId) : ?>
                        <h5><a href="">Tickets #<?= $teamId['tag'] ?></a></h5>
                        <p>Status: <?= $teamId['ticket_status'] ?></p>
                    <?php endforeach ?>
                    <button type="button" class="btn btn-primary mt-4">New Ticket</button>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 mb-5 d-flex justify-content-around align-self-end">
                <div class="icon-box">
                    <div class="icon">
                        <h3>Team members:</h3>
                    </div>
                    <?php foreach (getTeamMembers() as $member) : ?>
                        <p><a href=""><?= $member['firstname'] ?></a></p>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 col-md-10 justify-content-around">
                <div class="icon-box">
                    <div class="icon">
                        <h3>Messages</h3>
                    </div>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 d-flex justify-content-around mt-5">
                <button type="button" class="btn btn-primary">Join team</button>
            </div>

            <div class="col-lg-6 col-md-6 d-flex justify-content-around mt-5">
                <button type="button" class="btn btn-primary">Leave team</button>
            </div>
        </div>

    </div>


    </div>
</section>
<!-- End Team-detail Section -->