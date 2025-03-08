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
    <link rel="stylesheet" href="./styly/ucinkujicistyle.css">
    <link rel="icon" type="file/png" href="images/file.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Interpreti</title>
    <style>
        .nadpisek{
            padding-top: 100px;
            text-align: center;
            font-size: 25px;
            
        }

        .podnadpis{
            padding-top: 30px;
            text-align: center;
            padding-left: 100px;
            padding-right: 100px;
            font-size: 18px;
        }

        .more-inter{
            text-align: center;
            padding-bottom: 50px;
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

    <script> /*script pro fungovani hamburger menu*/
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('show');
        }
    </script>
    <div class="nadpisek">
        <h1>Oznámení interpreti</h1>
    </div>

    <div class="podnadpis">
        <p>Beats for Love 2025 přivítá špičkové DJs a umělce ze všech koutů světa! Tento festival, který je jedním z největších elektronických hudebních událostí ve střední Evropě, nabídne pestrou škálu vystupujících v různých žánrech. <br> Od energického EDM, přes hypnotické techno, až po neuvěřitelný drum and bass, připravte se na zážitek, který vás vtáhne do rytmů světové elektronické scény.
            <br> Seznam umělců, kteří se představí na pódiích festivalu, bude zahrnovat známá jména i nové talenty, kteří vás zaručeně dostanou do varu. Přijďte a zažijte nezapomenutelné hudební vystoupení, které bude plné energie, kreativity a vizuálních efektů!</p>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="images/johnnewman.webp" alt="John Newman">
            <h1 class="jmena">John Newman</h1>
            <p class="description">je britský zpěvák a skladatel. Proslavil se hity jako „Love Me Again“ a „Come and Get It“. Je známý silným hlasem a mísením popu, soulu a elektronické hudby. Jeho debutové album „Tribute“ (2013) mělo velký úspěch a spolupracoval i s Calvinem Harrisem na skladbě „Blame“.</p>
        </div>
    </div>
    
    <div class="box">
        <div class="image-box">
            <img src="images/andromedik.jpg" alt="Andromedik">
            <h1>Andromedik</h1>
            <p class="description">je britský DJ a producent, specializující se na drum and bass. Je známý pro svou temnou a energickou hudbu, kterou mixuje s tvrdými basovými linkami a atmosférickými prvky. Jeho skladby jsou populární na drum and bass scéně a získaly si velikou oblibu.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="images/flowdan.jpg" alt="Flowdan">
            <h1>Flowdan</h1>
            <p class="description">je britský MC a rapper, známý svou silnou a agresivní flow v grime scéně. Spolupracoval s významnými jmény, jako je Wiley a Skepta, a je členem kolektivu SpentShell. Jeho texty často reflektují těžké životní podmínky a sociální problémy.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="images/kream.jpg" alt="Kream">
            <h1>KREAM</h1>
            <p class="description">je britské DJ a producentské duo, známé svými energickými house a tech-house tracky. Jejich hudba často kombinuje temné basové linie a chytlavé melodie, což je činí oblíbenými v klubech i na festivalech. Duo se proslavilo díky hitům jako „Decade“ a „Love You More“.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="images/phara.jpg" alt="Phara">
            <h1>Phara</h1>
            <p class="description">je český DJ a producent, který kombinuje elektroniku s prvky bass. Vyznačuje se temnými, energetickými beaty a kreativním přístupem k produkci. V průběhu své kariéry se proslavil na tuzemské scéně a je oblíbenější na festivalech i v klubech.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="images/timmytrumpet.jpg" alt="Timmy Trumpet">
            <h1>Timmy Trumpet</h1>
            <p class="description">je australský DJ, producent, který se proslavil svou unikátní kombinací elektronické taneční hudby a živé hry na trubku. Vytvořil několik hitů ve spoustě žánrech. Je známý svými energickými vystoupeními a pravidelně vystupuje na významných festivalech po celém světě.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="images/subfocus.avif" alt="Sub Focus">
            <h1>Sub Focus</h1>
            <p class="description">vlastním jménem Nick Douwma, je britský DJ a producent, známý pro kombinaci drum and bass, dubstepu a house. Debutoval v roce 2009 a od té doby se proslavoval jako přední postava na elektronické scéně. Je známý pro energická vystoupení a silné basové linie ve své hudbě.</p>
        </div>
    </div>
    
    <div class="box">
        <div class="image-box">
            <img src="images/catchingcairo.jpeg" alt="Catching Cairo">
            <h1>Catching Cairo</h1>
            <p class="description">je elektronický projekt, který spojuje prvky house a deep house. Tento projekt je známý pro melodické zvuky a emotivní atmosféru, která oslovuje širokou posluchačskou základnu. Zaměřuje se na vytvoření unikátního zážitku prostřednictvím sofistikovaných rytmů.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/amcakoven.webp" alt="A.M.C & Koven">
            <h1>A.M.C & Koven</h1>
            <p class="description">A.M.C je britský DJ a producent, známý svými energickými a temnými drum and bass tracky. Koven, britské duo tvořené producentem Maxem a zpěvačkou Kattie, kombinuje emocionální prvky s drum and bass. Oba umělci jsou oblíbení pro svůj dynamický zvuk a pravidelně vystupují na významných akcích.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/apashe.jpg" alt="Apashe">
            <h1>Apashe</h1>
            <p class="description">je vlastním jménem John De Buck, belgický producent elektronické hudby a DJ, který žije v Kanadě. Je známý tím, že kombinuje elektronickou hudbu s orchestrálními prvky. Jeho tvorba často zní epicky a dramaticky, což ho odlišuje od ostatních producentů.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/armin.jpeg" alt="Armin Van Buuren">
            <h1>Armin V. Buuren</h1>
            <p class="description">je nizozemský DJ a producent, legenda trance hudby. Pětkrát byl vyhlášen nejlepším DJ světa. Proslavil se hity jako This Is What It Feels Like a pořádá slavnou radioshow A State of Trance.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/bruc.webp" alt="Bru-C">
            <h1>Bru-C</h1>
            <p class="description">je britský rapper a zpěvák, který míchá drum and bass, grime a UK bass. Jeho track You & I se stal hitem a pomohl popularizovat mainstreamový DnB ve Velké Británii. Spolupracuje s producenty jako Kanine nebo Bou a je známý energickými vystoupeními.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/killerhertz.jpeg" alt="Killer Hertz">
            <h1>Killer Hertz</h1>
            <p class="description">jsou britské drum and bass duo s dynamickým a temným zvukem. Produkují tvrdé i melodické tracky a spolupracovali s předními jmény žánru. Jejich hudba kombinuje moderní neurofunk s klasickými DnB prvky.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/wilkinson.jpg" alt="Wilkinson">
            <h1>Wilkinson</h1>
            <p class="description">je britský drum and bass producent a DJ, který prorazil megahitem Afterglow. Jeho hudba spojuje silné vokály, melodické prvky a energické dropy. Vydal úspěšná alba jako Lazers Not Included a Cognition. Často vystupuje na festivalech jako Creamfields nebo Tomorrowland.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/zerb.jpg" alt="Zerb">
            <h1>Zerb</h1>
            <p class="description">je brazilský producent deep house a melodic house hudby. Jeho tvorba má uvolněnou a tropickou atmosféru, čímž se odlišuje od mainstreamové elektroniky. Proslavil se remixy a originálními skladbami, které bodují na streamovacích platformách.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/blacksempire.jpg" alt="Black Sun Empire">
            <h1>Black S. Empire</h1>
            <p class="description">jsou nizozemské trio producentů, kteří patří mezi průkopníky darkstep drum and bassu. Jejich hudba má temnou a futuristickou atmosféru, často s prvky neurofunku. Vydali řadu ikonických alb a patří mezi nejrespektovanější jména tvrdšího DnB.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/camokrooked.jpg" alt="Camo & Krooked">
            <h1>Camo & Krooked</h1>
            <p class="description">jsou rakouské drum and bass duo, které je známé pro inovativní produkci. Míchají různé styly od liquidu po neurofunk a jejich tracky jsou melodické i taneční. Vydali úspěšná alba jako Zeitgeist a Mosaik a pravidelně vystupují na největších festivalech.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/charlitee.jpg" alt="Charli Tee">
            <h1>Charli Tee</h1>
            <p class="description">je britská DJka a moderátorka, která hraje významnou roli v drum and bass scéně. Pravidelně vystupuje na akcích po celé Evropě a moderuje DnB pořady na Kiss FM. Její sety kombinují klasické i moderní DnB tracky.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/metrik.jpg" alt="Metrik">
            <h1>Metrik</h1>
            <p class="description">je britský producent a DJ drum and bassu, který je podepsaný pod Hospital Records. Jeho hudba je melodická, energická a často inspirovaná sci-fi estetikou. Vydal alba jako Ex Machina a Universal Language, která obsahují festivalové hymny.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/qzb.jpg" alt="QZB">
            <h1>QZB</h1>
            <p class="description">jsou švýcarské drum and bass duo, které se specializuje na deep, techy a minimalistický zvuk. Jsou známí svou precizní produkcí a vydávají na labelech jako Critical Music. Jejich tracky často obsahují temné atmosféry a futuristické prvky.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/cassimm.jpeg" alt="Cassimm">
            <h1>Cassimm</h1>
            <p class="description">je italský house producent žijící v Londýně. Jeho zvuk kombinuje deep, tech a soulful house. Prorazil díky trackům jako Thats Right a často vydává na labelech jako Defected a Toolroom. </p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/flashmob.webp" alt="Flashmob">
            <h1>Flashmob</h1>
            <p class="description">je italský DJ a producent, který se pohybuje mezi tech housem a deep housem. Jeho hudba vyšla na labelech jako Hot Creations nebo Snatch! Records a jeho tracky jsou oblíbené v undergroundové scéně.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/genefaris.jpg" alt="Gene Farris">
            <h1>Gene Farris</h1>
            <p class="description">je chicagský DJ a producent, který je jedním z průkopníků house music. Jeho styl kombinuje klasický Chicago house s moderními tech house prvky. Spolupracoval s umělci jako Green Velvet a vydává na Farris Wheel Recordings.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/martin ikin.jpeg" alt="Martin Ikin">
            <h1>Martin Ikin</h1>
            <p class="description">je britský house a tech house producent s více než 20 lety zkušeností. Jeho tracky jsou plné groovu a energických beatů. Spolupracoval s Toolroom Records a Defected a jeho sety jsou plné taneční energie.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/alpha9.jpg" alt="Alpha 9">
            <h1>Alpha 9</h1>
            <p class="description">alias ruský producent a DJ Arty. Alpha 9 představuje jeho emotivnější a atmosféričtější stránku hudby, která čerpá z klasického Anjunabeats zvuku. Mezi jeho nejznámější skladby patří Before The Dawn, Skin a Only Good Mistake.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/alpha9.jpg" alt="Arty">
            <h1>Arty</h1>
            <p class="description">alias ruský producent a DJ Alpha 9. Je známý pro svou progresivní house a trance produkci. Jeho styl spojuje melodické prvky s moderním tanečním zvukem, což mu přineslo popularitu na scéně EDM. Jeho skladby jako Sunrise nebo Redline patří mezi fanouškovské favority.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/bennicky.jpg" alt="Ben Nicky">
            <h1>Ben Nicky</h1>
            <p class="description">je britský DJ a producent, který míchá trance, psytrance, hard dance a EDM. Jeho sety jsou extrémně energické a často obsahují tvrdší remixy známých skladeb. Proslavil se svými „Headf**k“ remixy, které kombinují různé žánry a rychlosti v jednom tracku.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/kaaze.webp" alt="Kaaze">
            <h1>Kaaze</h1>
            <p class="description">je švédský producent big room house hudby, který se proslavil díky spolupráci s Hardwellem a vydává na jeho labelu Revealed Recordings. Jeho hudba spojuje epické melodie s festivalovými dropy. Kaaze se často inspiruje rockovou hudbou, což mu dává unikátní zvuk.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/maxstyler.jpg" alt="Max Styler">
            <h1>Max Styler</h1>
            <p class="description">je americký producent, který míchá future house, bass house a melodic dance. Jeho tracky vychází na labelech jako Dim Mak, Spinnin Records nebo Ultra Music. Jeho hudba má moderní zvuk s důrazem na silné melodie a taneční groove.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/orjan nilsen.jpg" alt="Orjan Nilsen">
            <h1>Orjan Nilsen</h1>
            <p class="description">je norský trance producent známý svou energickou a melodickou produkcí. Je dlouholetým členem Armada Music. Orjan je známý svou schopností kombinovat klasický trance s moderními prvky a jeho sety jsou nabité pozitivní energií.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/tinlicker.webp" alt="Tinlicker">
            <h1>Tinlicker</h1>
            <p class="description">jsou nizozemské duo, které produkuje progresivní house a melodický techno. Jejich hudba vychází na Anjunadeep a jejich emotivní a atmosférické tracky si získaly širokou fanouškovskou základnu.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/benklock.jpg" alt="Ben Klock">
            <h1>Ben Klock</h1>
            <p class="description">je berlínský techno DJ a producent, který je rezidentem legendárního klubu Berghain. Jeho hudba je temná, hypnotická a industriální, což mu přineslo status jedné z největších postav současné techno scény. Ben Klock je známý svou precizní technikou mixování a schopností budovat atmosféru.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/chrisliebing.webp" alt="Chris Liebing">
            <h1>Chris Liebing</h1>
            <p class="description">je německý techno producent a DJ, zakladatel CLR Records. Jeho styl kombinuje industriální techno s deep a hypnotickými prvky. V minulosti experimentoval s různými žánry, ale jeho tvrdé a minimalistické techno ho dostalo na vrchol. Jeho sety jsou temné a plné deep bassu.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/djrush.webp" alt="DJ Rush">
            <h1>DJ Rush</h1>
            <p class="description">je americký techno DJ a producent, známý svou energickou a funky hard techno produkcí. Jeho sety jsou plné rychlých beatů a groovu, což ho odlišuje od typického evropského temného techna. Jeho hudba vychází na labelech jako Kne’Deep a je populární zejména ve střední Evropě.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/richiehawtin.webp" alt="Richie Hawtin">
            <h1>Richie Hawtin</h1>
            <p class="description">je kanadský DJ, producent a zakladatel labelu Minus, jeho produkce je inovativní, futuristická a často experimentální. Jeho sety jsou známé svou precizností a technickou dokonalostí, což ho činí jedním z nejuznávanějších jmen na techno scéně.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/brennanheart.jpg" alt="Brennan Heart">
            <h1>Brennan Heart</h1>
            <p class="description">je holandský hardstyle DJ a producent, který patří mezi největší jména žánru. Hity jako Imaginary, Lose My Mind nebo Fight The Resistance jsou festivalové hymny. Jeho hudba kombinuje melodické prvky s tvrdými basovými linkami a emocionálním nábojem.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/holypriest.webp" alt="Holy Priest">
            <h1>Holy Priest</h1>
            <p class="description">je méně známý, ale talentovaný německý producent, který experimentuje s elektronikou a tvrdšími styly. Jeho tvorba kombinuje dark techno a industrial zvuky, často se zaměřuje na temnější atmosféry a hluboké bassové linky.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/rebelion.jpg" alt="Rebelion">
            <h1>Rebelion</h1>
            <p class="description">jsou skotské hardstyle a rawstyle duo, známé svým tvrdým a agresivním zvukem. Jejich tracky jako Basstrap a Empire jsou plné silných kicků a temných melodií. Rebelion se stali jedním z nejžádanějších jmen na hard dance scéně a jejich živá vystoupení jsou nezapomenutelná.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/bennypage.webp" alt="Benny Page">
            <h1>Benny Page</h1>
            <p class="description">je britský drum and bass producent, který míchá reggae a jungle prvky do DnB. Jeho tracky mají oldschool vibe a pozitivní energii. Jeho hudba vychází na labelech jako Dub Shotta a často spolupracuje s vokalisty z reggae scény.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/eksman.jpg" alt="Eksman">
            <h1>Eksman</h1>
            <p class="description">je britský MC, známý pro svůj rychlý flow a energické vystoupení na drum and bass akcích. Vystupoval s legendami jako Andy C nebo Shy FX a jeho hlas je nezaměnitelný na velkých festivalech. Jeho schopnost improvizace a komunikace s publikem mu získala širokou popularitu.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/fernandapistelli.jpg" alt="Fernanda Pistelli">
            <h1>Fernanda Pistelli</h1>
            <p class="description">je brazilská DJka a producentka, která se specializuje na techno a hard techno. Její sety jsou plné temných basových linek a hypnotických rytmů, což ji činí oblíbenou v Jižní Americe. Pistelli je známá svou precizní technikou mixování a energickými vystoupeními.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/cultureshock.jpg" alt="Culture Shock">
            <h1>Culture Shock</h1>
            <p class="description">je britský drum and bass producent, který je známý pro svůj inovativní přístup k žánru. Jeho hudba kombinuje moderní a klasické dnb prvky s výraznými basovými linkami a energickými dropy. Je ceněn pro svou schopnost experimentovat se zvuky a vytvářet skladby.</p>
        </div>
    </div>

    <div class="box">
        <div class="image-box">
            <img src="imagesdjs/rivastarr.webp" alt="Riva Starr">
            <h1>Riva Starr</h1>
            <p class="description">je italský DJ a producent, který se proslavil díky své fúzi house, tech house a funkových prvků. Jeho produkce jsou plné chytlavých rytmů a basových linek, které vytvářejí nezaměnitelný groove. Jeho tracky jsou pravidelně hrány na globálních tanečních festivalech.</p>
        </div>
    </div>

    <div class="more-inter">
        <h1>Více interpretů již brzy</h1>
    </div>

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
