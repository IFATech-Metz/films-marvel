<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Films Marvel</title>
    <style>
        td {
            vertical-align: middle !important;
        }
        .img {
            text-align: center;
            width: 175px;    
        }
        .img img {
            height: 200px;
            width: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="create.php">Ajouter un film</a>
        <br/><br/>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date d'ajout</th>
                    <th>Titre</th>
                    <th>Année de sortie</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $opendir = opendir('./films');

        while ($entry = readdir($opendir)) {
            if ($entry !== '.' && $entry !== '..') {

                $fileContent = file_get_contents("./films/" . $entry);
                $separator = '<#-#>';
                $array = explode("\r", $fileContent);

                echo '<tr>';
                foreach ($array as $lineContent) {
                    $line = explode($separator, $lineContent);
                    if(filter_var($line[1], FILTER_VALIDATE_URL)) {
                        echo '<td class="img"><img src="' . $line[1] . '"></td>';
                    } else {
                        echo '<td>' . $line[1] . '</td>';
                    }
                }
                echo '</tr>';
            }
        }
        ?>
            </tbody>
        </table>
    </div>
</body>
</html>
