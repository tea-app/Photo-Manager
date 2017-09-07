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
            console.log(data);
            
            var encode_stream = ImageToBase64();
            
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
            
            promise.done(function (result) {
                // 通信完了時の処理... 
                console.log(result);
            });
            
            promise.fail(function(result){
                console.log(result);
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
    }

    init();
})(AWS, jQuery);