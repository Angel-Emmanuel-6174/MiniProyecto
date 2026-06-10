@echo off
set PHP=

if exist "C:\xampp\php\php.exe" set PHP=C:\xampp\php\php.exe
if exist "C:\XAMPP\php\php.exe" set PHP=C:\XAMPP\php\php.exe
if exist "C:\wamp64\bin\php\php8.3.0\php.exe" set PHP=C:\wamp64\bin\php\php8.3.0\php.exe
if exist "C:\wamp64\bin\php\php8.2.0\php.exe" set PHP=C:\wamp64\bin\php\php8.2.0\php.exe

if "%PHP%"=="" (
    echo No se encontro PHP. Instala XAMPP o agrega php.exe al PATH.
    pause
    exit /b 1
)

echo Servidor en http://localhost:8000
echo Importa database.sql en phpMyAdmin antes de registrar usuarios.
echo.
"%PHP%" -S localhost:8000 -t "%~dp0"
pause
