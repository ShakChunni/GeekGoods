<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home service</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">

    </head>

    <body>
        <header class="head">
            <nav class="navi">
                <nav class="nav-logo">
                    <h1>Hello, <?php echo $_SESSION['name']; ?></h1>

                    <img src="images/icons/Home.png" class="box" alt="">
                    <h2 class="nav-title">Online Home Service</h2>

                </nav>
                <nav>
                    <ul>
                        <li>HOME</li>
                        <li>ALL SERVICES</li>
                        <li>BUSINESS</li>
                        <li>RATING</li>
                        <li>FAQ</li>
                        <li>ABOUT</li>
                    </ul>
                </nav>
            </nav>
            <div class="main-div">
                <div>
                    <h1 class="bantext">Need a Service?</h1>
                    <h1>Let us Call You!</h1>
                    <p class="banp">Need a professional cleaning,appliance repair,home shifting or any kind of maintenanice service today? just pick from the list and we do the rest.</p>
                </div>
                <div class="sub-div">
                    <h1 class="bantext">LET US CALL YOU</h2>
                        <p class="till">Mobile Number</p>
                        <form>
                            <input class="form-box" type="text" placeholder="your mobile number">
                        </form>
                        <p class="till">Your Name</p>
                        <form>
                            <input class="form-box" type="text" placeholder="your mobile number">
                        </form>
                        <input class="btn" type="submit" value="submit">
                </div>

            </div>
            <img src="images/home.png" class="sbox" alt="">
        </header>

        <main>
            <a href="logout.php">Logout</a>     // This is the link to logout.php, eita ke bhalo kore style kora lagbey
        </main>
        <footer>

        </footer>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>