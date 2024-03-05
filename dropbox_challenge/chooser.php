<?php
$data_app_key = 'egcfc8ocbyicx21';
?>
<!DOCTYPE html>
<!--
https://webprepration.com/add-dropbox-file-picker-chooser-in-website/
-->
<html lang="en">
<head>
    <title>Dropbox Chooser Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="<?php echo $data_app_key?>"></script>
</head>
<body>
<div id="container">
    <div id="dropbox-container-Mario-Solas"></div>
    <hr>
    <ul id="img_list"></ul>
</div>
<script>
    options = {

        // Required. Called when a user selects an item in the Chooser.
        success: function(files) {
            files.forEach(function(file) {
                add_img_to_list(file);
            });
        },

        // Optional. Called when the user closes the dialog without selecting a file
        // and does not include any parameters.
        cancel: function() {

        },

        linkType: "preview", // or "direct"
        multiselect: false, // or true
        extensions: ['.png', '.jpg'],
        folderselect: true, // or true
    };

    file = {
        // Unique ID for the file, compatible with Dropbox API v2.
        id: "id:...",

        // Name of the file.
        name: "filename.txt",

        // URL to access the file, which varies depending on the linkType specified when the
        // Chooser was triggered.
        link: "https://...",

        // Size of the file in bytes.
        bytes: 464,

        // URL to a 64x64px icon for the file based on the file's extension.
        icon: "https://...",

        // A thumbnail URL generated when the user selects images and videos.
        // If the user didn't select an image or video, no thumbnail will be included.
        thumbnailLink: "https://...?bounding_box=75&mode=fit",

        // Boolean, whether or not the file is actually a directory
        isDir: false,
    };

    var button = Dropbox.createChooseButton(options);
    document.getElementById("dropbox-container-Mario-Solas").appendChild(button);

    function add_img_to_list(file) {
        var li  = document.createElement('li');
        var a   = document.createElement('a');
        a.href = file.link;
        var img = new Image();
        var src = file.thumbnailLink;
        src = src.replace("bounding_box=75", "bounding_box=256");
        src = src.replace("mode=fit", "mode=crop");
        img.src = src;
        img.className = "th"
        document.getElementById("img_list").appendChild(li).appendChild(a).appendChild(img);
    }
</script>
</body>
</html>