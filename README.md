# projekt
 Projekt zaliczeniowy z komunikacji człowiek-komputer

 Wykorzystałem framework PHP - laravel wersja 10, do tego konieczne połączenie XAMMP wraz z bazą danych poprzez phpMyAdmin.
 Do instalacji frameworka użyłem composera.
 Do obsługi przesyłanych maili użyłem strony mailtrap.io

 Aktualne funkcjonalności w projekcie zgodne z commitami:
 1. Możliwość rejestracji użytkowników (pracodawca i pracownik);
 2. Możliwość logowania się na panel główny użytkownika;
 3. Konieczność weryfikacji użytkownika (poprzez link na email) celem dostępu do panelu tylko zweryfikowanym użytkownikom;
 4. Możliwość przesłania ponownie linku weryfikującego;
 5. Pracodawca widzi okres aktywnej subskrypcji (każdy nowy pracodawca ma 7 dni darmowej subskrypcji). Po upływie czasu wyświetli się monit o konieczności ponowienia subskrypcji.
