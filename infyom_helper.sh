#!/bin/bash
## declare an array variable

declare -a models=("Agent" "Attachment" "AttachmentType" "Bol" "Container" "Driver" "IdentificationType" "Owner" "Tender" "Truck")
# declare -a dbs=("agents" "attachments" "attachment_types" "bols" "containers" "drivers" "identifications" "identification_types" "owners" "tenders" "trucks")


declare -a models=("Agent" "Attachment" "AttachmentType" "Bol" "Container" "Driver" "IdentificationType" "Owner" "Tender" "Truck")
# get length of an array
m1=${#models[@]}
d1=${#dbs[@]}

# use for loop to read all values and indexes
for (( i=1; i<${m1}+1; i++ ));
do
    echo "${models[$i-1]}";
    php artisan infyom:migration -n -q ${models[$i-1]} --fieldsFile=/home/alpha/Documents/tantrade/new-tan/resources/model_schemas/${models[$i-1]}.json;
done

