#!/usr/bin/env bash

node_version='v8.9.1'

export NVM_DIR="$HOME/.nvm"
. "$(brew --prefix nvm)/nvm.sh"
nvm=`command -v nvm`

if [ $nvm != "nvm" ]; then
    echo 'Sorry, this script requires nvm'
    exit 1
fi


node=`which node`

if [ $node == "" ]; then
    echo 'Sorry, this script requires node'
    exit 1
fi

local_node_version=`node -v`

if [ $node_version != $local_node_version ]; then
    echo "Node version must be $node_version"

    echo "nvm install $node_version"

    nvm install $node_version

    echo "nvm use $node_version"

    nvm use $node_version

    echo "nvm alias default $node_version"

    nvm alias default $node_version

    echo "\033[32mNode Version Change SUCCEEDED ($node_version)\033[0m"
else
    echo "\033[32mNode Version Check SUCCEEDED ($node_version)\033[0m"
fi
