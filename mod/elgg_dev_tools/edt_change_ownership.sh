#!/bin/bash

usage() {
	echo "Usage: ${0} target_dir new_owner new_group"
}

if [ ${#} -lt 3 ]; then
	usage
	exit 1
fi

chown -R ${2}:${3} ${1} 
find ${1} -type f -exec chmod 664 {} \;
find ${1} -type d -exec chmod 775 {} \;
