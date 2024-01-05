<!DOCTYPE html>
<html>

<head>
    <title>I-Inheritance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



</head>

<body>
    <header>

        @if(session('success'))
        <div id="alert-success" class="alert alert-success">
            {{ session('success') }}
        </div>
        <script>
        setTimeout(function() {
            document.getElementById('alert-success').style.display = 'none';
        }, 2500); // Menghilangkan alert setelah 5 detik (5000 ms)
        </script>
        @endif


        <nav>
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="logo">


            @auth
            <ul class="menu">
                <li><a href="/"><i class="fas fa-home"></i><b> Home</b></a></li>
                <li><a href="#footer"><i class="fas fa-user"></i><b> About</b></a></li>
                <li><a href="/regulation"><i class="fas fa-file"></i><b> Regulation</b></a></li>
                <li><a href="#footer"><i class="fas fa-envelope"></i><b> Contact</b></a></li>
            </ul>
            <div class="dropdown">
                <button>Hello, {{ auth()->user()->username }}</button>
                <div class="dropdown-content">
                    <a href="/dashboard">Dashboard</a>
                    <hr>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-info"
                            onclick="return confirm('Are you sure want to logout?')">Logout</button>
                    </form>
                </div>
            </div>

            <!-- <h5>Hello, {{ auth()->user()->username }}</h5> -->

            @else
            <ul class="menu">
                <li><a href="/"><i class="fas fa-home"></i><b> Home</b></a></li>
                <li><a href="#footer"><i class="fas fa-user"></i><b> About</b></a></li>
                <li><a href="/regulation"><i class="fas fa-file"></i><b> Regulation</b></a></li>
                <li><a href="#footer"><i class="fas fa-envelope"></i><b> Contact</b></a></li>
            </ul>

            <div class="login">
                <a href="/login"><button type="button" class="btn-lgn">Login <svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg></button></a>
            </div>
            </form>

            @endauth

        </nav>
    </header>



    <section class="title-section">
        <div class="container">
            <div class="title-content">
                <h1 class="title">Welcome to Islamic Heritage Website</h1>
                <p class="subtitle">A trusted website for calculating inheritance and making wills easily and
                    accurately. With I-Inheritance, you can quickly calculate your inheritance amount using our smart
                    algorithm. We also provide safe and reliable testament services. Simplify your inheritance process
                    now and make the right financial decisions.</p>
                <a href="/indexcal"><button type="button" class="btn-signup">Try it Now <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z" />
                        </svg></button></a>
            </div>
            <div class="image-container">
                <!-- <img src="{{ asset('images/landing.png') }}" alt="Logo" class="random-image"> !-->
            </div>
        </div>
    </section>

    <section class="function-section">
        <div class="container1">

            <div class="row">
                <div class="col-md-4">
                    <div class="function-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-book" viewBox="0 0 16 16">
                            <path
                                d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                        </svg>
                        <br>
                        <h3 class="function-title">Make wills</h3>
                        <p class="function-description">You can make a will and keep it for the long term.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="function-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-calculator" viewBox="0 0 16 16">
                            <path
                                d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                            <path
                                d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z" />
                        </svg>
                        <h3 class="function-title">Calculate assets</h3>
                        <p class="function-description">Encourages you to calculate inheritance using proper calculation
                            according to Islamic laws and regulations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="function-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file-text" viewBox="0 0 16 16">
                            <path
                                d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                        </svg>
                        <h3 class="function-title">Rules & Regulations</h3>
                        <p class="function-description">Menyediakan platform untuk berbagi pengetahuan dan pengalaman
                            dengan komunitas global.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Konten lainnya -->

    <!-- <footer>-->

    <footer class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>About Us</h3>
                    <p>I-inheritance is a website application created to access various information related to
                        inheritance law in Islam, inheritance calculators and make wills according to an Islamic
                        perspective.</p>
                </div>
                <div class="col-md-6">
                    <h3 class="kontak">Contact</h3>
                    <ul class="contact-list">
                        <li><i class="fas fa-map-marker"></i> IIUM, Gombak, Malaysia</li>
                        <li><i class="fas fa-envelope"></i> Abdubwz92@gmail.com | Abdurrazaq@gmail.com</li>
                        <li><i class="fas fa-phone"></i> +60 655 4516</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>






    <script src="path/to/bootstrap.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>

</html>