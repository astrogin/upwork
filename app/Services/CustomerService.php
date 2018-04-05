<?php

namespace App\Services;

use App\Photo;
use App\Stripe;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

/**
 * Class CustomerService
 *
 */
class CustomerService
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * CustomerService constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = 'http://159.65.107.158/api/v1/';
    }

    /**
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    public function create($email, $password)
    {
        $response = $this->client->post($this->baseUrl . 'customers', [
            'form_params' => [
                "login" => $email,
                "password" => $password
            ]
        ]);

        return $response->getBody();
    }

    /**
     * @param Request $request
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    public function createOrder(Request $request)
    {
        $transaction = Stripe::where('email', $request->get('email'))->firstOrFail();
        $newCustomer = json_decode($this->create($transaction->email, $transaction->password));
        $photo = Photo::where('email', $request->get('email'))->firstOrFail();

        $response = $this->client->post($this->baseUrl . 'customers/' . $newCustomer->id . '/orders', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode([
                'items' => [
                    [
                        'photo_id' => $photo->id,
                        'qty' => 1,
                        'format_id' => 1,
                        'addons' => []
                    ]
                ],
                'comment' => "",
                'delivery' => [
                    "country" => $transaction->stripeShippingAddressCountry,
                    "city" => $transaction->stripeShippingAddressCity,
                    "phone" => "55-66-77",
                    "zip_code" => $transaction->stripeShippingAddressZip,
                    "name" => $transaction->stripeShippingName,
                    "street" => $transaction->stripeShippingAddressLine1
                ]
            ])
        ]);
        return $response->getBody();
    }

    /**
     * @param int $customerId
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    private function createPhoto($customerId)
    {
        $newPhoto = $this->client->post($this->baseUrl . 'customers/' . $customerId . '/photo', [
            'multipart' => [
                [
                    'name' => 'customer_id',
                    'contents' => $customerId
                ],
                [
                    'name' => 'image',
                    'contents' => fopen('../storage/app/public/course.png', 'r')
                ]
            ]
        ]);

        return $newPhoto->getBody();
    }
}