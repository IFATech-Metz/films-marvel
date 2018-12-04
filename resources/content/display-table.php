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
        $opendir = opendir('./resources/movies');
        $movieData = [];
        while ($entry = readdir($opendir)) {
            if ($entry !== '.' && $entry !== '..') {
                $fileContent = file_get_contents('./resources/movies/' . $entry);
                $separator = '<#-#>';
                $array = explode("\r", $fileContent);
                $subTab = [];                
                foreach ($array as $lineContent) {
                    $line = explode($separator, $lineContent);
                    $subTab[$line[0]] = $line[1];
                }
                $movieData[$entry] = $subTab;
                ksort($movieData);
                
                echo '<tr class="clickable-row" data-href="description.php?film='. $entry .'">';
                foreach ($movieData[$entry] as $key => $value) {
                    if(filter_var($value, FILTER_VALIDATE_URL)) {
                        echo '<td class="img"><img src="'.$value.'"></td>';
                    } else {
                        echo '<td>'.$value.'</td>';
                    } 
                }
                echo '</tr>';
            }
        }
    ?>
    </tbody>
</table>