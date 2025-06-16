<?php

namespace Sapamatech\Whatsapp;

class WhatsappApi
{
    private $phoneNumberId;
    private $accessToken;
    private $apiUrl = "https://graph.facebook.com/v18.0/";

    public function __construct($phoneNumberId, $accessToken)
    {
        $this->phoneNumberId = $phoneNumberId;
        $this->accessToken = $accessToken;
    }

    private function sendRequest($endpoint, $data)
    {
        $url = $this->apiUrl . $this->phoneNumberId . $endpoint;

        $headers = [
            "Authorization: Bearer " . $this->accessToken,
            "Content-Type: application/json"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $err = curl_error($ch);

        curl_close($ch);

        if ($err) {
            return ['error' => $err];
        }

        return json_decode($response, true);
    }

    public function sendTextMessage($to, $message)
    {
        $payload = [
            "messaging_product" => "whatsapp",
            "to" => $to,
            "type" => "text",
            "text" => ["body" => $message]
        ];

        return $this->sendRequest("/messages", $payload);
    }

    public function sendTemplateMessage($to, $templateName, $language = "en_US", $components = [])
    {
        $payload = [
            "messaging_product" => "whatsapp",
            "to" => $to,
            "type" => "template",
            "template" => [
                "name" => $templateName,
                "language" => ["code" => $language]
            ]
        ];

        if (!empty($components)) {
            $payload['template']['components'] = $components;
        }

        return $this->sendRequest("/messages", $payload);
    }

    // Inside class WhatsappApi
public function sendImageMessage($to, $imageUrl, $caption = '')
{
    $payload = [
        "messaging_product" => "whatsapp",
        "to" => $to,
        "type" => "image",
        "image" => [
            "link" => $imageUrl
        ]
    ];

    if (!empty($caption)) {
        $payload['image']['caption'] = $caption;
    }

    return $this->sendRequest("/messages", $payload);
}


public function sendDocumentMessage($to, $documentUrl, $filename = null, $caption = '')
{
    $payload = [
        "messaging_product" => "whatsapp",
        "to" => $to,
        "type" => "document",
        "document" => [
            "link" => $documentUrl
        ]
    ];

    if (!empty($filename)) {
        $payload['document']['filename'] = $filename;
    }

    if (!empty($caption)) {
        $payload['document']['caption'] = $caption;
    }

    return $this->sendRequest("/messages", $payload);
}


public function sendVideoMessage($to, $videoUrl, $caption = '')
{
    $payload = [
        "messaging_product" => "whatsapp",
        "to" => $to,
        "type" => "video",
        "video" => [
            "link" => $videoUrl
        ]
    ];

    if (!empty($caption)) {
        $payload['video']['caption'] = $caption;
    }

    return $this->sendRequest("/messages", $payload);
}


public function sendAudioMessage($to, $audioUrl)
{
    $payload = [
        "messaging_product" => "whatsapp",
        "to" => $to,
        "type" => "audio",
        "audio" => [
            "link" => $audioUrl
        ]
    ];

    return $this->sendRequest("/messages", $payload);
}


public function sendInteractiveButtons($to, $headerText, $bodyText, $footerText, $buttons = [])
{
    $payload = [
        "messaging_product" => "whatsapp",
        "to" => $to,
        "type" => "interactive",
        "interactive" => [
            "type" => "button",
            "header" => [
                "type" => "text",
                "text" => $headerText
            ],
            "body" => [
                "text" => $bodyText
            ],
            "footer" => [
                "text" => $footerText
            ],
            "action" => [
                "buttons" => []
            ]
        ]
    ];

    foreach ($buttons as $index => $button) {
        $payload['interactive']['action']['buttons'][] = [
            "type" => "reply",
            "reply" => [
                "id" => $button['id'],
                "title" => $button['title']
            ]
        ];
    }

    return $this->sendRequest("/messages", $payload);
}


public function sendStickerMessage($to, $stickerUrl)
{
    $payload = [
        "messaging_product" => "whatsapp",
        "to" => $to,
        "type" => "sticker",
        "sticker" => [
            "link" => $stickerUrl
        ]
    ];

    return $this->sendRequest("/messages", $payload);
}


}
