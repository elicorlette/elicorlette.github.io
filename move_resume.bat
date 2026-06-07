@echo off
REM Helper to copy local resume into repo files folder
REM Update the source path below if it differs
set SRC="C:\Users\escor\Downloads\TRS\Employment\V2. ROUGH_DRAFT_FORMATTED_elijah_corlette_resume.pdf"
set DST="%~dp0files\Elijah_Corlette_Resume.pdf"

echo Copying %SRC% to %DST%
copy %SRC% %DST%

echo Done.
pause
