<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class TokenRequest
{
    public function __invoke()
    {
        $codeVerifier = 'NPPDdDrDgJF1hA5ITOUpV0sYwEKum2vQEVY5fzZDfoqmJjPgsHNwMBmyKv0sFaTh4fZKx4jRcteDpQfkI5r3bnCkQ7WeRRjFNWpOgtRzY7nwewvE8YuFWDrV4jHTQAQ';

dump($_GET['code']);

        $client = new Client();
        $method = 'POST';
        $uri = 'http://keycloak:8080/auth/realms/master/protocol/openid-connect/token';
        $options = [
            'client_id' => '{登録したクライアントID}',
            'client_secret' => '{登録したクライアントのクライアントシークレット}',
            'grant_type' => 'authorization_code',
            'code' => $_GET['code'],
            'redirect_uri' => 'http://localhost/tokenRequest',
            'code_verifier' => $codeVerifier,
        ];

        $response = $client->request($method, $uri, ['form_params' => $options]);
        $post = $response->getBody();

        $post = json_decode((string)$post, true);

dump($post);

    }
}
