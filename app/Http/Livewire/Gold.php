<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Gold extends Component
{
    public function getPrice($lang)
    {

        $endpoint = config('web.goldAPIendPoint');
        $headers = [
            'Content-Type' => 'application/json',
            'x-access-token' => config('web.goldAPI')
        ];
//        $client = new \GuzzleHttp\Client(['headers' => $headers]);
//        $id = 5;
//        $value = "ABC";
//
//        $response = $client->request('GET', $endpoint.'/XAU/USD'
////            ['query' => [
////            'key1' => $id,
////            'key2' => $value,
////        ]]
//        );
//
//// url will be: http://my.domain.com/test.php?key1=5&key2=ABC;
//
//        $statusCode = $response->getStatusCode();
//        $content = $response->getBody();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint.'/XAU/USD');
// SSL important
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = curl_exec($ch);
        curl_close($ch);
        $data=json_decode($output);
        $data['price']=1808;




       // $this - > response['response'] = json_decode($output);

// or when your server returns json
// $content = json_decode($response->getBody(), true);
        return $data['price']/24;
    }
}
