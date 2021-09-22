@echo off 

if "%1"=="" (
	echo Sin Parametros
)


if "%~1"=="appurl://1/" (

for /r "%homepath%\Desktop" %%a in (*kopland*) do start "" "%%~fa" 

)

if "%~1"=="appurl://2/" (

if Exist C:\"Program Files (x86)"\"Nombre predeterminado de la compa¤¡a"\INSTALACION_HCE\HCE-CBO.exe (
	start "" /D C:\"Program Files (x86)"\"Nombre predeterminado de la compa¤¡a"\INSTALACION_HCE HCE-CBO.exe
)else (
	start http://192.168.1.136/Accesos/index.php?error=1
)

)


if "%~1"=="appurl://3/" (
if Exist c:\setup\winhce.exe (
	start /d "c:\setup\" winhce.exe
)else (
	start http://192.168.1.136/Accesos/index.php?error=1
)

)

if "%~1"=="appurl://4/" (
	if Exist c:\setup\winenfermeria.exe (
	start /d "c:\setup\" winenfermeria.exe
)else (
	start http://192.168.1.136/Accesos/index.php?error=1
)

)
if "%~1"=="appurl://5/" (
	if Exist c:\setup\winpabellon.exe (
	start /d "c:\setup\" winpabellon.exe
)else (
	start http://192.168.1.136/Accesos/index.php?error=1
)


)

if "%~1"=="appurl://6/" (
	if Exist c:\setup\winadmision.exe (
	start /d "c:\setup\" winadmision.exe
)else (
	start http://192.168.1.136/Accesos/index.php?error=1
)

)
if "%~1"=="appurl://7/" (
	if Exist c:\setup\winlistapaciente.exe (
	start /d "c:\setup\" winlistapaciente.exe
)else (
	start http://192.168.1.136/Accesos/index.php?error=1
)
)
if "%~1"=="appurl://8/" (
if Exist C:\"Program Files (x86)"\"Hewlett-Packard\INST_HCE_AMB"\HCE_AMB.exe (
	start "" /D C:\"Program Files (x86)"\"Hewlett-Packard\INST_HCE_AMB"\ HCE_AMB.exe
)else (
	start http://192.168.1.136/Accesos/index.php?error=1
)

)

if "%~1"=="appurl://9/" (

)
if "%~1"=="appurl://10/" (

)

if "%~1"=="appurl://11/" (

)