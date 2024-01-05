<!DOCTYPE html>
<html>

<head>
    <title>Property running inheritance calculation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{ asset('css/cal1.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar__container">
                <a href="/procal3" class="navbar__back-icon"><i class="fas fa-arrow-left"></i></a>
                <h1 class="navbar__title">Property running inheritance calculation</h1>
            </div>
        </nav>
    </header>


    <div class="container">
        <h6>Heir Running Property Information</h6>
        <hr>
        <form>
            <div class="form-group">
                <div class="form-check">
                    <b><a>The type of business left by the heir</a></b>
                    <p class="expln">write down the type of running business that exists</p>
                    <input type="text" id="fname" name="fname">
                </div>
            </div>
            <br>


            <div class="form-group">
                <div class="form-check">
                    <b><a>Want to calculate for what month's income</a></b>
                    <p class="expln">Select the month that matches your current month</p>
                    <select id="bulan" name="bulan">
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>

                </div>
            </div>


            <br>



            <div class="form-group">
                <div class="form-check">
                    <b><a>Income running business this month</a></b>
                    <p class="expln">This income will be automatically saved to your database</p>
                    <input type="text" id="fname" name="fname">
                </div>
            </div>

            <br>

            <a class="btn" href="/detail2" button type="submit">Calculate</button></a>
        </form>
    </div>


</body>


</html>