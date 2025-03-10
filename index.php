<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $comment = $_POST['comment'];

    // Vložení uživatele do tabulky uzivatel
    $query = "INSERT INTO uzivatel (Jmeno, Prijmeni, Email, Zeme, Mesto, Ulice) 
              VALUES ('$firstName', '$lastName', '$email', '$country', '$city', '$street')";

    if ($conn->query($query) === TRUE) {
        // Získání ID nově vloženého uživatele
        $user_id = $conn->insert_id;

        // Vložení vstupenky pro uživatele
        $query_tickets = "INSERT INTO komentar (ID_uzivatel, Komentar) 
                          VALUES ('$user_id', '$comment')";

        if ($conn->query($query_tickets) === TRUE) {
            $message = "Úspěšně bylo odesláno.";
        } else {
            $message = "Chyba při ukládání vstupenek: " . $conn->error;
        }
    } else {
        $message = "Chyba při ukládání uživatele: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beats For Love</title>
    <link rel="stylesheet" href="./styly/navbar.css">
    <link rel="stylesheet" href="./styly/style.css">
    <link rel="icon" type="file/png" href="images/file.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        #showcase {
            background: #333 url("images/main1.jpg") no-repeat center center/cover;
            height: 120vh;
            color: white;
            display: flex;
            justify-content: center; /* Centrování horizontálně */
            align-items: flex-start; /* Text nahoře, ne uprostřed */
            text-align: center; /* Centrování textu */
            padding-top: 90px; /* Dáváme trochu prostoru na začátek stránky */
        }

        .showcase-content {
            max-width: 80%; /* Maximální šířka pro obsah */
        }

        .heading {
            font-size: 4rem;
            margin-bottom: 1rem;
            font-family: 'TT Neoris', sans-serif;
        }

        .btn {
            padding: 20px 70px;
            background-color: orange; /* Barva tlačítka */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }

        /* Flexbox pro text a video vedle sebe */
        .content-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 18px;
        }

        .text {
            flex: 1;
            padding-right: 20px;
            font-size: 20px;
        }

        .video-container {
            flex: 1;
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 30.25%; /* Poměr 16:9 */
            overflow: hidden;
            background: black;
        }

        .video-container iframe, .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height:100%;
            object-fit: cover;
        }

        

        /* Responzivní úpravy pro mobilní zařízení */
        @media (max-width: 768px) {
            .content-container {
                flex-direction: column;
            }

            .text {
                padding-right: 0;
                padding-bottom: 20px;
            }
        }
        
    </style>
</head>
<body>
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

    <div id="showcase">
        <div class="showcase-content">
            <h1 class="heading">BEATS FOR LOVE</h1>
            <a href="vstupenky.php" class="btn">Vstupenky</a>
            <!-- Nové tlačítko -->
            
        </div>
    </div>

    <!-- Sekce s textem a videem -->
    <div class="content-container">
        <!-- Text na levé straně -->
        <div class="text">
            <h2>Beats for love 2025</h2>
            <p>
                <br><p><strong>Připravte se na nezapomenutelný zážitek!</strong></p> <br><br>
                Beats for Love je největší festival elektronické hudby v České republice, který spojuje vášeň pro hudbu, tanec a komunitu. Tento festival je více než jen o hudbě je to o spojení lidí, o neuvěřitelné atmosféře a o nezapomenutelných chvílích. Pojďte s námi prožít víkend plný energie, barev, světel a emocí. <br> <br>
                <p><strong>Co vás čeká?</strong></p><br> <br>
                Špičkoví DJové a producenti z celého světa <br>
                Úžasné stage a scénografie, které vás uchvátí <br>
                Nejnovější trendy elektronické hudby, od house až po techno <br>
                Nezapomenutelné zážitky v atmosféře plné energie <br>
                Magická energie, která vás pohltí od první chvíle <br> <br>
                <p><strong>Vstupenky</strong></p><br> Vstupenky jsou již v prodeji! Nečekejte, rezervujte si své místo na Beats for Love 2025 a buďte součástí této obrovské hudební revoluce. <br> <br>
                <p><strong>Lokace</strong></p><br> Místo, které vás nadchne a přenese do jiného světa. Beats for Love se koná na krásné a strategické lokalitě, která zaručuje pohodlí i skvělý přístup pro všechny návštěvníky. <br> <br>
                <p><strong>Připojte se k nám!</strong></p><br> Nezáleží na tom, zda jste veterán nebo nováček, na Beats for Love je pro každého místo. Nenechte si ujít příležitost být součástí největšího hudebního svátku roku. <br> <br>
                <p><strong>Kdy?</strong></p><br> Datum festivalu je 2.-5.7.2025. Připravte se na víkend plný skvělé hudby, zábavy a spousty příležitostí k navázání nových přátelství!
            </p>
        </div>

        <div class="video-container">
            <!-- video soubor -->
            <video controls>
                <source src="images/video.mp4" type="video/mp4">
                
                
            </video>
        </div>
    </div>


        <!-- Footer sekce na konci stránky -->
    <footer>
        <div class="footer-content">
            <p><strong>Kontaktní údaje:</strong></p>
            <p>Email: <a href="mailto:kontakt@beatsforlove.cz">kontakt@beatsforlove.cz</a></p>
            <p>Telefon: +420 123 456 789</p>
            <p>Adresa: Náměstí 123, Praha, Česká republika</p>
            <p><strong>Mohlo by vás zajímat:</strong></p><br>
            <a href="ucinkujici.php">Interpreti pro rok 2025</a><br>
            <a href="vstupenky.php">Vstupenky</a><br>
            <a href="informace.php">Základní informace</a><br>
            <a href="DJs.php">Neznámější DJs na festivalu</a><br>
        </div>

        <div class="footer-form">
            <p><strong>Máte nějaký dotaz?</strong></p>
            <div class="message-container">
                <?php if (isset($message)) echo "<p class='message'>$message</p>"; ?>
            </div>
            <form action="" method="POST">
                <input class="form-input" type="text" name="firstName" placeholder="Jméno" required>
                <input class="form-input" type="text" name="lastName" placeholder="Příjmení" required>
                <input class="form-input" type="email" name="email" placeholder="Email" required>
                <input class="form-input" type="text" name="country" placeholder="Země" required>
                <input class="form-input" type="text" name="city" placeholder="Město" required>
                <input class="form-input" type="text" name="street" placeholder="Ulice" required>
                <textarea class="form-input" name="comment" placeholder="Váš dotaz" rows="4" required></textarea><br>
                <button class="form-button" type="submit">Odeslat</button>
            </form>
        </div>

        <div class="copyright">
            <p>&copy; 2024 Beats For Love. Všechna práva vyhrazena.</p>
        </div>
    </footer>

    <script>
        /*script pro fungování hamburger menu*/
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('show');
        }
    </script>

</body>
</html>


