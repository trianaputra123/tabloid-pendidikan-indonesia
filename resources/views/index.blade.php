<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang</title>

    {{-- Bootsrap --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">

    {{-- Fontawesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="" width="50" height="50"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4">
                        <a class="nav-link btn btn-primary" aria-current="page" href="#"><i
                                class="fa fa-user-circle" aria-hidden="true"></i> Sign-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kabupaten 1
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kabupaten 2
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kabupaten 3
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- content --}}
    <div class="container py-5">
        <div class="row mb-3">
            {{-- berita terkini --}}
            <div class="col-md-5">
                <h5>Berita Terkini</h5>
                <div class="card mb-3">
                    <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="row justify-content-between">
                            <p class="card-text col-5"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <a href="#" class="col-5 text-end">Lanjut membaca >></a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- berita terpopuler --}}
            <div class="col-md-7">
                <h5 style="visibility: hidden;">A</h5>
                <div class="bg-secondary mb-3" style="height: 270px; position: relative;">
                    {{-- <img src="{{ asset('img/card.png') }}" class="w-100 h-100" alt="..."
                        style="object-fit: contain; object-position: center"> --}}
                    <h4 style="position: absolute; left: 33%; top: 40%;">Peringatan Hari Raya</h4>
                </div>

                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('img/card.png') }}" class="card-img-top"
                                alt="{{ asset('img/card.png') }}">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('img/card.png') }}" class="card-img-top"
                                alt="{{ asset('img/card.png') }}">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('img/card.png') }}" class="card-img-top"
                                alt="{{ asset('img/card.png') }}">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('img/card.png') }}" class="card-img-top"
                                alt="{{ asset('img/card.png') }}">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- sekapur sirih --}}
        <div class="bg-light mb-5 p-3">
            <h5 class="text-center">Sekapur Sirih</h5>

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto ab impedit aspernatur laborum. Magni
                deserunt et nulla, adipisci eaque, ipsum debitis eveniet natus distinctio voluptates dolor! Laboriosam,
                ut commodi nesciunt laborum nemo magni dolore quis facere? Tenetur, alias animi voluptate laborum fuga
                aliquam blanditiis? Voluptatibus aperiam ipsum consectetur alias exercitationem esse libero!
                Perferendis, quas unde enim perspiciatis veniam asperiores repellat quasi quae natus, animi non quod
                maiores id temporibus ducimus beatae modi sapiente nobis explicabo quidem! Ducimus et voluptatem ipsam!
            </p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis recusandae libero eum, tempora at et
                inventore velit, eaque praesentium laboriosam vel, amet illo numquam adipisci fugiat autem blanditiis?
                Sequi reprehenderit fugit dignissimos iure eligendi. Aperiam, qui deleniti. Aut, accusantium iusto.</p>
        </div>

        <h5>Berita Lainnya</h5>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('img/card.png') }}" class="card-img-top" alt="{{ asset('img/card.png') }}">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}

    {{-- bundle bootsrap --}}
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Jquery CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- Fontawesome CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    {{-- Sweetalert CDN --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- My Script --}}
</body>

</html>
