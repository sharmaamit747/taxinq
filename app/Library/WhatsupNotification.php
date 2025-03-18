<?php

namespace IOTtechEdu\Library;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use IOTtechEdu\User;
use IOTtechEdu\Traits\WhatsupTrait;

class WhatsupNotification {

    use WhatsupTrait;

    public $error;

    /**
     * @method Order Placed 
     * @param 
     * @return response
     */
    public function orderPlaced($name, $phone) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.interakt.ai/v1/public/message/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                                    "countryCode": "+91",
                                    "phoneNumber": ' . $phone . ',
                                    "callbackData": "callback data",
                                    "type": "Template",
                                    "template": {
                                        "name": "ranktopebook",
                                        "languageCode": "en",
                                        "headerValues": [
                                                         "' . $name . '"
                                        ]
                                    }
                                }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ' . $this->secret_key,
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        #decode the coming response
        $responseData = json_decode($response);
        curl_close($curl);
        return $response;
    }

}

?>