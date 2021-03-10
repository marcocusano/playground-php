<?php

    namespace PlayGround {

        class Devices {
            function allowScan($token, $order_id) {
                $request = New Requests($token);
                $parameters = array( "order_id" => $order_id );
                $endpoint = New Endpoints;
                return $request->post($endpoint->get("allowScan"), $parameters);
            }

            function finalizeScan($token, $order_id, $scan_data) {
                $request = New Requests($token);
                $parameters = array( "order_id" => $order_id, "scan_data" => $scan_data );
                $endpoint = New Endpoints;
                return $request->post($endpoint->get("finalizeScan"), $parameters);
            }
        }

    }

?>
