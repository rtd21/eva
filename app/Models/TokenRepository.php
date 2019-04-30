<?php

namespace App\Models;

use Laravel\Passport\Token;
use Laravel\Passport\TokenRepository as TR;
use Lcobucci\JWT\Parser;

class TokenRepository extends TR
{
    /**
     * Get a token by the given jwt.
     *
     * @param $jwt
     * @return \Laravel\Passport\Token|null
     */
    public static function findByJwt($jwt)
    {
        $token = (new Parser())->parse($jwt);
        $id = $token->getClaim('jti');
        return Token::find($id);
    }
}
