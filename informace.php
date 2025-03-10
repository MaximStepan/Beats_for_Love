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
    <link rel="stylesheet" href="./styly/info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Informace</title>
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

    <script> /*script pro fungovani hamburger menu*/
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('show');
        }
    </script>

    <section class="information">
        <div class="textinfo">
            <h2 class="prvni">Základní informace</h2><br>
            <p>
                <p class="fest-info"><strong>Co je Beats for Love?</strong></p> <br>
                Beats for Love je jeden z největších a nejvýznamnějších festivalů elektronické hudby v České republice. Festival spojuje fanoušky různých žánrů elektronické hudby, včetně EDM, dubstepu, house, trance, drum'n'bass a mnoha dalších. Každoročně přitahuje tisíce návštěvníků z celého světa a nabízí nezapomenutelný zážitek v atmosféře plné hudby, tance a vizuálních efektů. Hlavním představitelem tohoto festivalu je Kamil Rudolf<br><br>
                <p class="fest-info"><strong>Mise festivalu</strong></p> <br>
                Beats for Love je oslavou elektronické hudby a kultury, která propojuje lidi všech věkových kategorií a národností. Cílem festivalu je nabídnout návštěvníkům nejen skvělé hudební zážitky, ale i podporu kreativity, umění a vzájemného sdílení hudební vášnivosti. <br><br>
                <p class="fest-info"><strong>Datum a místo konání</strong></p> <br>
                Beats for Love se koná každoročně v Ostravě v Dolních Vítkovicích. Festival probíhá po dobu 4 dnů od 2.7.2025 do 5.7.2025. <br><br>
                <p class="fest-info"><strong>Doprava</strong></p> <br>
                Festival se nachází v Dolních Vítkovicích, která je snadno dostupná autem, vlakem a autobusem. Více informací o dopravních možnostech naleznete na našich stránkách v sekci "Doprava".
            </p>
        </div>
        <div class="imageinfo">
            <img src="images/stageb.webp" alt="Obrázek">
        </div>
    </section>

    <section class="information">
        <div class="textinfo">
            <h2 class="prvni">Lokace Festivalu</h2><br>
            <p>
                Festival Beats for Love se koná v České republice, konkrétně v Ostravě, v Dolních Vítkovicích. Tento festival, který je jedním z největších elektronických hudebních festivalů ve střední Evropě, se koná každoročně na přelomu června a července. Místo je typické svou industriální atmosférou, což dodává festivalu unikátní charakter. <br><br>
                Dolní Vítkovice se nachází v blízkosti městské části Karolina a je obklopena industriálním prostředím, což zajišťuje jedinečnou atmosféru pro návštěvníky. Areál festivalu je rozsáhlý a zahrnuje několik pódií, kde vystupují známí DJs a umělci zaměření na různé subžánry elektronické hudby.
                Tato lokalita je dobře dostupná jak městskou dopravou, tak i autem, a samotná Ostrava je známá svou pohostinností a skvělým zázemím pro festivalové návštěvníky.
                Pokud se chystáš na festival, čeká tě nejen skvělá hudba, ale také nezapomenutelný zážitek v industriálním prostředí Ostravy.
            </p>
        </div>
        <div class="imageinfo">
            <img src="images/mapa.webp" alt="Obrázek">
        </div>
    </section>

    <section class="information">
        <div class="textinfo">
            <h2 class="prvni">Historie</h2><br>
            <p>
                Beats for Love je elektronický hudební festival, který se poprvé konal v Ostravě v roce 2013. Od svého vzniku se rychle stal jedním z největších festivalů elektronické hudby ve střední Evropě. Festival se zaměřuje na různé žánry, jako je techno, house, drum and bass, trance a další. <br> <br>
                Počáteční ročníky byly menší, ale s rostoucí popularitou festival rychle expandoval a přitahoval tisíce návštěvníků nejen z Česka, ale i ze zahraničí. Od svého přesunu do Dolních Vítkovic v Ostravě, industriální lokalita se stala jeho symbolem.
                V průběhu let se festival stal nejen hudební akcí, ale i kulturním svátkem, který nabízí nejen hudbu, ale i vizuální umění a interaktivní zážitky. Beats for Love oslavil své 10. výročí v roce 2023 a nadále pokračuje v růstu jako významná evropská hudební událost.
            </p>
        </div>
        <div class="imageinfo">
            <img src="images/stage2017.jpg" alt="Obrázek">
        </div>
    </section>

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





    

</body>
</html>