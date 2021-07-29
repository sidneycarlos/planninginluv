<?php
include('./core/DAL/database.php');
?>
<!-- ======= Projects-list Section ======= -->
<section id="services" class="services section-bg">
    <div class="container">

        <div class="section-title">
            <span>Projects</span>
            <h2>Projects</h2>
        </div>


        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle float-right" type="button" data-toggle="dropdown">Filter
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">My projects</a></li>
                <li><a href="#">Create a project</a></li>
            </ul>
        </div>


        <div class="row">
            <?php foreach(getProjectCards() as $project):?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
                <div class="icon-box">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4><a href="http://localhost:944/?page=project-detail&id=<?=$project['project_id']?>"><?= $project['project_name']?></a></h4>
                    <p><?= $project['description']?></p>
                </div>

            </div>
            <? endforeach ?>

        
        </div>

    </div>
</section>
<!-- End Projects-list Section -->