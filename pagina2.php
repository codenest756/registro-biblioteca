<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles3.css">
    <title>Registro Bibliotecario</title>
</head>
<body>
    <script>
        function logout() {
            alert('Has cerrado sesión.');
            window.location.href = 'login.html';
        }
    </script>
    <a href="logout.php"button class="logout-button" onclick="cerrarSesion()">Cerrar Sesión</button></a>
<div class="container">
        <div class="top-div">
            <h1>Bienvenidos a la Biblioteca</h1>
            <p>Te damos la bienvenida al sistema de registro de la biblioteca de la Institucion Educativa Tecnica Industrial Antonio Jose Camacho</p>
       </div> 
</div>
<div class="container2">
        <div class="center-divs">
            <div class="menu-container">
                <div class="menu-header">
                    <h2>MENÚ</h2>
                </div>
                <ul class="menu">
                    <li class="menu-item"><a href="inicio.php?controller=registro&action=list">Nuevo Registro</a></li>
                    <li class="menu-item"><a href="inicio.php?controller=novedades&action=list">Novedades</a></li>
                <p></ul></p>
            </div>

            <div class="calendar">
                <div class="calendar-header">
                    <button id="prev-month">&#9664;</button>
                    <h2 id="month-year"></h2>
                    <button id="next-month">&#9654;</button>
                </div>
                <div class="calendar-body">
                    <div class="calendar-weekdays">
                        <div>Dom</div>
                        <div>Lun</div>
                        <div>Mar</div>
                        <div>Mié</div>
                        <div>Jue</div>
                        <div>Vie</div>
                        <div>Sáb</div>
                    </div>
                    <div class="calendar-days" id="calendar-days">
                        <!-- Aquí se generarán los días del mes -->
                    </div>
                </div>
            </div>
            
            <script>
                const monthYear = document.getElementById('month-year');
                const calendarDays = document.getElementById('calendar-days');
                const prevMonth = document.getElementById('prev-month');
                const nextMonth = document.getElementById('next-month');

                let currentDate = new Date();

                function renderCalendar() {
                    const year = currentDate.getFullYear();
                    const month = currentDate.getMonth();

                    monthYear.textContent = currentDate.toLocaleDateString('es-ES', { month: 'long', year: 'numeric' });

                    // Obtener primer día del mes
                    const firstDayOfMonth = new Date(year, month, 1).getDay();
                    // Obtener último día del mes
                    const lastDateOfMonth = new Date(year, month + 1, 0).getDate();

                    // Limpiar los días anteriores
                    calendarDays.innerHTML = '';

                    // Rellenar los días del calendario
                    for (let i = 0; i < firstDayOfMonth; i++) {
                        calendarDays.innerHTML += `<div></div>`;
                    }
                    for (let day = 1; day <= lastDateOfMonth; day++) {
                        calendarDays.innerHTML += `<div>${day}</div>`;
                     }


                 }
                

                prevMonth.addEventListener('click', () => {
                    currentDate.setMonth(currentDate.getMonth() - 1);
                    renderCalendar();
                });

                nextMonth.addEventListener('click', () => {
                    currentDate.setMonth(currentDate.getMonth() + 1);
                    renderCalendar();
                });

                renderCalendar();
            </script>

            <div class="center-div">
                <div class="search-container">
                    <h2>Buscar Documento de Identidad</h2>
                    <form id="searchForm" action="inicio.php?controller=estudiante&action=filtro" method="post">
                        <input type="text" id="documentId" name="cod_estudiante" placeholder="Ingrese documento de identidad" required>
                        <br>
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        
            
            <style>
                .logout-button {
                    background-color: #f44336; /* Rojo */
                    color: white; /* Texto blanco */
                    padding: 10px 20px; /* Espaciado */
                    border: none; /* Sin borde */
                    border-radius: 5px; /* Bordes redondeados */
                    cursor: pointer; /* Manita al pasar el ratón */
                    font-size: 16px; /* Tamaño de fuente */
                }
        
                .logout-button:hover {
                    background-color: #d32f2f; /* Rojo más oscuro al pasar el ratón */
                }
            </style>
        
        
        
        <script>
            function cerrarSesion() {
                // Aquí iría la lógica para cerrar sesión
                alert("Has cerrado sesión");
                // Redirigir a la página de inicio o login, si es necesario
                // window.location.href = "login.html";
            }
        </script>
</body>
</html>