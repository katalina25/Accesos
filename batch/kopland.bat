@REM for /r "%homepath%\Desktop" %%a in (*kopland*) do start "" "%%~fa"
for  /r "%homepath%\Desktop" %%a in (*kopland*) do "%%~fa"
DEL "%~f0"