<?php
    function getStyle($filename) {
        header("Content-type: text/css");
        echo require($filename);
    }