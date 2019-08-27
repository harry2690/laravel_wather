#!/bin/sh

dir=$1

if [ -z "$dir" ]; then
	echo "dir not found, please send dir path."
    echo "Usage:
    cframework.sh [dir path]
	"
	exit
fi

for tenantFolder in $(find $dir -type d -maxdepth 1 -name 'tenant_*')
do
	frameworkFolder=$tenantFolder/framework
	if [ -d "$frameworkFolder" ]; then
		echo "folder: "$frameworkFolder" exist."
	else
		echo "mkdir folder: "$frameworkFolder
		mkdir $frameworkFolder
		chmod -R 777 $frameworkFolder
	fi
done