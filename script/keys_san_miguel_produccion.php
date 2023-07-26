<?php

/**
 * Get the client
 */
require_once __DIR__ . '/izipay_vendor/autoload.php';

/**
 * Define configuration
 */

/*------- Lince Test Corporacion El Egipcio --------- */

/* Username, password and endpoint used for server to server web-service calls */
Lyra\Client::setDefaultUsername("68128564");
Lyra\Client::setDefaultPassword("prodpassword_fyekBsLWQoNuKN3h7MlWwlzl95mJhB5MJfG8zVpBQEByC");
Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe");

/* publicKey and used by the javascript client */
Lyra\Client::setDefaultPublicKey("68128564:publickey_PJAxaETM4un4bhNgXCXCt9IyP5IXTV7ZSMzY3ubh0pH6i");

/* SHA256 key */
Lyra\Client::setDefaultSHA256Key("yfYnA7NnUzTO9ApnTTnydm9XyeaSNfhyiDf6lTQuJOzWk");

/*------- /Lince Test Corporacion El Egipcio --------- */

/*------- Lince Produccion Corporacion El Egipcio --------- */

/* Username, password and endpoint used for server to server web-service calls */
/* Lyra\Client::setDefaultUsername("39835468");
Lyra\Client::setDefaultPassword("prodpassword_oZuohpLJXg20yaAEWfyOl3Eo2wGryoNeXRsZMrmflhHER");
Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe"); */

/* publicKey and used by the javascript client */
/* Lyra\Client::setDefaultPublicKey("39835468:publickey_JXfRJSYBr68VSZZ04KlrzfkceV69Rld8AZrEmJ8jGCQ1D"); */

/* SHA256 key */
/* Lyra\Client::setDefaultSHA256Key("rLR2qbtgqlG70K4QWEhAbjiyl0GPBeyNEMmEj9vP6IfoT"); */

/*------- /Lince Produccion Corporacion El Egipcio --------- */
