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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styly/navbar.css">
    <link rel="stylesheet" href="./styly/style.css">
    <link rel="icon" type="file/png" href="images/file.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styly/vstupenky.css">
    <title>Vstupenky</title>
    <style>
        
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

    <div class="nadpisek">
        <h1>Vstupenky</h1>
    </div>

    <div class="ticket-container">
        <!-- Jedna vstupenka -->
        <div class="ticket">
            <a href="vstupenkydotaz.php"><img src="images/green.jpg" alt="Jednodenní vstupenka"></a>
            <div class="ticket-text">
                <h3>Standard jednodenní vstupenka 2. - 5.7.2025</h3>
                <p>Standard (1 - 4 dny)</p>
                <p>Cena: 1859 kč</p>
            </div>
            <div class="ticket-btn">
                <button class="btn"><a href="vstupenkydotaz.php" class="btn2">VSTUPENKY</a></button>
            </div>
        </div>

        <div class="ticket">
            <a href="vstupenkydotaz.php"><img src="images/grey.jpg" alt="V.I.P. jednodenní vstupenka"></a>
            <div class="ticket-text">
                <h3>V.I.P. jednodenní vstupenka 2. - 5.7.2025</h3>
                <p>V.I.P. (1 - 4 dny)</p>
                <p>Cena: 4139 kč</p>
            </div>
            <div class="ticket-btn">
                <button class="btn"><a href="vstupenkydotaz.php" class="btn2">VSTUPENKY</a></button>
            </div>
        </div>

        <div class="ticket">
            <a href="campdotaz.php"><img src="images/pink.jpg" alt="Love camp vstupenka"></a>
            <div class="ticket-text">
                <h3>Love Camp 1. - 6.7.2025</h3>
                <p>Camp (6 dnů)</p>
                <p>Cena: 3189 kč</p>
            </div>
            <div class="ticket-btn">
                <button class="btn"><a href="campdotaz.php" class="btn2">VSTUPENKY</a></button>
            </div>
        </div>

        <div class="ticket">
            <a href="campdotaz.php"><img src="images/light blue.jpg" alt="Love village vstupenka"></a>
            <div class="ticket-text">
                <h3>Love Village 1. - 6.7.2025</h3>
                <p>Village (6 dnů)</p>
                <p>Cena: 15599 kč</p>
            </div>
            <div class="ticket-btn">
                <button class="btn"><a href="campdotaz.php" class="btn2">VSTUPENKY</a></button>
            </div>
        </div>

        <div class="ticket">
            <a href="campdotaz.php"><img src="images/orange.jpg" alt="Tent village vstupenka"></a>
            <div class="ticket-text">
                <h3>Tent Village 2. - 7.7.2025</h3>
                <p>Village (6 dnů)</p>
                <p>Cena: 3989 kč</p>
            </div>
            <div class="ticket-btn">
                <button class="btn"><a href="campdotaz.php" class="btn2">VSTUPENKY</a></button>
            </div>
        </div>

        <div class="ticket">
            <a href="campdotaz.php"><img src="images/purple.jpg" alt="Karavan camp vstupenka"></a>
            <div class="ticket-text">
                <h3>Karavan Camp  1. - 6.7.2025</h3>
                <p>Camp (6 dnů)</p>
                <p>Cena: 5689 kč</p>
            </div>
            <div class="ticket-btn">
                <button class="btn"><a href="campdotaz.php" class="btn2">VSTUPENKY</a></button>
            </div>
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

    <script> /*script pro fungovani hamburger menu*/
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('show');
        }
    </script>
</body>
</html>