#!/bin/bash
# Helper script untuk menjalankan docker-compose dengan Podman

export DOCKER_HOST=unix:///run/user/$(id -u)/podman/podman.sock
docker-compose "$@"
