<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>royalxtravel</title>
    <link rel="stylesheet" href="../Header/header.css">
</head>

<body>
    <header class="header">
        <div class="header--div1">
            <div class="header--div2">
                <div class="header--div3">
                    <a href="index.php" class="header__logo-link">
                        <img src="../assets/images/logo.png" alt="royalxtravel" class="header--img1">
                    </a>
                </div>

                <nav class="header--nav1">
                    <button class="hamburger" aria-label="Menu">
                        <span class="header--span1"></span>
                        <span class="header--span1"></span>
                        <span class="header--span1"></span>
                    </button>

                    <ul class="header--list1">
                        <li class="header--list1--item1"><a class="header--nav--link" href="../Home/index.php">HOME</a></li>
                        <li class="header--list1--item1"><a class="header--nav--link" href="../Packages/packages.php">PACKAGES</a></li>
                        <li class="header--list1--item1"><a class="header--nav--link" href="../About/about.php">ABOUT US</a></li>
                        <li class="header--list1--item1"><a class="header--nav--link" href="../Contact/contact.php">CONTACT US</a></li>
                        <a class="header--btn1--link" href="tel:+94773045073">
                            <button class="header--btn1" id="callbtn">CALL NOW</button>
                        </a>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <script>
        document.getElementById('callBtn').addEventListener('click', function() {
            window.location.href = 'tel:+1234567890';
        });
    </script>

    <script src="../Header/header.js"></script>
</body>

</html>