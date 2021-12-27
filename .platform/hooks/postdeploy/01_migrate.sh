#!/usr/bin/env bash

if [[ "$EB_IS_COMMAND_LEADER" == "true" ]]; then
  sudo docker exec pet-of-the-day-app php artisan migrate
fi

exit 0