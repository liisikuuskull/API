<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MovieController extends Controller
{
    public function index()
    {
        $apiKey = 'd458d2ab'; // Asenda see oma OMDB API võtmega

        // Saada päring OMDB API-le, et saada top 10 filmi
        $client = new Client();
        $response = $client->get('http://www.omdbapi.com/', [
            'query' => [
                'apikey' => $apiKey,
                's' => 'movie', // Võid siin ka määrata konkreetseid kategooriaid või filtreid
                'type' => 'movie',
                'r' => 'json',
                'page' => 1,
                'limit' => 10
            ]
        ]);

        // Hangi vastuse sisu
        $data = json_decode($response->getBody(), true);

        // Kuvamiseks saate kasutada näiteks blade malli
        return view('movies.index', ['movies' => $data['Search']]);
    }
}

