composer install --optimize-autoloader --no-dev

sam package --output-template-file .stack.yaml --s3-bucket whereiscl-php

 sam deploy --template-file .stack.yaml --capabilities CAPABILITY_IAM --stack-name whereiscl-php
