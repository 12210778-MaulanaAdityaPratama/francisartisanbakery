@echo off
REM Wrapper script to run PHP commands inside the laravel-app container
REM Usage: php.bat [php arguments]

setlocal enabledelayedexpansion

REM Get the script directory
for /f "tokens=*" %%i in ('cd') do set SCRIPT_DIR=%%i

REM Run php inside the container
docker compose -f "C:\Users\it\OneDrive\Documents\docker\docker-laravel\compose.yaml" exec -T app php %*

endlocal
