<?php
?>
    <!DOCTYPE html>
<html>
<head>

    <script src="https://unpkg.com/postmonger@0.0.16/postmonger.js"></script>

    <style>

        body{
            font-family:Arial;
            background:#f5f5f5;
            padding:20px;
        }

        .box{
            background:white;
            padding:20px;
            border-radius:8px;
            width:400px;
            margin:auto;
        }

        input,textarea{
            width:100%;
            padding:10px;
            margin-top:8px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        button{
            background:#25D366;
            color:white;
            border:none;
            padding:10px;
            width:100%;
            border-radius:5px;
            cursor:pointer;
        }

    </style>

</head>

<body>

<div class="box">

    <h3>Send Message</h3>

    <input type="text" id="message" name="message" placeholder="Message">

    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png">

    <textarea id="description" name="description" placeholder="Description"></textarea>


    <button id="sendBtn">Send</button>

</div>

<script>

    var connection = new Postmonger.Session();

    connection.trigger("ready");

    let image = null;

    document.getElementById("image").addEventListener("change", async function(){

        let file = this.files[0];

        let formData = new FormData();

        formData.append("image", file);

        let response = await fetch("/custom-activity/upload-image",{
            method:"POST",
            headers:{
                "X-CSRF-TOKEN":"{{ csrf_token() }}"
            },
            body:formData
        });

        let data = await response.json();

        image = data.url;

    });

    var payload = {};

    connection.on("initActivity", function(data){
        console.log("data")
        console.log(data)
        payload = data;
        console.log("before payload")
        console.log(payload)
    });

    document.getElementById("sendBtn").onclick = function(){

        payload.arguments.execute.inArguments[0].message = document.getElementById("message").value;

        payload.arguments.execute.inArguments[0].description = document.getElementById("description").value;

        payload.arguments.execute.inArguments[0].image = image;

        payload.metaData.isConfigured = true;

        console.log("FINAL PAYLOAD", JSON.stringify(payload));

        connection.trigger("updateActivity", payload);

    };

</script>

</body>

</html>
