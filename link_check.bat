@echo off
REM Wrapper to run the PowerShell link checker from this folder
setlocal
cd /d %~dp0
powershell -NoProfile -ExecutionPolicy Bypass -File "%~dp0link_check.ps1"
endlocal
pause