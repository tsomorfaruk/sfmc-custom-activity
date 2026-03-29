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

    let imageUrl = null;

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

        imageUrl = data.url;

    });

    var payload = {};

    connection.on("initActivity", function(data){
        payload = data || {};

        payload.arguments = payload.arguments || {};
        payload.arguments.execute = payload.arguments.execute || {};
        payload.arguments.execute.inArguments = payload.arguments.execute.inArguments || [];

        console.log(payload)
    });

    document.getElementById("sendBtn").onclick = function(){

        let existingArgs = payload.arguments.execute.inArguments || [];

        existingArgs.push({
            message: document.getElementById("message").value,
            description: document.getElementById("description").value,
            image: imageUrl
        });

        payload.arguments.execute.inArguments = existingArgs;


        payload.metaData.isConfigured = true;

        connection.trigger("updateActivity", payload);

        console.log("payload1")
        console.log(payload)
    };
    /*document.getElementById("sendBtn").onclick=function(){
        console.log("test1")

        let message = document.getElementById("message").value;

        let description = document.getElementById("description").value;

        connection.trigger("updateActivity",{

            arguments:{
                execute:{
                    inArguments:[
                        {
                            message:message,
                            description:description,
                            image:imageUrl
                        }
                    ]
                }
            },

            metaData:{
                isConfigured:true
            }

        });

        console.log("message")
        console.log(message)
        console.log("description")
        console.log(description)
        console.log("imageUrl")
        console.log(imageUrl)

    };*/

</script>

</body>

</html>
