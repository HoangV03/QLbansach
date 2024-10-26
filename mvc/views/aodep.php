<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../public/css/base.css"> -->
    <link rel="stylesheet" href="/php-mvc-master/public/css/base.css">
    <link rel="stylesheet" href="/php-mvc-master/public/css/style1.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/php-mvc-master/public/font/fontawesome-free-6.6.0-web/css/all.min.css">
    <title>Document</title>

</head>

<body>
    <div id="wapper-ms1">
        <div class="header">
            
            <?php require_once "./mvc/views/pages/" . $data["page1"] . ".php" ;?>
        </div>
        <div class="body__container" style="min-height: 400px;">
        <?php include_once "./mvc/views/pages/" . $data["page2"] . ".php"; ?> 
        </div>                
        <div class="footer">   
            <?php require_once "./mvc/views/pages/" . $data["page3"] . ".php";?>
        </div>
    </div>

</body>

</html>