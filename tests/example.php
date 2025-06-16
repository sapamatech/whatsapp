<?php
require __DIR__ . '/../vendor/autoload.php';

use Sapamatech\Whatsapp\WhatsappApi;

$api = 'template';

$configs = array(
    'AccessToken' => 'EAFUbRtl6cqoBO6LKGYKNhX4vRd06pVRZAHfGbZBPhcqFNShZAwlP0kyHWaUznLwWZBeTitfe5DRvDpr1G3pK8yF1jW45IBy2wgNz09ixYueXbNVJoInDr7Q7NdHiuzxqZBSCIcSiY0eftkBESl94ABvTxenjjqSABaqS3nQ3FwlRaO4Yg114BimqIyzMbZAqjq9QZDZD',
    'PhoneNumberId' => '745573475296204',
    'Environment' => 'live',
    'Content-Type' => 'application/json',
    //'Verbose' => '',
);

$whatsappApi = new WhatsappApi($configs['PhoneNumberId'],$configs['AccessToken']);

if($api == 'text'){
// Send plain text message
$response = $whatsappApi->sendTextMessage('254722906835', 'Hello!');
print_r($response);
}

if($api == 'image'){
    $response = $whatsappApi->sendImageMessage('254722906835', 'https://sapamatech.com/sapama/images/logo.png','Testing sending an image');
    print_r($response);
}

if($api == 'document'){
    $response = $whatsappApi->sendDocumentMessage('254722906835', 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf','Testing sending a document');
    print_r($response);
}

if($api == 'audio'){
    $response = $whatsappApi->sendAudioMessage('254722906835', 'https://file-examples.com/storage/feb81a754e684c18da2d7c7/2017/11/file_example_MP3_700KB.mp3','Test sending an audio');
    print_r($response);
}

if($api == 'video'){
    $response = $whatsappApi->sendVideoMessage('254722906835', 'https://samplelib.com/lib/preview/mp4/sample-5s.mp4','Testing sending a video');
    print_r($response);
}

if($api == 'button'){
    $response = $whatsappApi->sendInteractiveButtons('254722906835', 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf','Testing sending a document');
    print_r($response);
}

if($api == 'sticker'){
    $response = $whatsappApi->sendStickerMessage('254722906835', 'https://sapamaerp.com/img/whatsapp/sticker.webp','Testing sending a sticker');
    print_r($response);
}

if($api == 'interactive'){
    $response = $whatsappApi->sendInteractiveButtons('254722906835', 
    'Header Text', 
    'Body Text', 
    'Footer Text', 
    $buttons = [
        array(
            "id" => "btn_1",
            "title" => "Yes"
        ),
        array(
            "id" => "btn_2",
            "title" => "No"
        ),
        array(
            "id" => "btn_3",
            "title" => "Maybe"
        ),
        
    ]);

    print_r($response);
}


if($api == 'template'){
    $components = array(
        array(
            "type" => "body",
            "parameters" => array(
                array("type" => "text","parameter_name"=>"name", "text" => "John Doe"),
                array("type" => "text","parameter_name"=>"number", "text" => "INV-1"),
                array("type" => "text","parameter_name"=>"description", "text" => "Software Subscription"),
                array("type" => "text","parameter_name"=>"currency", "text" => "KES"),
                array("type" => "text","parameter_name"=>"balance", "text" => "3,000"),
                array("type" => "text","parameter_name"=>"account_number", "text" => "INV-1"),

                )
        )
    );

// Send template message
$response = $whatsappApi->sendTemplateMessage('254722906835', 'invoice','en',$components);
print_r($response);
}