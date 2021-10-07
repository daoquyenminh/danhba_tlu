<?php
$to_email = "active@daoquyenminh.onmicrosoft.com";
$subject = "Cấu hình gửi email";
$body = "Tôi đang học lập trình";
$headers = "From:ĐÀO MINH QUYỀN           adsadadasf";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Gửi thành công đến email: $to_email...";
} else {
    echo "Email sending failed...";
}