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
    <link rel="stylesheet" href="styly/DJs.css">
    <title>Novinky</title>
    
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

    <div class="nadpisy">
        <strong>Nejznámější DJs kteří byli na festivalu Beats for love</strong>
    </div>

    <div class="textinfo">
        Zde můžete nahlédnout na ty neznámější DJs, kteří již vystupovali na festivalu Beats for love. Tito DJs sebou ke stagi přitáhli desítky tisíc lidí, kteří se na ně nemohli dočkat. <br> 
        Můžeme vám prozradit že tím největším jménem které se nám podařilo na festival dotáhnout byl David Guetta, který měl také největší účast. Takovou účast neměl žádný jiný DJ, a ani se ji neblížil. <br> 
        Na jeho set se přišlo podívat a poslechnout neskůtečný počet přes 50 000 lidí, což byl rekordní počet. Rekordní počet nebyl pouze na něm ale na celém festivalu, kdy festival navštívilo přes 162 000 návštěvníků.
        
    </div>

    <div class="nadpisy">
        <p><strong>David Guetta</strong></p>
    </div>

    <section class="information">
        <div class="textinfo">
            <p class="david">
                David Guetta je francouzský DJ, producent a skladatel, narozený 7. listopadu 1967 v Paříži. <br> Je považován za jednoho z největších představitelů elektronické taneční hudby (EDM), zejména v žánrech house a electro house. Jeho kariéra začala v 80. letech, kdy působil jako DJ v pařížských klubech. <br> Světového uznání se dočkal po vydání svého třetího alba "One Love" (2009), které obsahovalo hity jako "When Love Takes Over" s Kelly Rowland, "Sexy Bitch" s Akonem a "Gettin' Over You" s Chrisem Willisem a Fergiem.

Guetta je držitelem několika Grammy Awards a dalších prestižních ocenění. Je známý svými spoluprácemi s předními umělci, jako jsou Rihanna, Sia, Usher nebo Nicki Minaj. <br> Díky svému talentu pro míchání různých hudebních žánrů se stal jedním z nejvlivnějších DJů na světě a pravidelně vystupuje na významných festivalech jako Tomorrowland nebo Ultra Music Festival.
            </p>
        </div>
        <div class="imageinfo">
            <img src="images/davidguetta.jpg" alt="Obrázek">
        </div>
    </section>

    <div class="nadpisy">
        <p><strong>Tiesto</strong></p>
    </div>

    <section class="information">
        <div class="imageinfo">
            <img src="images/tiesto.jpg" alt="Obrázek">
        </div>
        <div class="textinfo">
            <p>
                Tiësto, vlastním jménem Tijs Michiel Verwest, je nizozemský DJ a producent elektronické hudby, narozený 17. ledna 1969 v Bredě. <br> Svou kariéru zahájil v 80. letech a postupně se stal jedním z nejznámějších DJů na světě. V roce 1997 založil vydavatelství Black Hole Recordings a společně s Ferry Corstenem projekt Gouryella, který výrazně ovlivnil trance scénu. Proslavil se také remixem skladby Silence od Delerium. <br>
                Tiësto vydal řadu úspěšných alb, včetně In My Memory (2001), Just Be (2004) a Elements of Life (2007). V roce 2004 jako první DJ vystoupil na zahajovacím ceremoniálu olympijských her v Aténách. Během kariéry získal mnoho ocenění, včetně třikrát po sobě titulu nejlepšího DJ podle časopisu DJ Magazine (2002–2004) a Grammy za nejlepší remix v roce 2015.
                Jeho živá vystoupení a inovativní přístup k elektronické hudbě z něj učinily legendu.
            </p>
        </div>
        
    </section>

    <div class="nadpisy">
        <p><strong>Armin Van Buuren</strong></p>
    </div>

    <section class="information">
        <div class="textinfo">
            <p>
                Armin van Buuren, narozený 25. prosince 1976 v Leidenu v Nizozemsku, je jedním z nejvýznamnějších DJů a producentů elektronické hudby, známý především pro svůj přínos k trance žánru. <br> Svou kariéru zahájil v 90. letech a od roku 2001 moderuje populární rozhlasovou show A State of Trance, kterou každý týden poslouchají miliony fanoušků po celém světě.
                Během své kariéry získal pětkrát titul nejlepšího DJ podle časopisu DJ Mag a v roce 2014 byl nominován na Grammy za skladbu This Is What It Feels Like s Trevorem Guthriem. <br> Jeho významná alba zahrnují 76 (2003), Shivers (2005), Imagine (2008) a Intense (2013). Založil také hudební vydavatelství Armada Music, které hraje klíčovou roli na poli elektronické hudby.
                Armin pravidelně vystupuje na největších festivalech, jako jsou Tomorrowland, Ultra Music Festival a další. V roce 2024 zaujal svým remixem klasiky Extreme Ways od Mobyho, který debutoval na Ultra Music Festivalu v Miami. Jeho energická živá vystoupení jsou ceněna fanoušky po celém světě.
            </p>
        </div>
        <div class="imageinfo">
            <img src="images/arminvanburen.webp" alt="Obrázek">
        </div>
    </section>

    <div class="nadpisy">
        <p><strong>Timmy Trumpet</strong></p>
    </div>

    <section class="information">
        <div class="imageinfo">
            <img src="images/timmytrumpet.jpg" alt="Obrázek">
        </div>
        <div class="textinfo">
            <p>
                Timmy Trumpet, vlastním jménem Timothy Jude Smith, je australský DJ, producent a trumpetista, známý kombinací elektronické hudby a živých trumpetových vystoupení. Původně jazzový hudebník, studoval na Sydney Conservatorium of Music a proslavil se vystoupeními na Ibize. <br>
                V roce 2014 zaznamenal obrovský úspěch se singlem Freaks, který dosáhl trojnásobné platinové desky a překonal miliardu streamů. <br> Spolupracoval s umělci jako Armin van Buuren či Dimitri Vegas & Like Mike a jeho skladby mají přes 3 miliardy streamů na Spotify.
                Pravidelně vystupuje na festivalech jako Tomorrowland a Ultra Music Festival. V roce 2020 se umístil na 10. místě žebříčku DJ Mag Top 100 DJs. Více informací najdete na jeho oficiálních stránkách.
            </p>
        </div>
        
    </section>

    <div class="nadpisy">
        <p><strong>Alan Walker</strong></p>
    </div>

    <section class="information">
        <div class="textinfo">
            <p>
                Alan Walker, narozený 24. srpna 1997 v Northamptonu ve Velké Británii, je norský DJ a producent elektronické hudby. <br> Proslavil se v roce 2015 svým megahitem Faded, který získal platinové ocenění ve 14 zemích a má miliardy zhlédnutí na YouTube.
                Walker začínal jako samouk, tvořil hudbu na svém notebooku a byl inspirován EDM producenty jako K-391 a Ahrix. Jeho styl kombinuje melancholické melodie a energické beaty, což mu přineslo globální popularitu.  V roce 2018 vydal své debutové album Different World, které obsahuje skladby jako Alone a The Spectre. <br> Jeho hudba překonala 50 miliard streamů na všech platformách.
                Pravidelně vystupuje na největších hudebních festivalech, jako jsou Tomorrowland a Coachella, a jeho vizuální styl s maskou a kapucí se stal ikonickým. V roce 2024 oznámil rozsáhlé turné po Severní Americe a Evropě.
            </p>
        </div>
        <div class="imageinfo">
            <img src="images/alanwalker.jpg" alt="Obrázek">
        </div>
    </section>

    <div class="nadpisy">
        <p><strong>James Hype</strong></p>
    </div>

    <section class="information">
        <div class="imageinfo">
            <img src="images/jameshype.jpg" alt="Obrázek">
        </div>
        <div class="textinfo">
            <p>
                James Hype, narozený 26. listopadu 1989 ve Wirralu, Merseyside, ve Velké Británii, je britský DJ, producent a autor hitů, známý pro své energické a inovativní sety, které kombinují prvky tech house, EDM a pop music. <br> Svou kariéru začal v mladém věku a postupně si vybudoval mezinárodní fanouškovskou základnu. V roce 2020 založil vlastní hudební label Stereohype, pod kterým vydává skladby od umělců jako R3WIRE, Tita Lau a Dots Per Inch.
                Mezi jeho nejznámější skladby patří Ferrari, Drums, More Than Friends a You Give Me A Feeling. <br> Hit More Than Friends se stal obrovským hitem a jeho remixy si získaly oblibu po celém světě. James Hype je také známý pro svůj charismatický přístup na pódiu a dynamické vystoupení, které si získaly velkou popularitu na festivalech jako Creamfields.
                Kromě své hudební produkce pravidelně vystupuje na významných akcích a festivalech po celém světě.
            </p>
        </div>
        
    </section>

    <div class="nadpisy">
        <p><strong>Deadmau5</strong></p>
    </div>

    <section class="information">
        <div class="textinfo">
            <p>
                Deadmau5, vlastním jménem Joel Thomas Zimmerman, je kanadský DJ, producent a skladatel elektronické hudby, známý svými inovativními produkcemi a charakteristickým vystupováním v myší masce. <br> Narodil se 5. ledna 1981 v Niagara Falls, Ontario, Kanada.
                Svou kariéru zahájil v roce 2005 a od té doby vydal několik alb a singlů, které získaly mezinárodní uznání. Mezi jeho nejznámější skladby patří "Strobe", "Ghosts 'n' Stuff" a "The Veldt". <br> Jeho hudba kombinuje prvky house, trance a dubstepu, což mu přineslo širokou fanouškovskou základnu po celém světě.
                Deadmau5 je také známý svými živými vystoupeními, kde používá pokročilou vizualizaci a světelné efekty, včetně jeho ikonické "Cube" stage designu. V roce 2021 oznámil sérii koncertů v Las Vegas s názvem "Cube V3 Residency".
            </p>
        </div>
        <div class="imageinfo">
            <img src="images/deadmaus.jpg" alt="Obrázek">
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

    <script> /*script pro fungovani hamburger menu*/
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('show');
        }
    </script>
</body>
</html>