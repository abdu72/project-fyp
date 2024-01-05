<!DOCTYPE html>
<html lang="en">

<head>
    <title>Business Running Asset inheritance calculation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{ asset('css/indextry.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&family=Rubik+Doodle+Triangles&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <nav class="shadow">
            <a href="/"><img src="{{ asset('images/logo3.png') }}" alt="Logo" class="logo"></a>
            <div class="nav-topic">
                <a href="/" class="navbar__back-icon"><i class="fas fa-arrow-left"></i></a>
                <b class="nav-tittle">Business Running Asset inheritance calculation</b>
            </div>
        </nav>
    </header>

    <div class="container shadow">
        <h6>General Information of the Heir</h6>
        <hr>
        <form method="POST" action="{{ route('hitung2') }}">
            @csrf
            <!-- Tambahkan CSRF token untuk keamanan -->
            <div class="form-group">
                <div class="form-check">
                    <b><a>Gender of heir</a></b>
                    <p class="expln">Gender of the party leaving the property</p>
                    <label class="radio-button"><input type="radio" name="gender" value="Male"
                            onchange="showForm()"><span class="radio-custom"></span> Male</label>
                    <label class="radio-button"><input type="radio" name="gender" value="Female"
                            onchange="showForm()"><span class="radio-custom"></span> Female</label>

                    <!-- Form untuk laki-laki -->
                    <div id="lakiForm" class="hidden">
                        <b><a>Is the heir legally married?</a></b>
                        <p class="expln">Only legal marriages are recognized by the state</p>
                        <div class="radio-group">
                            <label class="radio-button">
                                <input type="radio" name="status" value="Married" onchange="showfamilyForm()">
                                <span class="radio-custom"></span>
                                Yes, the heir is married
                            </label>
                            <label class="radio-button">
                                <input type="radio" name="status" value="Single" onchange="showfamilyForm()">
                                <span class="radio-custom"></span>
                                No, the heir is not married
                            </label>
                        </div>

                        <!-- form family laki-laki married -->

                        <div id="family1Form" class="hidden">
                            <b><a>Who are the remaining heir families?</a></b>
                            <p class="expln">Checklist for the biological family only</p>
                            <label>
                                <input type="checkbox" name="anaklaki" onchange="toggleInput('sonInput')">
                                Son&emsp;&emsp;&emsp;&thinsp;
                                <img src="{{ asset('images/son.png') }}">
                            </label>
                            <label>
                                <input type="checkbox" name="anakperempuan" onchange="toggleInput('daughterInput')">
                                Daughter&ensp;
                                <img src="{{ asset('images/daughter.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="ibu" onchange="toggleInput('ibuInput')"> Mother&emsp;&ensp;
                                <img src="{{ asset('images/mother.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="bapak" onchange="toggleInput('abiInput')">
                                Father&emsp;&ensp;&ensp;
                                <img src="{{ asset('images/FATHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="istri" onchange="toggleInput('istriInput')">
                                Wife&emsp;&ensp;&emsp;&thinsp;
                                <img src="{{ asset('images/wife.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="saudaralaki" onchange="toggleInput('brotherInput')">
                                Brother&emsp;&thinsp;&thinsp;
                                <img src="{{ asset('images/BROTHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="saudaraperempuan" onchange="toggleInput('sisterInput')">
                                Sister&emsp;&emsp;&thinsp;&thinsp;
                                <img src="{{ asset('images/SISTER.png') }}">
                            </label>

                        </div>


                        <!-- form family laki nomarried -->
                        <div id="family2Form" class="hidden">
                            <b><a>Who are the remaining heir families?</a></b>
                            <p class="expln">Checklist for the biological family only</p>
                            <label>
                                <input type="checkbox" name="kakek" onchange="toggleInput('kakekInput')">
                                Grandfather&emsp;
                                <img src="{{ asset('images/GRANDFATHER.png') }}">
                            </label>
                            <label>
                                <input type="checkbox" name="nenek" onchange="toggleInput('nenekInput')">
                                Grandmother&thinsp;&thinsp;
                                <img src="{{ asset('images/GRANDMOTHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="ibu2" onchange="toggleInput('ibuInput')">
                                Mother&emsp;&emsp;&emsp;&thinsp;
                                <img src="{{ asset('images/mother.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="bapak2" onchange="toggleInput('bapakInput')">
                                Father&emsp;&emsp;&emsp;&ensp;&thinsp;
                                <img src="{{ asset('images/FATHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="saudaralaki2" onchange="toggleInput('brotherInput')">
                                Brother&emsp;&emsp;&emsp;
                                <img src="{{ asset('images/BROTHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="saudaraperempuan2" onchange="toggleInput('sisterInput')">
                                Sister&emsp;&emsp;&emsp;&emsp;
                                <img src="{{ asset('images/SISTER.png') }}">
                            </label>
                        </div>

                        <!-- Opsi input text untuk informasi anak laki -->
                        <div id="sonInput" class="hidden">
                            <br>
                            Total Son : <input type="text" name="jumlahson1">
                        </div>

                        <!-- Opsi input text untuk informasi anak perempuan -->
                        <div id="daughterInput" class="hidden">
                            <br>
                            Total daughter: <input type="text" name="jumlahdaughter1">
                        </div>

                        <!-- Opsi input text untuk informasi anak saudaralaki -->
                        <div id="brotherInput" class="hidden">
                            <br>
                            Total brother : <input type="text" name="jumlahbrother">
                        </div>

                        <!-- Opsi input text untuk informasi anak saudaraperempuan -->
                        <div id="sisterInput" class="hidden">
                            <br>
                            Total sister: <input type="text" name="jumlahsister">
                        </div>

                    </div>





                    <!-- Form untuk perempuan -->
                    <div id="perempuanForm" class="hidden">
                        <b><a>Is the heir legally married?</a></b>
                        <p class="expln">Only legal marriages are recognized by the state</p>
                        <div class="radio-group">
                            <label class="radio-button">
                                <input type="radio" name="status" value="married" onchange="showfamily2Form()">
                                <span class="radio-custom"></span>
                                Yes, the heir is married
                            </label>
                            <label class="radio-button">
                                <input type="radio" name="status" value="single" onchange="showfamily2Form()">
                                <span class="radio-custom"></span>
                                No, the heir is not married
                            </label>
                        </div>

                        <!-- form family married (perempuan)-->
                        <div id="family1fForm" class="hidden">
                            <b><a>Who are the remaining heir families?</a></b>
                            <p class="expln">Checklist for the biological family only</p>
                            <label>
                                <input type="checkbox" name="anaklaki3" onchange="toggleInput2('sonfInput')">
                                Son&emsp;&emsp;&emsp;&thinsp;
                                <img src="{{ asset('images/son.png') }}">
                            </label>
                            <label>
                                <input type="checkbox" name="anakperempuan3" onchange="toggleInput2('daughterfInput')">
                                Daughter&ensp;
                                <img src="{{ asset('images/daughter.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="ibu3" onchange="toggleInput('ibufInput')">
                                Mother&emsp;&ensp;
                                <img src="{{ asset('images/mother.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="bapak3" onchange="toggleInput('bapakfInput')">
                                Father&emsp;&ensp;&ensp;
                                <img src="{{ asset('images/FATHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="suami" onchange="toggleInput('suamifInput')">
                                Husband&ensp;&thinsp;&thinsp;
                                <img src="{{ asset('images/HUSBAND.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="saudaralaki3" onchange="toggleInput2('brotherfInput')">
                                Brother&emsp;&thinsp;&thinsp;
                                <img src="{{ asset('images/BROTHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="saudaraperempuan3" onchange="toggleInput2('sisterfInput')">
                                Sister&emsp;&emsp;&thinsp;&thinsp;
                                <img src="{{ asset('images/SISTER.png') }}">
                            </label>

                        </div>

                        <!-- form family nmarried (perempuan)-->
                        <div id="family2fForm" class="hidden">
                            <b><a>Who are the remaining heir families?</a></b>
                            <p class="expln">Checklist for the biological family only</p>
                            <label>
                                <input type="checkbox" name="kakek" onchange="toggleInput('kakekfInput')">
                                Grandfather&emsp;
                                <img src="{{ asset('images/GRANDFATHER.png') }}">
                            </label>
                            <label>
                                <input type="checkbox" name="nenek" onchange="toggleInput('nenekfInput')">
                                Grandmother&thinsp;&thinsp;
                                <img src="{{ asset('images/GRANDMOTHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="ibu4" onchange="toggleInput('ibufInput')">
                                Mother&emsp;&emsp;&emsp;&thinsp;
                                <img src="{{ asset('images/mother.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="bapak4" onchange="toggleInput('bapakfInput')">
                                Father&emsp;&emsp;&emsp;&ensp;&thinsp;
                                <img src="{{ asset('images/FATHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="saudaralaki4" onchange="toggleInput2('brotherfInput')">
                                Brother&emsp;&emsp;&emsp;
                                <img src="{{ asset('images/BROTHER.png') }}">
                            </label>

                            <label>
                                <input type="checkbox" name="saudaraperempuan4" onchange="toggleInput2('sisterfInput')">
                                Sister&emsp;&emsp;&emsp;&emsp;
                                <img src="{{ asset('images/SISTER.png') }}">
                            </label>
                        </div>

                        <!-- Opsi input text untuk informasi anak laki -->
                        <div id="sonfInput" class="hidden">
                            <br>
                            Total Son : <input type="text" name="jumlahson">
                        </div>

                        <!-- Opsi input text untuk informasi anak perempuan -->
                        <div id="daughterfInput" class="hidden">
                            <br>
                            Total daughter: <input type="text" name="jumlahdaughter">
                        </div>

                        <!-- Opsi input text untuk informasi anak saudaralaki -->
                        <div id="brotherfInput" class="hidden">
                            <br>
                            Total brother : <input type="text" name="jumlahbrother">
                        </div>

                        <!-- Opsi input text untuk informasi anak saudaraperempuan -->
                        <div id="sisterfInput" class="hidden">
                            <br>
                            Total sister: <input type="text" name="jumlahsister">
                        </div>

                    </div>

                    <!--<button type="button" onclick="submitGenderForm()">Submit</button>-->
                </div>

            </div>

            <br>

            <button button type="button" class="btn btn-primary" id="calculateButton" onclick="showAdditionalForm()"
                disabled style="width: 65%; margin-right: 15px;">Continue</button></a>
            <button type="reset" class="btn btn-danger" style="width: 30%;">Clear Form</button>




            <div id="additionalForm" class="hidden">
                <br>
                <br>
                <div class="form-group">
                    <div class="form-check">
                        <b><a>The type of business left by the heir</a></b>
                        <p class="expln">write down the type of running business that exists</p>
                        <input type="text" id="type" name="type">
                    </div>
                </div>
                <br>


                <div class="form-group">
                    <div class="form-check">
                        <b><a>Want to calculate for what month's income</a></b>
                        <p class="expln">Select the month that matches your current month</p>
                        <select id="bulan" name="bulan">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="Juny">Juny</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>

                    </div>
                </div>


                <br>



                <div class="form-group">
                    <div class="form-check">
                        <b><a>Income running business this month</a></b>
                        <p class="expln">This income will be automatically saved to your database</p>
                        <input type="text" id="harta" name="harta" placeholder="RM...">
                    </div>
                </div>

                <br>


                <button type="submit" class="btn btn-primary" style="width: 100%;">Calculate</button></a>


            </div>
        </form>
    </div>







    <script src="{{ asset('js/indextry2.js') }}"></script>

</body>

</html>