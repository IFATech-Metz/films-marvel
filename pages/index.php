<div class="container">
    <table class="table table-bordered table-marvel">
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
    $opendir = opendir($_SERVER['DOCUMENT_ROOT'] . '/resources/movies');

    while ($entry = readdir($opendir)) {
        if ($entry !== '.' && $entry !== '..') {

            $fileContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/resources/movies/' . $entry);
            $separator = '<#-#>';
            $array = explode("\r", $fileContent);

            echo '<tr>';
            foreach ($array as $lineContent) {
                $line = explode($separator, $lineContent);
                if(filter_var($line[1], FILTER_VALIDATE_URL)) {
                    echo '<td class="img"><a href="description.php?film='. $entry .'"><img src="' . $line[1] . '"></a></td>';
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