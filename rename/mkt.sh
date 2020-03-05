#!/bin/bash

echo "give me a bottle of rum!"
## declare an array variable
declare -a models=("countries" "professions" "regions" "districts" "wards" "economicSectors" "legalForms"s)
m1=${#models[@]}
for ((i = 1; i < ${m1} + 1; i++)); do
  echo ${models[$i - 1]}
  touch "${models[$i - 1]}.js"
done

# php artisan  infyom:api_scaffold Product --fromTable --tableName=products --prefix=Shop
