<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vstupenky camp</title>
    <link rel="stylesheet" href="styly/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #af6c00;
            font-family: Arial, sans-serif; /* Písmo */
        }

        /* Navigační menu */
        nav {
            background: #333; /* Tmavé pozadí pro menu */
            padding: 15px 0; /* Vnitřní mezery pro menu */
            text-align: center; /* Zarovnání textu na střed */
        }

        nav ul {
            list-style: none; /* Odstranění odrážek z menu */
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center; /* Zarovnání položek na střed */
        }

        nav li {
            margin: 0 15px; /* Odsazení mezi položkami */
        }

        nav a {
            color: white; /* Bílá barva textu */
            text-decoration: none; /* Odstranění podtržení */
            font-size: 18px; /* Velikost textu */
        }

        /* Styl pro formulář */
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 12px; /* Zaoblené rohy */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 50); /* Jemný stín */
            width: 500px; /* Šířka formuláře */
            text-align: center; /* Zarovnání textu na střed */
            margin: 50px auto; /* Automatické zarovnání na střed */
            margin-top: 80px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            color: #444;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .form-container input:focus {
            border-color: #d88a00; /* Změní barvu rámečku při zaměření při kliknutí na kolonku např. jmeno */
            outline: none;
        }

        .checkbox-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background: #d88a00;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }

        .form-container button:hover {
            background: #b77400; /* Změna barvy při najetí myší na tlačítko odeslat */
        }

        /* Hamburger menu */
        .hamburger {
            cursor: pointer;
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
        }

        .hamburger div {
            width: 30px;
            height: 4px;
            background-color: #333;
        }

        /* Pro responsivitu - mobilní zařízení */
        @media screen and (max-width: 600px) {
            /* Skrytí navigačního menu na mobilu */
            #navLinks {
                display: none;
                width: 100%;
                text-align: center;
            }

            #navLinks.show {
                display: block;
            }

            ul {
                flex-direction: column;
                align-items: flex-start;
            }

            li {
                width: 100%;
                text-align: left;
            }

            li a {
                padding: 10px 20px;
            }

            .hamburger {
                display: block;
                cursor: pointer;
                padding: 10px;
                position: absolute;
                top: 15px;
                right: 15px;
                z-index: 1100;
            }

            .hamburger div {
                background-color: white;
                height: 4px;
                width: 30px;
                margin: 6px 0;
                transition: 0.4s;
            }

            .hamburger.active div:nth-child(1) {
                transform: rotate(-45deg);
                position: relative;
                top: 10px;
            }

            .hamburger.active div:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active div:nth-child(3) {
                transform: rotate(45deg);
                position: relative;
                top: -10px;
            }
        }
    </style>
</head>
<body>

    <!-- Navigační menu -->
    <nav>
        <!-- Hamburger ikona pro mobilní zařízení -->
        <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <!-- Navigační menu -->
        <ul id="navLinks">
            <li class="logo"><a href="index.php"><img src="images/file.png" alt="Logo"></a></li>
            <li><a href="index.php"><i class="fas fa-home"></i></a></li>
            <li><a href="ucinkujici.php">Účinkující</a></li>
            <li><a href="vstupenky.php">Vstupenky</a></li>
            <li><a href="informace.php">Informace</a></li>
            <li><a href="DJs.php">Minulí DJs</a></li>
        </ul>
    </nav>

    <!-- Formulář pro registraci -->
    <div class="form-container">
        <h2>Registrace pro předběžné zaslání vstupenek do kempu Beats for Love</h2>
        <form action="#" method="post">
            <label for="firstName">Jméno:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Příjmení:</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="country">Země:</label>
            <input type="text" id="country" name="country" required>

            <label for="city">Město:</label>
            <input type="text" id="city" name="city" required>

            <label for="street">Ulice:</label>
            <input type="text" id="street" name="street" required>

            <!-- Checkboxy pro výběr dnů festivalu -->
            <div class="checkbox-group">
                <div>
                    <input type="checkbox" id="dayone" name="dayone" value="1">
                    <label for="dayone">Love camp</label>
                </div>
                <div>
                    <input type="checkbox" id="daytwo" name="daytwo" value="2">
                    <label for="daytwo">Love village</label>
                </div>
                <div>
                    <input type="checkbox" id="daythree" name="daythree" value="3">
                    <label for="daythree">Tent village</label>
                </div>
                <div>
                    <input type="checkbox" id="dayfour" name="dayfour" value="4">
                    <label for="dayfour">Karavan camp</label>
                </div>
            </div>

            <!-- Odesílací tlačítko -->
            <button type="submit">Odeslat</button>
        </form>
    </div>

    <script>
        function toggleMenu() {
            var navLinks = document.getElementById("navLinks");
            navLinks.classList.toggle("show");
        }
    </script>
    
</body>
</html>