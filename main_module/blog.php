<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

</head>

<body>
    <style>
        img {
            height: 5rem;
            width: 5rem;
            margin-right: 1.2rem;
            border-radius: 50%;
        }
        .blog {
            display: flex;
            border: solid 1px black;
            margin-top: 20px;
            padding: 0 12px;
            border-radius: 10px;
        }
        .blog:hover{
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            cursor: pointer;
        }
        .blog-content__main {
            margin-bottom: 10px;
        }

        .blog-content__updatedtime {
            display: block;
        }
        .sidebar {
            margin-top: 20px;
            border: solid 1px black;
            border-radius: 10px;
            height: fit-content;
        }
        .sidebar-content {
            padding: 5px;
        }
        a{
            color:black;
        }
    </style>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <div class=" m-auto fw-bold h1">
                    Forum
                </div>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row m-0">
            <div class=" col-12 col-md-9">
                <div class="blog">
                    <a href="" class="user" style="margin:auto;">
                        <img  src="https://www.w3schools.com/howto/img_avatar.png"
                            alt="">
                    </a>
                    <div class="blog-content mt-2">
                        <a href="#" class="blog-content__username h5 p-0 m-0 fw-bolder">Ten bai viet</a>
                        <div class="blog-content__main">
                            <p class="m-0 text-break fw-light"><small>Lorem ipsum, dolor sit amet consectetur
                                    adipisicing
                                    elit.
                                    Nesciunt eum unde est quis odio explicabo temporibus tempora, exercitationem nostrum
                                    pariatur quasi vel asperiores impedit voluptas expedita ipsum, iste voluptate
                                    deleniti.</small> </p>
                        </div>
                        <div class="blog-content_updatedtime">
                            <div class="row">
                                <div class="col-2 col-md-2 fst-italic">20 bai viet</div>
                                <div class="col-3 col-md-2 p-0 fst-italic text-center">Comment: 90</div>
                                <div class="col-3 col-md-5 p-0 fst-italic text-center">
                                    <span class="text-danger">Update at: 14/09/2023</span>
                                </div>
                                <div class="col-4 col-md-3 p-0 fst-italic text-center">Post by: Usernname</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-3 sidebar ">
                <div class="h3 p-1 text-center text-white mt-2" style="background-color: #459a2e;">
                    Bai viet noi bat
                </div>
                <div class="p-2">
                    <div class="sidebar-content row border mb-2">
                        <div class="col-2 col-md-2 text-center">
                            <a href="#" class="">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </div>
                        <div class="col-6 col-md-6">
                            <a href="">Ten bai viet</a>
                        </div>
                        <div class="col-4 col-md-4">
                            <a href="">Username</a>
                        </div>
                    </div>
                    <div class="sidebar-content row border mb-2">
                        <div class="col-2 col-md-2 text-center">
                            <a href="">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </div>
                        <div class="col-6 col-md-6">
                            <a href="">Ten bai viet</a>
                        </div>
                        <div class="col-4 col-md-4">
                            <a href="">Username</a>
                        </div>
                    </div>
                    <div class="sidebar-content row border mb-2">
                        <div class="col-2 col-md-2 text-center">
                            <a href="">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </div>
                        <div class="col-6 col-md-6">
                            <a href="">Ten bai viet</a>
                        </div>
                        <div class="col-4 col-md-4">
                            <a href="">Username</a>
                        </div>
                    </div>
                    <div class="sidebar-content row border mb-2">
                        <div class="col-2 col-md-2 text-center">
                            <a href="">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </div>
                        <div class="col-6 col-md-6">
                            <a href="">Ten bai viet</a>
                        </div>
                        <div class="col-4 col-md-4">
                            <a href="">Username</a>
                        </div>
                    </div>
                    <div class="sidebar-content row border mb-2">
                        <div class="col-2 col-md-2 text-center">
                            <a href="">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </div>
                        <div class="col-6 col-md-6">
                            <a href="">Ten bai viet</a>
                        </div>
                        <div class="col-4 col-md-4">
                            <a href="">Username</a>
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