#!/bin/bash
## declare an array variable
declare -a models=("Country" "Profession" "District" "IdentificationType" "MaritalStatus" "Education" "AddressType" "Branch" "Region" "Currency" "EconomicSector")
declare -a dbs=("countries" "professions" "districts" "identification_types" "marital_statuses" "education" "address_types" "branches" "regions" "currencies" "economic_sectors")

# get length of an array
m1=${#models[@]}
d1=${#dbs[@]}

# use for loop to read all values and indexes
for (( i=1; i<${m1}+1; i++ ));
do
  echo ${models[$i-1]}
  # ${dbs[$i-1]}
  php artisan  infyom:scaffold ${models[$i-1]}  --fromTable --tableName=${dbs[$i-1]} --prefix=Setting
done

# php artisan  infyom:api_scaffold Product --fromTable --tableName=products --prefix=Shop
