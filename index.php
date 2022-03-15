<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  // caso a sessão não tenha sido iniciada, inicie:
  session_start();
}

// incluindo pagina html da
include_once('./pages/index.html');