<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
    <div id="lewy">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div id="prawy">
        <table>
            <tr>
                <th>Kryminał</th>
                <th>Horror</th>
                <th>Przygodowy</th>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    </header>
    <section id="lista">
        <h3>Polecamy</h3>
        <?php
            $conn = mysqli_connect('localhost','root', '', 'filmoteka2');
            $query = "select id, nazwa, opis, zdjecie from produkty where id=18 or id=22 or id=23 or id=25";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="blok">'.'<h4>'.$row['id'].'.'.$row['nazwa'].'</h4>'.'<img src="'.$row['zdjecie'].'" alt="film"'.'">'.'<p>'.$row['opis'].'</p>'.'</div>';
            }
        ?>
    </section>
    <section id="filmy">
        <h3>Filmy fantastyczne</h3>
        <?php
            $conn = mysqli_connect('localhost','root', '', 'filmoteka2');
            $query = "select id, nazwa, opis, zdjecie from produkty where Rodzaje_id=12";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="blok">'.'<h4>'.$row['id'].'.'.$row['nazwa'].'</h4>'.'<img src="'.$row['zdjecie'].'" alt="film"'.'">'.'<p>'.$row['opis'].'</p>'.'</div>';
            }
        ?>
    </section>
    <footer>
    <form action="video.php" method="POST">
            Usuń film nr:<input type="number" name="wybor">
            <input type="submit" name="reset" value="Usuń film">
            <?php
                $wybor= $_POST["wybor"];
                $conn = mysqli_connect("localhost","root", "", "filmoteka2");
                $sql = "delete from produkty where id='$wybor'";
                $result = mysqli_query($conn, $sql);
                if($result) {
                    echo "Film usunięto!";
                }
                else{
                    echo "Filmu nie udało się usunąć!";
                }
                mysqli_close($conn);
            ?>
        <p>Stronę wykonał: <a href="mailto:ja@poczta.com?subject=tytuł listu">PESEL</a></p>
    </footer>
</body>
</html>