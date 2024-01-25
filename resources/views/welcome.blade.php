<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    #border {
        /* border: 1px solid black; */
        width: 50%;
        height: 50%;
        margin: 0 auto;
    }
</style>

<body>
    <div id="border">
        <div id="reader">

        </div>
    </div>
    {{-- <div id="reader" width="600px" height="600px"></div> --}}
    <script src="./dist/html5-qrcode.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        // This method will trigger user permissions
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);
            window.location.href = decodedText;
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 500,
                    height: 500
                },
                aspectRatio: 1.1,
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        html5QrCode.stop().then((ignore) => {
            // QR Code scanning is stopped.
        }).catch((err) => {
            // Stop failed, handle it.
        });
    </script>
</body>

</html>
