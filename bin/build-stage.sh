#!/usr/bin/env bash
#
# This script needs to run on your local machine (Not in vagrant box)
# Before you start coding.
# It will update git hooks and up a vagrant box
#

# Load config values
source $(dirname $0)/config.sh

cd ${REPO_ROOT}

# Update environment config
ln -s .env.stage .env

# Update git hook
sh bin/update-hooks.sh
