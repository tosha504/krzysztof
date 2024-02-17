<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validation
  if (empty($_POST['name'])) {
    $errors[] = "Proszę podać imię i nazwisko.";
  }
  if (empty($_POST['email'])) {
    $errors[] = "Proszę podać adres email.";
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Proszę podać poprawny adres email.";
  }
  if (empty($_POST['phone'])) {
    $errors[] = "Proszę podać numer telefonu.";
  }
  if (empty($_POST['tresc'])) {
    $errors[] = "Proszę wpisać treść wiadomości.";
  }
  if (!isset($_POST['consent'])) {
    $errors[] = "Proszę wyrazić zgodę na przetwarzanie danych osobowych.";
  }

  // If there are no errors, process the form
  if (empty($errors)) {
    $username = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $tresc = $_POST['tresc'];
    $consent = isset($_POST['consent']) ? "Tak" : "Nie";

    // Email details
    $to = "hlvant1432@gmail.com";
    $subject = "Formularz przesyłania";
    $message = "Nazwa użytkownika: $username\n";
    $message .= "Telefon: $phone\n";
    $message .= "Adres e-mail: $email\n";
    $message .= "Zgoda na warunki: $consent\n";

    $headers = "From: $email" . "\r\n" .
      "Reply-To: $email" . "\r\n" .
      "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
      header("Location: thank_you.php");
      exit();
    } else {
      $errors[] = "Błąd: Nie można wysłać e-maila.";
    }
  }
}