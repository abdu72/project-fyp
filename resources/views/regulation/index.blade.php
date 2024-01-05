<!DOCTYPE html>
<html>

<head>
    <title>I-Inheritance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{ asset('css/hometry.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rule.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&family=Rubik+Doodle+Triangles&display=swap"
        rel="stylesheet">

</head>

<body>
    <header>
        <nav class="shadow">
            <img src="{{ asset('images/logo3.png') }}" alt="Logo" class="logo">


            @auth
            <ul class="menu">
                <li><a href="/"><b>Home</b></a></li>
                <li><a href="#footer"></i><b> Contact</b></a></li>
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
                <li><a href="/"><b>Home</b></a></li>
                <li><a href="#footer"></i><b> Contact</b></a></li>
            </ul>

            <a href="/login"><button type="button" class="btn-lgn">Login</button></a>
            @endauth

        </nav>

    </header>

    <div class="container1">
        <h1 class="title-rule"><b>Rule & Regulation</b></h1>
        <div class="article">
            <h2><b>Understanding Inheritance in Islam</b></h2>
            <p>Islam regulates the fair distribution of inheritance for the surviving family members, known as heirs.
                Let's explore the complete procedures and their supporting evidence.

                When parents pass away, they typically leave behind an estate that is passed down to their descendants.
                This estate, encompassing all the wealth left by the deceased, is referred to as inheritance.

                Inheritance can include movable assets such as vehicles, securities, jewelry, and savings. Additionally,
                immovable assets like land and houses are also considered part of the inheritance. Islam stipulates the
                division of inheritance in a just manner among the heirs.</p>
        </div>
        <div class="article">
            <h2><b>Supporting Evidence from Islamic Sources</b></h2>
            <p>The law governing inheritance in Islam has been described in the verse of the Al-Qur'an Surah An-Nisa
                verse 7: </p>
            <p> لِلرِّجَالِ نَصِيْبٌ مِّمَّا تَرَكَ الْوَالِدٰنِ وَالْاَقْرَبُوْنَۖ وَلِلنِّسَاۤءِ نَصِيْبٌ مِّمَّا
                تَرَكَ الْوَالِدٰنِ وَالْاَقْرَبُوْنَ مِمَّا قَلَّ مِنْهُ اَوْ كَثُرَ ۗ نَصِيْبًا مَّفْرُوْضًا</p>

            <p>"For men there is a right to a share of the inheritance of their parents and relatives, and for women
                there is a right to share (too) of the inheritance of their parents and relatives, whether a little or a
                lot according to a predetermined portion." (Q.S. An-Nisa: 7)</p>
            <p>The division of inheritance according to Islam is also discussed in more detail in the same letter in
                verse 11.</p>
            <p>يُوصِيكُمُ ٱللَّهُ فِىٓ أَوْلَٰدِكُمْ ۖ لِلذَّكَرِ مِثْلُ حَظِّ ٱلْأُنثَيَيْنِ ۚ فَإِن كُنَّ نِسَآءً
                فَوْقَ ٱثْنَتَيْنِ فَلَهُنَّ ثُلُثَا مَا تَرَكَ ۖ وَإِن كَانَتْ وَٰحِدَةً فَلَهَا ٱلنِّصْفُ ۚ
                وَلِأَبَوَيْهِ لِكُلِّ وَٰحِدٍ مِّنْهُمَا ٱلسُّدُسُ مِمَّا تَرَكَ إِن كَانَ لَهُۥ وَلَدٌ ۚ فَإِن لَّمْ
                يَكُن لَّهُۥ وَلَدٌ وَوَرِثَهُۥٓ أَبَوَاهُ فَلِأُمِّهِ ٱلثُّلُثُ ۚ فَإِن كَانَ لَهُۥٓ إِخْوَةٌ
                فَلِأُمِّهِ ٱلسُّدُسُ ۚ مِنۢ بَعْدِ وَصِيَّةٍ يُوصِى بِهَآ أَوْ دَيْنٍ ۗ ءَابَآؤُكُمْ وَأَبْنَآؤُكُمْ
                لَا تَدْرُونَ أَيُّهُمْ أَقْرَبُ لَكُمْ نَفْعًا ۚ فَرِيضَةً مِّنَ ٱللَّهِ ۗ إِنَّ ٱللَّهَ كَانَ عَلِيمًا
                حَكِيمًا</p>
            <p>"Allah prescribes (obliges) you regarding (the distribution of inheritance for) your children, (namely)
                the share of a boy is equal to the share of two daughters. 146) If the children are all girls whose
                number is more than two, their share is two third of the estate left behind. If she (daughter) is only
                one, she gets half (the property left behind). For both parents, each share is one-sixth of the assets
                left behind, if he (the deceased) has children. If he (the deceased) has no children and he is inherited
                by both parents (only), his mother gets one third. If he (the deceased) had several brothers, his mother
                got one sixth. (The inheritance is divided) after (fulfilled) the will he made or (and paid off) the
                debt. (About) your parents and your children, you do not know which of them is of more benefit to you.
                This is Allah's decree. Surely Allah is All-Knowing, All-Wise." (Q.S. An-Nisa: 11)</p>
        </div>
        <div class="article">
            <h2><b>Procedure of Inheritance Distribution</b></h2>
            <p>Based on the word of Allah in Surah An-Nisa verse 11, the distribution of inheritance according to Islam
                has determined who the heirs will be and the amount to be received. This division is irreversible and
                must be followed by all Muslims.</p>
            <br>
            <p><b>1. Half (½) part</b></p>
            <p>The heirs who get half of the inheritance in the distribution of inheritance according to Islam are one
                group of men and four women, namely husbands without children, daughters, granddaughters from sons,
                siblings, and paternal siblings.</p>
            <p><b>2. A quarter (¼) part</b></p>
            <p>In the distribution of inheritance according to Islam, the party who gets a quarter of the inheritance is
                the husband who has children or grandchildren from sons, and a wife who does not have children or
                grandchildren from sons.</p>
            <p><b>3. One-eighth (⅛) Part</b></p>
            <p>The party who gets one-eighth of the inheritance is a wife who has children or grandchildren from sons.
            </p>
            <p><b>4. Two-thirds (⅔) Parts</b></p>
            <p>The heirs who will receive two-thirds of the inheritance are four women, namely biological daughter,
                granddaughter of sons, biological sister and father's sister.</p>
            <p><b>5. One third (⅓) part</b></p>
            <p>There are two people who get inheritance according to the division of inheritance in Islam, namely
                mothers who do not have children, and also two brothers or sisters from one mother.</p>
            <p><b>6. One sixth (⅙) Part</b></p>
            <p>The heirs who get one-sixth of the inheritance are father, grandfather, mother, granddaughter, sons'
                descendants, paternal sisters, grandmothers, and one mother's brothers and sisters.</p>
        </div>
    </div>



    <!-- Konten lainnya -->

    <!-- <footer>-->
    <footer class="footer" id="footer">
        <div class="container">
            <div class="contact-info">
                <h4>Contact</h4>
                <p>IIUM, Gombak, Malaysia</p>
                <p>Email: Abdubwz92@gmail.com | Abdurrazaq@gmail.com</p>
                <p>Phone: +6017 285 2789 | +6011 2331 8700</p>
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