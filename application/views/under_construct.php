<?php
/**
 * Created by PhpStorm.
 */
?>
<html>
<head>
    <meta charset="utf-8"/>
    <style>
        .construct{
            margin: 0 auto;
            background-image: url('<?php echo base_url().'means/templates/gebo/img/under_construct.png'?>');
            background-repeat: no-repeat;
            background-size: contain;
            overflow: auto;
            width: 800px;
            height: 800px;
        }
        @media screen and (min-width: 240px) and (max-width: 380px){
            .construct{
                width:240px;
                height: 240px;
            }
        }
        @media screen and (min-width: 381px) and (max-width: 640px){
            .construct{
                width:380px;
                height: 380px;
            }
        }
    </style>
</head>
<body>
<div class="construct">
</div>
</body>
</html>

