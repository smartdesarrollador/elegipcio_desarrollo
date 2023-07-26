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
Lyra\Client::setDefaultUsername("32062011");
Lyra\Client::setDefaultPassword("testpassword_OYKh53rFTO4TwmktAXtKOmfvayQGHCntu3XwLP1eYHLFV");
Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe");

/* publicKey and used by the javascript client */
Lyra\Client::setDefaultPublicKey("32062011:testpublickey_2ftim3SQDaWOzDOZbQjOJ76aUJcobZ7bwp2xUBfosC9xh");

/* SHA256 key */
Lyra\Client::setDefaultSHA256Key("L2Cjev7Mjzf9ENRyKpMGiiBA4x8OOK3NoSqlTa6bGWBkk");

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
