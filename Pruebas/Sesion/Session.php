<?php 
class Session{
    function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
    }
// setAttribute: Dado un atributo y un valor, lo seteara en la sesión.
    function setAttribute($attribute,$value){
        if(session_status()=== PHP_SESSION_ACTIVE && is_string($attribute)){
            $_SESSION[$attribute]=$value;
        }
    }

// getAttribute: Dado un atributo, devolvemos el valor de la sesión.
    function getAttribute($attribute){
        if(session_status()=== PHP_SESSION_ACTIVE && is_string($attribute) && isset($_SESSION[$attribute])){
            return $_SESSION[$attribute];
        }else{
            return null;
        }
    }

//deleteAttribute: Dado un atributo, lo borraremos de la sesión.
    function deleteAttribute($attribute){
        if(session_status()=== PHP_SESSION_ACTIVE && is_string($attribute) && isset($_SESSION[$attribute])){
            unset($_SESSION[$attribute]);
        }
    }

//destroySession: destruye la sessión.
    function destroySession(){
        session_destroy();
    }
}
?>