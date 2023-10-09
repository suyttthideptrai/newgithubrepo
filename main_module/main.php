<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <style>
        /* .slideshow{
    margin: 0;
    padding: 0 !important;
    box-sizing: border-box !important;
} */

*{
    box-sizing: border-box;
}
img{
    image-rendering: pixelated;
}

.carousel-indicators button {
    height: 10px !important;
    width: 10px !important;
    margin: 0 5px !important;
    border-radius: 100%;
    background-color: white !important;
}

.btnControl{
    height: 3.75rem;
    width: 3rem;
    top:40%;
    margin: 0 0.2rem;
}
.btnControl:hover{
    opacity: 0.5 !important;
    background-color: black;
}

.card-img-top {
    width: 100%;
    height: 30vh;
    object-fit: fill;
}
.moreInfo {
    box-shadow: 1px 2px 10px #888888;
}

.moreInfo:hover span{
    opacity: 0.7;
}

.content-header{
    position: relative;
}
.content-header::before{
    position: absolute;
    width: 100%;
    content: ' ';
    height: 2px;
    left: 0;
    background-color: #111;
    bottom: -10px;
}
    </style>
    <div class="container p-0">
        <div id="carouselExampleCaptions" class="carousel slide slideshow" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="../images/img_lights_wide.jpg" loading="lazy" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="../images/img_mountains_wide.jpg" loading="lazy" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="../images/img_nature_wide.jpg" loading="lazy" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev btnControl" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next btnControl" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="main-cotent mt-5 p-0 ">
            <div class="content">
                <div class="content-text">
                    <h2 class="fw-bolder content-header text-uppercase">
                        Upcoming Event
                    </h2>
                    <p class="fw-lighter mt-3 text-uppercase" style="font-size: 0.8rem;">
                        Something is here
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 ">
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_lights_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <a class=" btn moreInfo" href=""><span>Read more</span></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_mountains_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_nature_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This card has even longer content than the first to show that equal
                                height action.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_snow_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="main-cotent mt-5 p-0 ">
            <div class="content">
                <div class="content-text">
                    <h2 class="fw-bolder content-header text-uppercase">
                        Country
                    </h2>
                    <p class="fw-lighter mt-3 text-uppercase" style="font-size: 0.8rem;">
                        Something is here
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 ">
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_lights_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <a class=" btn moreInfo" href=""><span>Read more</span></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_mountains_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_nature_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This card has even longer content than the first to show that equal
                                height action.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_snow_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="main-cotent mt-5 p-0 ">
            <div class="content">
                <div class="content-text">
                    <h2 class="fw-bolder content-header text-uppercase">
                       Festival
                    </h2>
                    <p class="fw-lighter mt-3 text-uppercase" style="font-size: 0.8rem;">
                        Something is here
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 ">
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_lights_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <a class=" btn moreInfo" href=""><span>Read more</span></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_mountains_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_nature_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This card has even longer content than the first to show that equal
                                height action.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_snow_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="main-cotent mt-5 p-0 ">
            <div class="content">
                <div class="content-text">
                    <h2 class="fw-bolder content-header text-uppercase">
                        Blog
                    </h2>
                    <p class="fw-lighter mt-3 text-uppercase" style="font-size: 0.8rem;">
                        Something is here
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 ">
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_lights_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <a class=" btn moreInfo" href=""><span>Read more</span></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_mountains_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_nature_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This card has even longer content than the first to show that equal
                                height action.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/img_snow_wide.jpg" loading="lazy" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <a class="btn moreInfo" href=""><span>Read more</span></a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</html>