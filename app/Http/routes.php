<?php


require(app_path('Runsite/Routes/admin.php'));
if(file_exists(app_path('Runsite/Routes/public.php')))
  require(app_path('Runsite/Routes/public.php'));
