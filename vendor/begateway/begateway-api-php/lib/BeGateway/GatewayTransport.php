<?php
namespace BeGateway;

class GatewayTransport {

    public static function submit($shop_id, $shop_key, $host, $t_request) {



        if ($response === false) {
          throw new \Exception("cURL error " . $error);
        }

        Logger::getInstance()->write("Response $response", Logger::DEBUG, get_class() );
        return $response;
    }
}
?>
