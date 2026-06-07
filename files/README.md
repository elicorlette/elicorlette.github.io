Files directory

This folder is intended for private files you want to keep with the project locally but not publish in the repository or on the website.

How to add your resume here

1. Copy your resume PDF to this folder and name it `Elijah_Corlette_Resume.pdf`.
   - Example destination (Windows): `C:\Users\<you>\OneDrive\Documents\GitHub\elicorlette.github.io\files\Elijah_Corlette_Resume.pdf`

2. This repository's `.gitignore` is configured to ignore everything in `files/` except this `README.md`, so files you place here will not be committed or pushed by default.

Helper script

A `move_resume.bat` helper is available in the project root — run it locally to copy the file from your Downloads path into this folder. The helper copies the file to `files/Elijah_Corlette_Resume.pdf`.

Security note

Keep any sensitive files out of the repository if you do not want them uploaded to remote hosting. This folder is ignored by git by default to reduce accidental publishing.