<?php

//Since this is not a docker and is using forge.laravel.com the env are stored in this file
include '.env';

echo 'CI/CD environment works';

echo '< /br>';

var_dump([ getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_TABLE')]);

