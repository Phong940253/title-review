<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ValidRecaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        // Khoi tao http client
        $client = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/'
        ]);

        // Gui du lieu cho recapcha xu li
        $response = $client->post('siteverify', [
            'query' => [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => $value,
                'remoteip' => request()->getClientIp(),
            ]
        ]);

        // Google reCaptcha tra ve ket qua
        Log::debug("message captcha", json_decode($response->getBody(), True));
        return json_decode($response->getBody())->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'xác thực ReCaptcha thất bại!';
    }
}
