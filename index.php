<?php

echo 'CI/CD environment works';

echo '< /br>';

var_dump([ getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_TABLE')]);