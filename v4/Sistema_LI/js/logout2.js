// Tiempo de inactividad en milisegundos (10 minutos)
var inactivityTime = 10 * 60 * 1000; 

var timeout;

function startTimer() {
    timeout = setTimeout(logout, inactivityTime);
}

function resetTimer() {
    clearTimeout(timeout);
    startTimer();
}

function logout() {
    window.location.href = '../logout.php'; // Redirigir a la página de cierre de sesión
}

// Detectar eventos de actividad del usuario
document.addEventListener('mousemove', resetTimer);
document.addEventListener('keypress', resetTimer);

startTimer(); // Iniciar el temporizador cuando se carga la página
