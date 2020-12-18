<html lang="pl">

<head>
    <title>Notatnik</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link href="/public/css/index.css" rel="stylesheet">
    <script src="/public/js/form-validator.js"></script>
</head>

<body class="body">
    <div class="app">
        <?php require_once("components/header.php"); ?>
        <main>
            <aside>
                <?php require_once("components/menu.php"); ?>
            </aside>



            <section class="page">
                <?php require_once("pages/$page.php"); ?>

            </section>
        </main>

        <footer class="footer">
            <?php require_once("components/footer.php"); ?>

        </footer>
    </div>



</body>

</html>