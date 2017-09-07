(function (AWS, $) {
    'use strict';

    var accessKeyId     = 'AKIAJOUSMKOQJOWLHSTQ';
    var secretAccessKey = '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';
    var bucketName      = 'tea-liquid-cats';
    var bucketRegion    = 'ap-northeast-1';
    var s3;

    function credentials() {
        AWS.config.region = bucketRegion;
        AWS.config.update({accessKeyId: accessKeyId, secretAccessKey: secretAccessKey});
    }

    function upload(name, stream) {
        var params = {
            Bucket: bucketName,
            Key: name,
            Body: stream,
            ACL: 'public-read',
        };

        s3.upload(params, function(err, data) {
            var uri = data.Location;

            // 通信開始
            var promise = $.ajax({
                url: "newComputerVisionApi.php",
                type: "post",
                dataType: "json",
                data: {
                    uri: uri,
                    name: name,
                }
            });

            // promise.done(function (result) {
            //     // 通信完了時の処理...
            //     console.log('success');
            // });

            promise.always(function (result, hoge) {
                console.log(data);
                if (result.status !== 200) {
                    window.alert('Upload fail.\n Error: Network error.');
                }

                window.location = '/';
            });
        });
    }

    function init() {
        credentials();

        // Init s3 instance
        s3 = new AWS.S3({
            params: {Bucket: bucketName}
        });

        // Upload Button が押された時
        document.getElementById('form-input-submit').addEventListener('click', function (e) {
            var file = document.getElementById('form-input-file').files[0];

            upload(file.name, file);
        });

        document.getElementById('form-input-file').addEventListener('change', function (e) {
            var file    = e.target.files[0];
            var reader  = new FileReader();
            var dataUrl;
            reader.readAsDataURL(file);
            reader.onload = function() {
                dataUrl = reader.result;
                document.getElementById('js-photo-img').src = dataUrl;
            };
        });
    }

    init();
})(AWS, jQuery);
