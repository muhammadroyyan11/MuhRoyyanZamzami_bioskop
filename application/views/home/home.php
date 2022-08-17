<!-- Welcome -->
<section class="jumbotron text-center">
    <h1>Bioskop Royyan</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <hr class="my-hr">
    <p class="lead">It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-outline-primary btn-lg" href="#" role="button">Learn more</a>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#FFFFFF" fill-opacity="1" d="M0,64L60,85.3C120,107,240,149,360,176C480,203,600,213,720,197.3C840,181,960,139,1080,138.7C1200,139,1320,181,1380,202.7L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
</section>
<!-- end welcome -->

<!-- 6 new film -->
<section id="newFilm" class="mb-4">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-md">
                <h2>New Film</h2>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <?php foreach ($film as $key => $data) { ?>
                <div class="col-md-4 mb-3">
                    <div class="card rapi">
                        <img src="<?= base_url() ?>assets/uploads/poster/<?= $data->poster ?>" class="card-img-top" style="weight: 300px; height:400px;">
                        <div class="card-body">
                            <h5 class="card-title mb-4 text-center"><a href="" class="text-dark"><?= $data->judul_film ?></a></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row text-center">
            <div class="col-md">
                <a class="btn btn-outline-primary btn-lg" href="<?= site_url('film') ?>" role="button">Find more</a>
            </div>
        </div>
    </div>
</section>
<!-- enc new film -->