# cheques
Impresion de cheques mensuales

# Configuracion BD
	1. Al exportar la BD desde 'Export' o desde comando usar cortejamiento Latin_1
	
# Excel a MySQL
	1. Quitar encabezados en excel
	2. Guardar como Texto (delimitado por tabulaciones). Agregar .txt al final del nombre
	3. Crear la BD con sus tablas
	4. Selecionar tabla. Seleccionar apartado de 'SQL'
	5. LOAD data INFILE "X:/Escritorio/personas.txt" INTO TABLE personas
	6. Listo!!!

# Configurar Chrome:
	1. https://help.brightpearl.com/hc/en-us/articles/360028542572-Chrome-settings-for-silent-printing
	2. Desactivar encabezado y pie de pagina
	3. Crear acceso directo, propiedades e Iniciar en al final agregar, despues de las comillas (dejar un espacio) --kiosk-printing

# Margenes en chrome
	1. Papel A4
  	2. Margen izquierdo 6mm
  	3. Margen derecho 10mm
  	4. Margen superior 5mm
  	5. Margen inferior 10mm

# Imprimir nomina
	1. En propiedades de impresora seleccionar Carta y Horizontal

# Error fpdf
 	error: set_magic_quotes_runtime() is deprecated
	
	acceder a la ruta "C:\xampp\htdocs\cheques\application\third_party\fpdf\libraries\fpdf.php" a la linea #1043 y agregar la siguiente linea de codigo "version_compare(PHP_VERSION, '5.3.0', '<')" dentro de la sentencia if.
	Ref:
[Srackoverfow](https://stackoverflow.com/questions/2217955/how-can-i-replace-the-deprecated-set-magic-quotes-runtime-in-php)
