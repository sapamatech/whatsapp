# 📲 Sapamatech WhatsApp API PHP Wrapper

A lightweight PHP wrapper for the [WhatsApp Cloud API](https://developers.facebook.com/docs/whatsapp/cloud-api/) by **Sapamatech**. Easily send text, media, templates, interactive buttons, and stickers via WhatsApp.

---

## 🛠️ Installation

Clone the repository:

```bash
git clone https://github.com/your-username/sapamatech-whatsapp-api.git
```

Include `WhatsappApi.php` in your PHP project, or set up autoloading via Composer (coming soon).

---

## 🚀 Quick Start

```php
require 'WhatsappApi.php';

use Sapamatech\Whatsapp\WhatsappApi;

$whatsapp = new WhatsappApi('YOUR_PHONE_NUMBER_ID', 'YOUR_ACCESS_TOKEN');

// Send a simple text message
$whatsapp->sendTextMessage('+1234567890', 'Hello from Sapamatech!');
```

---

## ✅ Available Methods

### 📤 Send Text Message

```php
$whatsapp->sendTextMessage('+1234567890', 'Hello there!');
```

### 🧾 Send Template Message

```php
$whatsapp->sendTemplateMessage(
    '+1234567890',
    'hello_world',
    'en_US',
    [
        [
            'type' => 'body',
            'parameters' => [
                ['type' => 'text', 'text' => 'John']
            ]
        ]
    ]
);
```

### 🖼 Send Image

```php
$whatsapp->sendImageMessage('+1234567890', 'https://example.com/image.jpg', 'Look at this image');
```

### 📄 Send Document

```php
$whatsapp->sendDocumentMessage('+1234567890', 'https://example.com/doc.pdf', 'MyDoc.pdf', 'Document caption');
```

### 🎞 Send Video

```php
$whatsapp->sendVideoMessage('+1234567890', 'https://example.com/video.mp4', 'Cool video');
```

### 🔊 Send Audio

```php
$whatsapp->sendAudioMessage('+1234567890', 'https://example.com/audio.mp3');
```

### 🧩 Send Interactive Buttons

```php
$buttons = [
    ['id' => 'btn_yes', 'title' => 'Yes'],
    ['id' => 'btn_no', 'title' => 'No']
];

$whatsapp->sendInteractiveButtons(
    '+1234567890',
    'Question',
    'Do you agree?',
    'Click one',
    $buttons
);
```

### 💬 Send Sticker

```php
$whatsapp->sendStickerMessage('+1234567890', 'https://example.com/sticker.webp');
```

---

## ℹ️ Requirements

- PHP 4.4 or higher
- WhatsApp Cloud API access
- Verified Meta Business Account
- Publicly accessible media URLs

---

## 📄 License

MIT License

---

## 🧑‍💻 Author

**Sapamatech**  
🌐 [https://www.sapamatech.com](https://www.sapamatech.com)  
📧 support@sapamatech.com
📧 +254722906835
