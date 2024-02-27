<?php

/*
 * API SEOMatch.net
 * Wersja 0.0.1
 * W przypadku błędu API zwróci błąd 400
 * Api zwraca json:
 * - Title
 * - Description
 * - Content
 */

// Dane do wysłania w zapytaniu
$data = array(
    'Content' => null,
    'Culture' => 'pl-pl',
    'Files' => array(
        base64_encode(file_get_contents('ścieżka/do/twojego/pliku')) // Zakodowanie pliku do formatu Base64, maksymalnie 5 plików
    )
);

// Konwertowanie danych do formatu JSON
$jsonPayload = json_encode($data);

// Ustawienie wartości cookie
$sessionCookie = 'SESSION=session_value'; // Zastąp 'session_value' wartością sesji z autoryzacji

// Utworzenie żądania HTTP POST za pomocą cURL
$ch = curl_init();

// Adres URL docelowego punktu końcowego
$url = 'https://seomatch.net/API/Ai/Product';

// Ustawienie opcji żądania
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_COOKIE, $sessionCookie); // Ustawienie cookies

// Ustawienie opcji dla otrzymywania odpowiedzi
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Wykonanie żądania
$response = curl_exec($ch);

// Sprawdzenie ewentualnych błędów
if ($response === false) {
    echo 'Błąd cURL: ' . curl_error($ch);
} else {
    // Przetworzenie odpowiedzi
    echo 'Odpowiedź: ' . $response;
}

// Zamknięcie połączenia
curl_close($ch);

?>