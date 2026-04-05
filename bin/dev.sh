#!/bin/bash

if [ ! -f .env ]; then
	echo '.env file is missing'
	exit 1
fi

. .env

if [ -z $AUTOMAD_BASE ]; then
	echo 'AUTOMAD_BASE is not defined in .env'
	exit 1
fi

echo "Automad base directory: $AUTOMAD_BASE"

cleanup() {
	# Show again ctrl c
	stty -echoctl
	echo -e "\n[PHP] stopping server ...\n"
	bash bin/server.sh stop
}

# Always run cleanup when script exits
# and also handle Ctrl+c
trap cleanup EXIT

# Hide ctrl c
stty -echoctl

echo -e "[PHP] starting server ...\n"
bash bin/server.sh start "$AUTOMAD_BASE"

echo -e "\n[Esbuild] starting esbuild ...\n"
node esbuild.js --dev
