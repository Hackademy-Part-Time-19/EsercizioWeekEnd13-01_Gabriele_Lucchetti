<?php
/*creare una funzione che controlli le caratteristiche di una password inserita da un utente
deve avere 8 caratteri, deve avere 1 carattere speciale, 
deve avere almeno un carattere maiuscolo, deve avere almeno un carattere numerico
*/



//<- Creo una variabile globale con la quale controllare il Do-while
$password_verified = false;


//<-Creo un ciclo do-while che ci chieda la password finche' non sia sicura
do
    ($password = readline('Inserisci password sicura: '));
while ($password_verified == false); {
    if (checkPassword($password)) {

        //<-Aggiorno la variabile per far terminare il Do-while

        $password_verified = true;

    }


}
;






//<-funzione per il check della password con tutte le condizioni di verita' che devon essere rispettate
function checkPassword(string $password)
{

    $check = false;

    $check = checkLenght($password) && checkNumeric($password) && checkSpecial($password) && checkUpperCase($password);

    if ($check) {
        echo "Password appropriata\n";
        return true;
    }
    ;
    echo "Password troppo semplice\n";
    return false;
}


//<-Funzione per il check della lunghezza con funzione strlen >=8 caratteri
function checkLenght(string $password)
{
    if (strlen($password) >= 8) {
        return true;
    }
    return false;

}
;


//<-Funzione per il controllo numerico, cioe' che abbia almeno un numero da 1 a 9 dichiarato nell'array interno alla funzione

function checkNumeric(string $password)
{
    $numeric_value = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    for ($i = 0; $i < strlen($password); $i++) {
        if (in_array($password[$i], $numeric_value)) {
            return true;
        }
    }
    return false;

}

//<-Funzione per il controllo del carattere maiuscolo

function checkUpperCase(string $password)
{
    if (strtolower($password) != $password) {
        return true;
    }
    return false;

}


//<-Funzione per il controllo del carattere speciale

function checkSpecial(string $password)
{
    $special = ['!', '@', '#', '?', '/', '-'];
    for ($i = 0; $i < strlen($password); $i++) {


        if (in_array($password[$i], $special)) {
            return true;

        }
    }
    return false;
}