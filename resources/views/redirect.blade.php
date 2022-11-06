<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        input{
            width: 50%;
            height: 32px;
            background: #c6cad0;
            margin: 5px 0;
            border-radius: 5px;
            padding-inline: 10px;
        }
    </style>
</head>

<body>
{!! $data !!}
<script>
    // "use strict";
    setTimeout(function () {
        document.getElementById("payment-form").submit();
    },2000)
</script>
</body>

</html>
