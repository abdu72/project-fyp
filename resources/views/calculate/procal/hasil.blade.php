<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Halaman Hasil</title>
    <!-- Tambahkan stylesheet atau styling sesuai kebutuhan -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&family=Rubik+Doodle+Triangles&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/result.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="shadow">
            <a href="/"><img src="{{ asset('images/logo3.png') }}" alt="Logo" class="logo"></a>
            <div class="nav-topic">
                <b class="nav-tittle">Business Running Asset inheritance calculation</b>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="result-form">
            <h1 class="judul">Result of Calculating</h1>
            <hr>
            <br>

            <!-- Tampilkan pesan sukses jika ada -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif



            <div class="hasil-perhitungan">

                <ul>
                    @foreach($hasilData as $calculationKey2 => $calculationValue2)
                    @if($calculationValue2 !== 0)
                    <li>
                        <span class="key"><b>{{ $calculationKey2 }}</b></span>
                        <span class="value"><b>{{ $calculationValue2 }}</b></span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <div class="hasil-perhitungan">

                <ul>
                    @foreach($totalChild as $calculationKey2 => $calculationValue2)
                    @if($calculationValue2 !== 0)
                    <li>
                        <span class="key"><b>{{ $calculationKey2 }}</b></span>
                        <span class="value"><b>{{ $calculationValue2 }}</b></span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="hasil-perhitungan">

                <ul>
                    @foreach($totalChild2 as $calculationKey2 => $calculationValue2)
                    @if($calculationValue2 !== 0)
                    <li>
                        <span class="key"><b>{{ $calculationKey2 }}</b></span>
                        <span class="value"><b>{{ $calculationValue2 }}</b></span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <hr>
            <!-- Tampilkan tabel dengan hasil perhitungan -->
            <div class="hasil-perhitungan">

                <ul>
                    @foreach($hasilPerhitungan as $calculationKey => $calculationValue)
                    @if($calculationValue !== 0)
                    <li>
                        <span class="key"><b>{{ $calculationKey }}</b></span>
                        <span class="value"><b>RM</b>{{ $calculationValue }}</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <hr>
            <br>
            <div class="hasil-perhitungan-harta">

                <ul>
                    @foreach($totalHarta as $calculationKey => $calculationValue)
                    @if($calculationValue !== 0)
                    <li>
                        <span class="key"><b>{{ $calculationKey }}</b></span>
                        <span class="value"><b>RM</b>{{ $calculationValue }}</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <div class="button">
                <button class="print-button" onclick="cetakHalaman()">PRINT <svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                    </svg></button>
                <a button class="newhitung-button" href="/indextry2" style="text-decoration : none;">NEW DATA <svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-envelope-paper" viewBox="0 0 16 16">
                        <path
                            d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267zm13 .566v5.734l-4.778-2.867zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083zM1 13.116V7.383l4.778 2.867L1 13.117Z" />
                    </svg></a>
                </button>
            </div>

            <p class=regulation>See more regulation?<a class="click-r" href="/regulation"> Click here</a></p>


        </div>
        </form>



        <script>
        function cetakHalaman() {
            window.print();
        }
        </script>

    </div>
    </div>


    <!-- Tambahkan script JavaScript atau fungsi sesuai kebutuhan -->
</body>

</html>