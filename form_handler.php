<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Pobranie danych z formularza
  $username = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $tresc = $_POST['tresc'];
  $consent = isset($_POST['consent']) ? "Tak" : "Nie"; // Sprawdzenie, czy pole zgody jest zaznaczone

  // Szczegóły e-maila
  $to = "hlvant1432@gmail.com"; // Zmień na swój adres e-mail
  $subject = "Formularz przesyłania";
  $message = "Nazwa użytkownika: $username\n";
  $message .= "Telefon: $password\n";
  $message .= "Adres e-mail: $email\n";
  $message .= "Zgoda na warunki: $consent\n";

  // Wysłanie e-maila
  $headers = "Od: $email" . "\r\n" .
    "Odpowiedz na: $email" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

  if (mail($to, $subject, $message, $headers)) {
    echo "Dziękujemy za przesłanie formularza!";
  } else {
    echo "Błąd: Nie można wysłać e-maila.";
  }
}