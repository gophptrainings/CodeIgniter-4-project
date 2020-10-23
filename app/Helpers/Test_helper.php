<?php
function randomString()
{
    return substr(str_shuffle('abcdefghjiklmnopqrstuvwxyz'),10,10);
}
