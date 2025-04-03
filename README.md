# SISTEMA DE GESTIÓN DE CITAS MÉDICAS


🚀 **Sistema Backend en PHP para la Gestión de Citas Médicas**

Este proyecto se desarrolló utilizando **PHP puro**, **XAMPP** y **phpMyAdmin**. El sistema permite gestionar las citas médicas, registrar pacientes, doctores, especialidades y realizar búsquedas. El sistema usa el patrón **Modelo-Vista-Controlador (MVC)** para estructurar el código y separar la lógica de negocio de la presentación.

💡 **Estructura del Proyecto**

**Backend:**
- **PHP Puro**: Utilizado para la lógica del servidor.
- **XAMPP**: Usado como entorno local de desarrollo (Apache, MySQL, PHP).
- **PHPMyAdmin**: Herramienta para gestionar la base de datos MySQL.
- **Patrón MVC**: Implementado para separar la lógica de negocio, presentación y control de datos.

**Frontend:**
- **HTML, CSS**: Para la interfaz de usuario simple.
- **PHP**: Utilizado para generar dinámicamente el contenido del sitio web, como formularios y vistas.
- **CRUD**: El sistema realiza operaciones CRUD (Crear, Leer, Actualizar, Eliminar) en pacientes, doctores, citas y especialidades.

### 📋 **Estructura de la Base de Datos**

El sistema utiliza una base de datos MySQL para gestionar:
- **Pacientes**: Información personal de los pacientes.
- **Doctores**: Datos de los médicos disponibles para las citas.
- **Citas**: Información de las citas programadas entre pacientes y doctores.
- **Especialidades**: Especialidades médicas disponibles en el sistema.
- **Usuarios**: Registro de usuarios para acceso al sistema (login y registro).

### CAPTURAS DE PANTALLA
**Registro de Usuario**
<img width="1409" alt="Captura de Pantalla 2025-04-03 a la(s) 15 19 15" src="https://github.com/user-attachments/assets/fcc7a584-0470-433b-835c-5eb5fe5d6ef3" />

**Inicio de Sesion**
<img width="1409" alt="Captura de Pantalla 2025-04-03 a la(s) 15 20 11" src="https://github.com/user-attachments/assets/98964190-a648-4699-9fb5-66819c97d8dc" />

**Principal**

<img width="1409" alt="Captura de Pantalla 2025-04-03 a la(s) 15 21 31" src="https://github.com/user-attachments/assets/deebff1d-f159-4026-9a53-a94797c6b726" />

<img width="1409" alt="Captura de Pantalla 2025-04-03 a la(s) 15 22 37" src="https://github.com/user-attachments/assets/ec4b20f0-e9f8-4c3f-ad5e-e572bceb7ce3" />

<img width="1409" alt="Captura de Pantalla 2025-04-03 a la(s) 15 23 20" src="https://github.com/user-attachments/assets/079eeb53-5183-4fd6-a22d-5ee62792e813" />

<img width="1409" alt="Captura de Pantalla 2025-04-03 a la(s) 15 26 08" src="https://github.com/user-attachments/assets/f15029c8-a519-4ead-a88b-8ad2c401381d" />

<img width="1409" alt="Captura de Pantalla 2025-04-03 a la(s) 15 27 33" src="https://github.com/user-attachments/assets/20af7518-dac4-4b78-a7ce-9387ad126551" />


### 💻 **Clonar el Repositorio**

Clona el repositorio a tu máquina local utilizando Git:

git clone https://github.com/KRocioCC/Sistema-de-Gestion-de-Citas-Medicas.git

### ⚡ Funciones Principales

Login y Registro de Usuario:

Los usuarios pueden registrarse y acceder al sistema con sus credenciales.

Gestión de Pacientes:

Registrar, actualizar y eliminar pacientes.

Gestión de Doctores:

Añadir, actualizar y eliminar médicos.

Gestión de Citas:

Crear, modificar y eliminar citas médicas entre pacientes y doctores.

Gestión de Especialidades:

Administrar las especialidades médicas disponibles en el sistema.

Buscador:

El sistema cuenta con un buscador para encontrar fácilmente pacientes, citas, doctores y especialidades.

### Ejecución 
- Instalar Xampp, vsc
- Entra a PHPmyAdmin y crea una base de datos con el nombre "hospitaln" e importa el archivo "hospitaln.sql", el correcto nombre de la base de datos se puede confirmar en la carpeta "core", en el archivo "Conectar.php".
- Ingresar la carpeta del proyecto a la carpeta "htdocs en Xampp" y abrirlo en VSC o otro editor.
- En un navegador web colocar :   http://127.0.0.1/hospital/ 

