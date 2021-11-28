<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class GetAuthorizationCode extends Controller
{
    public function __invoke(): void
    {
        // 実際にはベタがきしない
//        $codeVerifier = Str::random(128);
        $codeVerifier = 'NPPDdDrDgJF1hA5ITOUpV0sYwEKum2vQEVY5fzZDfoqmJjPgsHNwMBmyKv0sFaTh4fZKx4jRcteDpQfkI5r3bnCkQ7WeRRjFNWpOgtRzY7nwewvE8YuFWDrV4jHTQAQ';

        $encoded = base64_encode(hash('sha256', $codeVerifier, true));
        $codeChallenge = strtr(rtrim($encoded, '='), '+/', '-_');

        header(
            'Location: http://localhost:8082/auth/realms/master/protocol/openid-connect/auth?' .
            'response_type=code&' .
            'client_id={登録したクライアントID}&' .
            'redirect_uri=' . urlencode('http://localhost/tokenRequest') . '&' .
            'code_challenge=' . $codeChallenge . '&' .
            'code_challenge_method=S256&' .
            'scope=openid'
        );
    }
}
