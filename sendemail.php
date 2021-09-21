<?php
  require 'vendor/autoload.php';
  use \Mailjet\Resources;
  class SendEmail
  {
      public static function sendMail($to,$subject,$content)
      {
            $body = [
              'Messages' => [
                [
                  'From' => [
                    'Email' => "rafahqattan5@gmail.com"
                    ],
                  'To' => [
                    [
                      'Email' => $to
                    ]
                  ],
                  'Subject' => $subject,
                  'TextPart' => $content,
                  'CustomID' => "AppGettingStartedTest"
                ]
              ]
            ];
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                    'Content-Type: application/json')
                );
                curl_setopt($ch, CURLOPT_USERPWD, "e9d998f4f2051619f4f8dc8612cb2575:3b30760391c82708f7653c72eec427f2");
                $server_output = curl_exec($ch);
                curl_close ($ch);

                $response = json_decode($server_output);
                if ($response->Messages[0]->Status == 'success') {
                    return $response;
                }
                // $response = $mj->post(Resources::$Email, ['body' => $body]);
                // $response->success() && var_dump($response->getData());
                // return $response;
            } catch (Exception $e) {
                echo 'Email Execption caught: '.$e->getMessage()."\n";
                return false;
            }
            
      }
  }

?>
