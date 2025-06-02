<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "hello@nuvitro.in"; // Your email
    $subject = "New Contact Us Submission";

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $services = isset($_POST["services"]) ? $_POST["services"] : [];
    $servicesList = implode(", ", $services);

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message: $message\n";
    $body .= "Selected Services: $servicesList\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "Something went wrong. Please try again.";
    }
}
?>
