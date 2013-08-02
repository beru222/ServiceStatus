@echo off
rem #####
rem # this bat file add path own directory.
rem #
rem #####
set PJ_HOME=%cd%
pushd ..\..\xampp\php
set BIN=%cd%
set PATH=%PATH%;%BIN%
echo %PATH%
pause
rem php.exe php-cs-fixer.phar self-update

popd
for %%f in (*.php) do (
    php.exe php-cs-fixer.phar fix %~dp0%%%f
)

pushd .\tests
for %%f in (*.php) do (
    php.exe ..\php-cs-fixer.phar fix %PJ_HOME%\tests\%%f
)

popd

pause

rem exit 0