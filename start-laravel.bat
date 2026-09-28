@echo off
setlocal
set "PHP=%~dp0..\..\work\laravel-runtime\php\php.exe"
if not exist "%PHP%" set "PHP=php"
pushd "%~dp0"
"%PHP%" artisan serve
popd
