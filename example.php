<?php

    require_once("playground.php");
    require_once("classes/devices.php");

    // Allow Scan
    $playground = New \PlayGround\Devices;
    $allowScan = $playground->allowScan("YOUR_TOKEN", 1234); // Parameters must be "YOUR TOKEN" and "ORDER ID"
    var_dump($allowScan); echo "<br><br>";

    // Finalize Scan
    $playground = New \PlayGround\Devices;
    $scan_data = json_encode(
        array(
            "files" => array(
                "obj" => base64_encode("FILE_BYTES"),
                "stl" => base64_encode("FILE_BYTES")
            ),
            "metas" => array(
                "latitude" => 123,
                "longitude" => 321
            )
        )
    );
    $finalizeScan = $playground->finalizeScan("YOUR_TOKEN", 1234, $scan_data); // Parameters must be "YOUR TOKEN", "ORDER ID" and "SCAN DATA" (JSON string of an array of objects)"
    var_dump($finalizeScan); echo "<br><br>";

    // Custom request
    $request = New \PlayGround\Requests("YOUR_TOKEN"); // Create a new request using your Token, Serial or Identifier
    $endpoint = New \PlayGround\Endpoints("https://www.playcast.it/api/", "1.0"); // Both parameters are optional, default is what is actually specified.
        $endpoint_method = $endpoint->get("allowScan"); // https://www.playcast.it/api/1.0/allowScan
    $parameters = array(
        "order_id" => 1234
    ); // Parameters must be and array of objects
    $custom_request = $request->post($endpoint_method, $parameters); // Send the request and get the response (Response is in JSON format)
    var_dump($custom_request);
?>
