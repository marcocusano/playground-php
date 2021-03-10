<?php

    // Author: Marco Cusano
    // Website: https://www.marcocusano.dev/github

    namespace PlayGround {

        class Requests {

            function __construct($token) { $this->token = $token; $this->response = null; }

            function post($endpoint, $parameters) {
                if (is_array($parameters)) {
                    // Init request
                    $parameters["token"] = $this->token;
                    $ch = curl_init();

                    // Set opt
                    curl_setopt($ch, CURLOPT_URL, $endpoint);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

                    // Receive response
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    // Get response
                    $output = curl_exec($ch);
                    var_dump($output);

                    // End curl request
                    curl_close($ch);

                    $this->response = json_decode($output);
                    return $this->response;
                } else {
                    return array(
                        "code" => -1,
                        "message" => "Invalid parameters. Try sending a valid array.",
                        "error" => true
                    );
                }
            }

        }

        class Endpoints {

            function __construct($endpoint = "https://www.playcast.it/api/", $version = "1.0") {
                $this->endpoints = array(
                    "root" => $endpoint,
                    "version" => $version,
                    "author" => "Marco Cusano"
                );
                $this->endpoints["methods"] = array(
                    "allowScan" => $this->endpoints["root"] . $this->endpoints["version"] . "/playground/allowScan",
                    "finalizeScan" => $this->endpoints["root"] . $this->endpoints["version"] . "/playground/finalizeScan",
                );
                return true;
            }

            function get($method) { return $this->endpoints["methods"][$method]; }

        }

    }

?>
