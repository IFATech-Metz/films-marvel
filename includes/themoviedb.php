<?php

$config = [
    "api_key" => "22972907f1af5f1bea5407c86e476d65",
    "movie_poster" => "http://image.tmdb.org/t/p/",
    "search" => [
        "api_url" => "https://api.themoviedb.org/3/search/movie",
    ],
    "movie" => [
        "api_url" => "https://api.themoviedb.org/3/movie",
    ]
];

function getMovieData($movieName, $movieDate) {

    $parameters = [
        "api_key" => $config["api_key"],
        "query" => $movieName,
        "language" => "fr-FR",
        "primary_release_year" => $movieDate,
        "include_adult" => "true"
    ];

    $build_parameters = http_build_query($parameters);
    $build_url = $config['search']['api_url'] . '?' . $build_parameters;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $build_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);      

    $results = json_decode($output);
    $movieID = $results->results[0]->id;
    $movieURL = $config['movie']['api_url'].'/'.$movieID. '?language=fr_FR&api_key=' . $config['api_key'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $movieURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    $movieData = json_decode($output, JSON_PRETTY_PRINT);

    return $movieData;
}
?>