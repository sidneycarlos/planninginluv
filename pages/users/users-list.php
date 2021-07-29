<?php
include('./core/DAL/database.php');
?>
<!-- ======= Users-list Section ======= -->


<section id="services" class="services section-bg">
    <div class="container">


        <div class="section-title">
            <span>users</span>
            <h2>users</h2>
            <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
        </div>


        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle float-right" type="button" data-toggle="dropdown">Filter
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">My friends</a></li>
                <li><a href="#">Create a team</a></li>
            </ul>
        </div>

        <div class="row">
            <!--cards-->
            <? foreach(getUserCards() as $user) : ?>
                <div class="card ml-4 mt-4" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $user['logo']?>" alt="User pic">
                    <div class="card-body">
                  
                    <a href="http://localhost:944/?page=user-detail&id=<?= $user['id']?>"><h5 class="card-title"><?= $user['firstname']?> <?= $user['lastname']?></h5></a>

                    </div>
                    <ul class="list-group list-group-flush">
                        <?foreach(getUserProjectsCards($user['id']) as $project): ?>
                        <li class="list-group-item"><a href="http://localhost:944/?page=project-detail"><?= $project['project_name']?></a></li>
                        <? endforeach?>
                    </ul>
                    <div class="card-body">
                        <button type="button" class="btn btn-light mb-3">Friend request</button>
                    </div>
                </div>

            <? endforeach ?>

            <!--end of cards-->
        </div>

    </div>
</section>
<!-- End Users-list Section -->