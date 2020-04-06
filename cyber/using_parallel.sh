Examples
Our above wget example can be simplified using GNU parallel as follows:
$ cat list.txt | parallel -j 4 wget -q {}

OR
$ parallel -j 4 wget -q {} < list.txt