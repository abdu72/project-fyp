<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I-Inheritance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/hometry.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&family=Rubik+Doodle+Triangles&display=swap"
        rel="stylesheet">
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

        <section class="slideshow-section">
            <div class="nav-container">
                <nav class="shadow">
                    <div class="menu-toggle">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>

                    <img src="{{ asset('images/logo3.png') }}" alt="Logo" class="logo">

                    @auth
                    <ul class="menu">
                        <li><a href="#feature"><i class="fas fa-home"></i><b> Feature</b></a></li>
                        <li><a href="#about-us"><i class="fas fa-user"></i><b> About</b></a></li>
                        <li><a href="/regulation"><i class="fas fa-file"></i><b> Regulation</b></a></li>
                        <li><a href="#footer"><i class="fas fa-envelope"></i><b> Contact</b></a></li>
                    </ul>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Hello, {{ auth()->user()->username }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="/dashboard" style="text-decoration: none;"><button class="dropdown-item"
                                        type="button">Dashboard</button></a>
                            </li>
                            <form action="/logout" method="post">
                                @csrf
                                <li><button class="dropdown-item" type="submit"
                                        onclick="return confirm('Are you sure want to logout?')">Logout</button></li>
                            </form>
                        </ul>
                    </div>

                    @else

                    <ul class="menu">
                        <li><a href="#feature"><i class="fas fa-home"></i><b> Feature</b></a></li>
                        <li><a href="#about-us"><i class="fas fa-user"></i><b> About</b></a></li>
                        <li><a href="/regulation"><i class="fas fa-file"></i><b> Regulation</b></a></li>
                        <li><a href="#footer"><i class="fas fa-envelope"></i><b> Contact</b></a></li>
                    </ul>

                    <a href="/login"><button type="button" class="btn-lgn">Login</button></a>
                    @endauth
                </nav>
            </div>

            <!-- Konten Anda di sini -->
            <div class="container1">
                <div class="welcome">
                    <h1 class="title"><b>WELCOME TO ISLAMIC HERITAGE WEBSITE</b></h1>
                    <p class="subtitle">A trusted website for calculating inheritance and making wills easily and
                        accurately. With I-Inheritance, you can quickly calculate your inheritance amount using our
                        smart
                        algorithm. We also provide safe and reliable testament services. Simplify your inheritance
                        process
                        now and make the right financial decisions.</p>

                </div>
            </div>
        </section>
    </header>





    <section id="feature">

        <div class="fitur">
            <h3 class="head-topic">FEATURES</h3>
        </div>

        <div class="container-fitur">

            <div class="card" style="width: 18rem;">
                <a href="/indexcal1" style="text-decoration: none; color : black;">
                    <img src="/images/fix-aset.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-topic"><b>Fix Assest Calculation</b></p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                    </div>
                </a>
            </div>

            <div class="card" style="width: 18rem;">
                <a href="/indextry2" style="text-decoration: none; color : black;">
                    <img src="/images/business-aset.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-topic"><b>Running Business Calculation</b></p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                    </div>
                </a>
            </div>
            <div class="card" style="width: 18rem;">
                <a href="/dashboard/posts" style="text-decoration: none; color : black;">
                    <img src="/images/will.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-topic"><b>Store and See your will</b></p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                    </div>
                </a>
            </div>
        </div>


    </section>

    <section id="about-us">
        <div class="fitur">
            <h3 class="head-topic">ABOUT US</h3>
        </div>

        <div class="why">
            <p class="sub-topic">WHY I-inheritance?</p>

            <div class="slogan">
                <img src="{{ asset('images/slogan.png') }}" alt="" style=" width: 350px;">
            </div>
        </div>


        <div class="goal-body">
            <div class="goal-container">
                <div class="goal">
                    <ul>
                        <li class="goal-li">We help reduce potential disputes and conflicts between heirs in the
                            distribution of inheritance.</li>
                    </ul>
                    <img src="/images/about/1.png" class="goal-image" alt="Goal Image">
                </div>
            </div>
            <br>
            <div class="goal-container">
                <div class="goal">
                    <ul>
                        <li class="goal-li">The application automatically calculates the distribution of inheritance in
                            accordance with Islamic law</li>
                    </ul>
                    <img src="/images/about/2.png" class="goal-image" alt="Goal Image">
                </div>
            </div>
            <br>
            <div class="goal-container">
                <div class="goal">
                    <ul>
                        <li class="goal-li">We provides accurate information about inheritance law in Islamic Law</li>
                    </ul>
                    <img src="/images/about/3.png" class="goal-image" alt="Goal Image">
                </div>
            </div>
            <br>
            <div class="goal-container">
                <div class="goal">
                    <ul>
                        <li class="goal-li">People can make the right decisions in dividing an inheritance with the help
                            of
                            the provided information.</li>
                    </ul>
                    <img src="/images/about/4.png" class="goal-image" alt="Goal Image">
                </div>
            </div>
            <br>
            <div class="goal-container">
                <div class="goal">
                    <ul>
                        <li class="goal-li">Users do not need to visit a notary to make a will because we offers a
                            platform
                            for making a will according to Islamic teachings.</li>
                    </ul>
                    <img src="/images/about/5.png" class="goal-image" alt="Goal Image">
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Our Mission</h5>
                        <hr>
                        <p class="card-text">Our mission is to be the main driver in providing innovative and affordable
                            financial planning solutions to the community. We are committed to providing a platform that
                            makes it easier for individuals to manage their inheritance intelligently. Through a
                            high-tech approach, we deliver reliable and easy-to-use tools, giving everyone access to
                            organize and plan their financial future with confidence. </p>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Our Vision</h5>
                        <hr>
                        <p class="card-text">Create a revolution in the understanding and management of
                            inheritance and personal finance. We aspire to build an ecosystem where legacy planning is
                            no longer complicated or expensive, but an easy to access, organize and manage experience.
                            We want to provide a solution that is more than just a planning tool, but also a trusted
                            partner in every step of the individual in making smart and sustainable financial decisions.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- <footer>-->

    <footer class="footer">
        <div class="container">
            <div class="contact-info">
                <h4>Contact</h4>
                <p>IIUM, Gombak, Malaysia</p>
                <p>Email: Abdubwz92@gmail.com | Abdurrazaq@gmail.com</p>
                <p>Phone: +6017 285 2789 | +6011 2331 8700</p>
            </div>
        </div>
    </footer>



    <script src="{{ asset('js/hometry.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>